<?php
/**
 * Class file: Handles frontend maintenance mode display and 503 response.
 *
 * @package Beckin_Maintenance_Mode
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Handles the frontend behavior of Beckin Maintenance Mode.
 *
 * Intercepts frontend requests, displays the maintenance message,
 * and sends proper 503 headers and Retry-After responses.
 *
 * @since 1.0.0
 */
class Beckin_Maintenance_Mode_Frontend {

	/**
	 * Initialize the frontend maintenance mode hook.
	 *
	 * @since 1.0.10 Added admin blocking support.
	 *
	 * @return void
	 */
	public static function init(): void {
		add_action( 'template_redirect', array( __CLASS__, 'maybe_intercept' ), 0 );
		add_action( 'admin_init', array( __CLASS__, 'maybe_block_admin' ) );
	}


	/**
	 * Check if the current user is allowed to bypass maintenance mode.
	 *
	 * Admins always bypass. If editor bypass mode is enabled, users with
	 * the "edit_posts" capability also bypass.
	 *
	 * @since 1.0.10
	 *
	 * @param array $opts Plugin options.
	 * @return bool
	 */
	private static function user_can_bypass( array $opts ): bool {
		if ( is_user_logged_in() && current_user_can( BECKIN_MAINTENANCEMODE_ADMIN_CAPABILITY ) ) {
			return true;
		}

		if ( ! empty( $opts['editor_bypass_mode'] )
			&& is_user_logged_in()
			&& current_user_can( BECKIN_MAINTENANCEMODE_EDIT_POSTS_CAPABILITY )
		) {
			return true;
		}

		return false;
	}


	/**
	 * Maybe block access to wp-admin for users who cannot bypass maintenance mode.
	 *
	 * Runs only in the admin area. If maintenance mode is enabled and the user
	 * is not allowed to bypass it, they are redirected to the frontend where
	 * the 503 template will be shown.
	 *
	 * @since 1.0.10
	 *
	 * @return void
	 */
	public static function maybe_block_admin(): void {
		// Only run in the admin area.
		if ( ! is_admin() ) {
			return;
		}

		$opts = get_option( BECKIN_MAINTENANCEMODE_OPTION_KEY, array() );
		if ( empty( $opts['enabled'] ) ) {
			return;
		}

		// Do not break AJAX or cron.
		if ( function_exists( 'wp_doing_ajax' ) && wp_doing_ajax() ) {
			return;
		}
		if ( defined( 'DOING_CRON' ) && DOING_CRON ) {
			return;
		}

		// Allowed roles (admins and, optionally, editors/authors) stay in wp-admin.
		if ( self::user_can_bypass( $opts ) ) {
			return;
		}

		// Everyone else gets bounced to the frontend where maintenance is shown.
		wp_safe_redirect( home_url( '/' ) );
		exit;
	}


	/**
	 * Maybe intercept the current request and display the maintenance page.
	 *
	 * Checks for user capability, REST requests, feeds, and admin paths before outputting a 503 page.
	 *
	 * @since 1.0.9 Added support for styling.
	 * @since 1.0.10 Added support for editor bypass mode.
	 *
	 * @return void
	 */
	public static function maybe_intercept(): void {
		$opts    = get_option( BECKIN_MAINTENANCEMODE_OPTION_KEY, array() );
		$enabled = ! empty( $opts['enabled'] );
		if ( ! $enabled ) {
			return;
		}

		// Bypass for logged-in users with the right capabilities.
		if ( self::user_can_bypass( $opts ) ) {
			return;
		}

		// Bypass for login/admin endpoints and REST.
		if ( is_admin() || self::is_login_request() || defined( 'REST_REQUEST' ) ) {
			return;
		}

		// Allow feeds to continue with 200 to not break readers.
		if ( is_feed() ) {
			return;
		}

		// Serve 503 template with Retry-After.
		$status_header = 'HTTP/1.1 503 Service Unavailable';
		if ( function_exists( 'status_header' ) ) {
			status_header( 503 );
		}
		header( $status_header );

		$retry = isset( $opts['retry_after'] ) ? (int) $opts['retry_after'] : 0;
		if ( $retry > 0 ) {
			header( 'Retry-After: ' . $retry );
		}

		// Prevent caches from caching the maintenance page.
		header( 'Cache-Control: no-cache, must-revalidate, max-age=0' );
		header( 'Pragma: no-cache' );
		nocache_headers();

		$header = ! empty( $opts['header'] )
			? $opts['header']
			: __(
				/* translators: H1 header text for the maintenance page. &#128119; is an HTML entity and should not be translated. */
				'&#128119; Site under maintenance',
				'beckin-maintenance-mode'
			);

		$message = ! empty( $opts['message'] )
			? $opts['message']
			: __(
				/* translators: Default body message shown on the maintenance page. */
				"We'll be right back! We're doing a bit of maintenance.",
				'beckin-maintenance-mode'
			);

		$background_color = isset( $opts['background_color'] )
			? sanitize_hex_color( $opts['background_color'] )
			: '';

		if ( '' === $background_color ) {
			$background_color = '#0f172a';
		}

		$header_text_color = isset( $opts['header_text_color'] )
			? sanitize_hex_color( $opts['header_text_color'] )
			: '';

		if ( '' === $header_text_color ) {
			$header_text_color = '#e2e8f0';
		}

		$body_text_color = isset( $opts['body_text_color'] )
			? sanitize_hex_color( $opts['body_text_color'] )
			: '';

		if ( '' === $body_text_color ) {
			$body_text_color = '#e2e8f0';
		}

		$message_background_color = isset( $opts['message_background_color'] )
			? sanitize_hex_color( $opts['message_background_color'] )
			: '';

		if ( '' === $message_background_color ) {
			$message_background_color = '#ffffff';
		}

		$message_background_opacity = isset( $opts['message_background_opacity'] )
			? absint( $opts['message_background_opacity'] )
			: 6;

		if ( $message_background_opacity < 0 ) {
			$message_background_opacity = 0;
		} elseif ( $message_background_opacity > 100 ) {
			$message_background_opacity = 100;
		}

		// Load minimal template.
		self::render_template(
			$header,
			$message,
			$background_color,
			$header_text_color,
			$body_text_color,
			$message_background_color,
			$message_background_opacity
		);

		exit;
	}


	/**
	 * Determine if the current request is for login or admin pages.
	 *
	 * @return bool True if the request is for wp-login.php or wp-admin, false otherwise.
	 */
	private static function is_login_request(): bool {
		$req = isset( $_SERVER['REQUEST_URI'] ) ? sanitize_text_field( wp_unslash( $_SERVER['REQUEST_URI'] ) ) : '';
		return (bool) preg_match( '#/wp-login\\.php|/wp-admin/?#', $req );
	}


	/**
	 * Convert a hex color to RGB components.
	 *
	 * @param string $hex Hex color string.
	 * @since 1.0.9
	 *
	 * @return array{r:int,g:int,b:int}
	 */
	private static function hex_to_rgb( string $hex ): array {
		$hex = ltrim( $hex, '#' );

		if ( 3 === strlen( $hex ) ) {
			$hex = $hex[0] . $hex[0] . $hex[1] . $hex[1] . $hex[2] . $hex[2];
		}

		$r = hexdec( substr( $hex, 0, 2 ) );
		$g = hexdec( substr( $hex, 2, 2 ) );
		$b = hexdec( substr( $hex, 4, 2 ) );

		return array(
			'r' => $r,
			'g' => $g,
			'b' => $b,
		);
	}


	/**
	 * Render the maintenance mode HTML template.
	 *
	 * @param string $header  The H1 header text (plain text).
	 * @param string $message The body message (allows basic HTML).
	 * @param string $background_color The background color.
	 * @param string $header_text_color The header text color.
	 * @param string $body_text_color The body text color.
	 * @param string $message_background_color The message background color.
	 * @param int    $message_background_opacity The message background opacity.
	 *
	 * @since 1.0.9 Added message box rgba styling and new color outputs.
	 *
	 * @return void
	 */
	private static function render_template(
		string $header,
		string $message,
		string $background_color,
		string $header_text_color,
		string $body_text_color,
		string $message_background_color,
		int $message_background_opacity
	): void {
		$title = get_bloginfo( 'name' );

		$rgb                     = self::hex_to_rgb( $message_background_color );
		$alpha                   = max( 0, min( 100, $message_background_opacity ) ) / 100;
		$message_background_rgba = sprintf(
			'rgba(%d,%d,%d,%s)',
			$rgb['r'],
			$rgb['g'],
			$rgb['b'],
			number_format( $alpha, 2, '.', '' )
		);
		// Output maintenance page markup.
		?>
		<!doctype html>
		<html <?php language_attributes(); ?>>
		<head>
			<meta charset="<?php bloginfo( 'charset' ); ?>" />
			<meta name="viewport" content="width=device-width, initial-scale=1" />
			<title>
				<?php echo esc_html( $title ); ?> &mdash; 
					<?php
					/* translators: Title text for the maintenance page shown in the browser tab. */
						esc_html_e(
							'Maintenance',
							'beckin-maintenance-mode'
						);
					?>
			</title>
			<?php do_action( 'beckin_maintenancemode_head' ); ?>
		</head>
		<body style="margin:0;min-height:100vh;display:flex;align-items:center;justify-content:center;background:<?php echo esc_attr( $background_color ); ?>;color:<?php echo esc_attr( $body_text_color ); ?>;font-family:-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica,Arial,sans-serif;">
			<div style="max-width:680px;padding:32px;text-align:center;">
				<h1 style="font-size:28px;margin:0 0 12px;color:<?php echo esc_attr( $header_text_color ); ?>;">
						<?php echo esc_html( $header ); ?>
				</h1>
				<div style="font-size:18px;line-height:1.6;background:<?php echo esc_attr( $message_background_rgba ); ?>;padding:16px;border-radius:12px;">
					<?php echo wp_kses_post( wpautop( $message ) ); ?>
				</div>
				<p style="opacity:.7;margin-top:16px;">&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> &mdash; <?php echo esc_html( get_bloginfo( 'name' ) ); ?></p>
			</div>
		</body>
		</html>
		<?php
	}
}

Beckin_Maintenance_Mode_Frontend::init();
