<?php
/**
 * Class file: Handles admin settings page, option registration, and admin bar notice.
 *
 * @package Beckin_Maintenance_Mode
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Handles the admin interface and settings for Beckin Maintenance Mode.
 *
 * Registers the settings page, handles saving options, enqueues admin styles,
 * and displays the maintenance mode badge in the admin bar.
 *
 * @since 1.0.0
 */
class Beckin_Maintenance_Mode_Admin {

	/**
	 * Initialize admin hooks.
	 *
	 * @return void
	 */
	public static function init(): void {
		add_action( 'admin_menu', array( __CLASS__, 'add_menu' ) );
		add_action( 'admin_enqueue_scripts', array( __CLASS__, 'enqueue_admin' ) );
		add_action( 'admin_init', array( __CLASS__, 'register_settings' ) );
		add_filter( 'plugin_action_links_' . BECKIN_MAINTENANCEMODE_PLUGIN_BASENAME, array( __CLASS__, 'settings_link' ) );
		// Default priority 10, 3 accepted args.
		add_filter( 'plugin_row_meta', array( __CLASS__, 'my_plugin_row_meta' ), 10, 3 );
		add_action( 'admin_bar_menu', array( __CLASS__, 'admin_bar_notice' ), 1000 );
	}


	/**
	 * Register the settings page under the Settings menu.
	 *
	 * @return void
	 */
	public static function add_menu(): void {
		add_options_page(
			/* translators: Settings page title and menu label for the Maintenance Mode screen. */
			__( 'Maintenance Mode', 'beckin-maintenance-mode' ),
			/* translators: Settings page title and menu label for the Maintenance Mode screen. */
			__( 'Maintenance Mode', 'beckin-maintenance-mode' ),
			BECKIN_MAINTENANCEMODE_ADMIN_CAPABILITY,
			'beckin-maintenance-mode',
			array( __CLASS__, 'render_page' )
		);
	}


	/**
	 * Enqueue admin-only CSS for the settings page.
	 *
	 * @param string $hook The current admin page hook.
	 * @return void
	 */
	public static function enqueue_admin( string $hook ): void {
		if ( 'settings_page_beckin-maintenance-mode' !== $hook ) {
			return;
		}

		wp_enqueue_style(
			'beckin-maintenancemode-admin',
			BECKIN_MAINTENANCEMODE_PLUGIN_URL . 'assets/css/admin.css',
			array(),
			BECKIN_MAINTENANCEMODE_VERSION
		);
	}


	/**
	 * Register plugin settings, sections, and fields.
	 *
	 * @since 1.0.9 Added styling settings section.
	 * @since 1.0.10 Added editor bypass mode setting.
	 *
	 * @return void
	 */
	public static function register_settings(): void {
		register_setting(
			'beckin_maintenancemode',
			BECKIN_MAINTENANCEMODE_OPTION_KEY,
			array(
				'type'              => 'array',
				'sanitize_callback' => array( __CLASS__, 'sanitize' ),
				'show_in_rest'      => false,
			)
		);

		add_settings_section(
			'beckin_maintenancemode_main',
			/* translators: Section heading for the main maintenance mode settings. */
			__( 'Main Settings', 'beckin-maintenance-mode' ),
			'__return_false',
			'beckin-maintenance-mode'
		);

		add_settings_field(
			'enabled',
			/* translators: Field label for the checkbox that turns maintenance mode on or off. */
			__( 'Enable maintenance mode', 'beckin-maintenance-mode' ),
			array( __CLASS__, 'field_enabled' ),
			'beckin-maintenance-mode',
			'beckin_maintenancemode_main'
		);

		add_settings_field(
			'editor_bypass_mode',
			/* translators: Field label for the checkbox that lets users with the edit_posts capability bypass maintenance mode. */
			__( 'Editor bypass mode', 'beckin-maintenance-mode' ),
			array( __CLASS__, 'field_editor_bypass_mode' ),
			'beckin-maintenance-mode',
			'beckin_maintenancemode_main'
		);

		add_settings_field(
			'header',
			/* translators: Field label for the maintenance page header text. */
			__( 'Header title', 'beckin-maintenance-mode' ),
			array( __CLASS__, 'field_header' ),
			'beckin-maintenance-mode',
			'beckin_maintenancemode_main'
		);

		add_settings_field(
			'message',
			/* translators: Field label for the maintenance page body message. */
			__( 'Message', 'beckin-maintenance-mode' ),
			array( __CLASS__, 'field_message' ),
			'beckin-maintenance-mode',
			'beckin_maintenancemode_main'
		);

		add_settings_field(
			'retry_after',
			/* translators: Field label for the Retry-After header value in seconds, used for search engines and crawlers. */
			__( 'Retry-After (seconds)', 'beckin-maintenance-mode' ),
			array( __CLASS__, 'field_retry' ),
			'beckin-maintenance-mode',
			'beckin_maintenancemode_main'
		);

		add_settings_section(
			'beckin_maintenancemode_divider',
			'',
			function () {
				echo '<hr style="margin: 30px 0;">';
			},
			'beckin-maintenance-mode'
		);

		add_settings_section(
			'beckin_maintenancemode_styling',
			/* translators: Section heading for the styling options of the maintenance page. */
			__( 'Style Settings', 'beckin-maintenance-mode' ),
			'__return_false',
			'beckin-maintenance-mode'
		);

		add_settings_field(
			'background_color',
			/* translators: Field label for the color picker that controls the maintenance page background color. */
			__( 'Background color', 'beckin-maintenance-mode' ),
			array( __CLASS__, 'field_background_color' ),
			'beckin-maintenance-mode',
			'beckin_maintenancemode_styling'
		);

		add_settings_field(
			'message_background_color',
			/* translators: Field label for the color picker that controls the message box background color. */
			__( 'Message box color', 'beckin-maintenance-mode' ),
			array( __CLASS__, 'field_message_background_color' ),
			'beckin-maintenance-mode',
			'beckin_maintenancemode_styling'
		);

		add_settings_field(
			'message_background_opacity',
			/* translators: Field label for the numeric input that controls the message box background opacity. */
			__( 'Message box opacity', 'beckin-maintenance-mode' ),
			array( __CLASS__, 'field_message_background_opacity' ),
			'beckin-maintenance-mode',
			'beckin_maintenancemode_styling'
		);

		add_settings_field(
			'header_text_color',
			/* translators: Field label for the color picker that controls the header text color. */
			__( 'Header Text color', 'beckin-maintenance-mode' ),
			array( __CLASS__, 'field_header_text_color' ),
			'beckin-maintenance-mode',
			'beckin_maintenancemode_styling'
		);

		add_settings_field(
			'body_text_color',
			/* translators: Field label for the color picker that controls the body text color. */
			__( 'Body Text color', 'beckin-maintenance-mode' ),
			array( __CLASS__, 'field_body_text_color' ),
			'beckin-maintenance-mode',
			'beckin_maintenancemode_styling'
		);
	}


	/**
	 * Display the "Maint. ON" badge in the admin bar when enabled.
	 *
	 * @param WP_Admin_Bar $wp_admin_bar The WP admin bar instance.
	 *
	 * @since 1.0.10 Added support for editor bypass mode.
	 *
	 * @return void
	 */
	public static function admin_bar_notice( $wp_admin_bar ): void {
		if ( ! is_admin_bar_showing() ) {
			return;
		}

		$opts = get_option( BECKIN_MAINTENANCEMODE_OPTION_KEY, array() );

		// Do not show anything if maintenance mode is off.
		if ( empty( $opts['enabled'] ) ) {
			return;
		}

		// Decide who can see the badge.
		$can_see_badge = current_user_can( BECKIN_MAINTENANCEMODE_ADMIN_CAPABILITY );

		if ( ! $can_see_badge && ! empty( $opts['editor_bypass_mode'] ) && current_user_can( BECKIN_MAINTENANCEMODE_EDIT_POSTS_CAPABILITY ) ) {
			$can_see_badge = true;
		}

		if ( ! $can_see_badge ) {
			return;
		}

		$wp_admin_bar->add_node(
			array(
				'id'    => 'beckin-maintenancemode-badge',
				'title' => __(
					/* translators: Short label in the admin bar indicating maintenance mode is active. &#128679; is an HTML entity and should not be translated. */
					'&#128679; Maint. ON',
					'beckin-maintenance-mode'
				),
				'href'  => esc_url( admin_url( 'options-general.php?page=beckin-maintenance-mode' ) ),
				'meta'  => array(
					'title' => __(
						/* translators: Tooltip text for the maintenance mode admin bar badge. */
						'Maintenance mode is ON',
						'beckin-maintenance-mode'
					),
				),
			)
		);
	}


	/**
	 * Adds a settings link on plugin page.
	 *
	 * @param  array $links  Current links.
	 *
	 * @since 1.1.0
	 *
	 * @return array
	 */
	public static function settings_link( $links ): array {
		$action_links = array(
			sprintf(
				'<a href="%1$s">%2$s</a>',
				esc_url( admin_url( 'options-general.php?page=beckin-maintenance-mode' ) ),
				/* translators: Link label in the plugin row action area that opens the Beckin Maintenance Mode settings page. */
				esc_html__( 'Settings', 'beckin-maintenance-mode' )
			),
		);

		return array_merge( $action_links, $links );
	}


	/**
	 * Show row meta on the plugin screen.
	 *
	 * @param  string[] $links  Plugin Row Meta.
	 * @param  string   $file  Plugin Base file.
	 * @param  array    $plugin_data  Plugin data.
	 *
	 * @since 1.1.0
	 *
	 * @return array
	 */
	public static function my_plugin_row_meta( $links, $file, $plugin_data ): array {
		if (
			BECKIN_MAINTENANCEMODE_PLUGIN_BASENAME !== $file
			|| empty( $plugin_data['slug'] )
			|| 'beckin-maintenance-mode' !== $plugin_data['slug']
		) {
			return $links;
		}

		/* translators: 1: Support URL. 2: Link label in the plugin row meta. */
		$links[] = sprintf(
			'<a href="%1$s" target="_blank" rel="noopener noreferrer">%2$s</a>',
			esc_url(
				'https://support.beckin.com/?utm_source=wp-org&utm_medium=plugin-row&utm_campaign=beckin-maintenance-mode'
			),
			esc_html__( 'Support', 'beckin-maintenance-mode' )
		);

		/* translators: 1: Review URL. 2: Link label in the plugin row meta. Do not change the HTML entity codes (&#129653;) before and after the label. */
		$links[] = wp_kses_post(
			sprintf(
				'<a href="%1$s" target="_blank" rel="noopener noreferrer">&#129653; %2$s &#129653;</a>',
				esc_url( 'https://wordpress.org/support/plugin/beckin-maintenance-mode/reviews/#new-post' ),
				esc_html__( 'Help Us With Stars', 'beckin-maintenance-mode' )
			)
		);

		return $links;
	}


	/**
	 * Get the default styling option values for Beckin Maintenance Mode.
	 *
	 * @since 1.2.0 Introduced helper for default styling values.
	 *
	 * @return array
	 */
	private static function get_default_style_options(): array {
		return array(
			'background_color'           => '#0f172a',
			'message_background_color'   => '#ffffff',
			'message_background_opacity' => 6,
			'header_text_color'          => '#e2e8f0',
			'body_text_color'            => '#e2e8f0',
		);
	}


	/**
	 * Sanitize and validate user input before saving settings.
	 *
	 * @param array $raw Raw option values from user input.
	 *
	 * @since 1.0.9 Added sanitization for styling settings.
	 * @since 1.0.10 Added sanitization for editor bypass mode.
	 * @since 1.2.0 Added support for resetting styling options from the settings page.
	 *
	 * @return array Sanitized option values.
	 */
	public static function sanitize( $raw ): array {
		$raw            = is_array( $raw ) ? $raw : array();
		$opts           = get_option( BECKIN_MAINTENANCEMODE_OPTION_KEY, array() );
		$opts           = is_array( $opts ) ? $opts : array();
		$style_defaults = self::get_default_style_options();

		// If the reset button was clicked, only reset the styling options to their defaults.
		if ( isset( $raw['reset_settings'] ) ) {
			foreach ( $style_defaults as $key => $value ) {
				$opts[ $key ] = $value;
			}

			return $opts;
		}

		$opts['enabled']            = ! empty( $raw['enabled'] );
		$opts['editor_bypass_mode'] = ! empty( $raw['editor_bypass_mode'] );
		$opts['header']             = isset( $raw['header'] ) ? sanitize_text_field( wp_unslash( $raw['header'] ) ) : '';
		$opts['message']            = isset( $raw['message'] ) ? wp_kses_post( wp_unslash( $raw['message'] ) ) : '';
		$opts['retry_after']        = isset( $raw['retry_after'] ) ? absint( $raw['retry_after'] ) : 0;

		$color                    = isset( $raw['background_color'] ) ? sanitize_hex_color( $raw['background_color'] ) : '';
		$opts['background_color'] = $color ? $color : '#0f172a';

		$color                            = isset( $raw['message_background_color'] ) ? sanitize_hex_color( $raw['message_background_color'] ) : '';
		$opts['message_background_color'] = $color ? $color : '#ffffff';

		$opacity = isset( $raw['message_background_opacity'] ) ? absint( $raw['message_background_opacity'] ) : 6;
		if ( $opacity < 0 ) {
			$opacity = 0;
		} elseif ( $opacity > 100 ) {
			$opacity = 100;
		}
		$opts['message_background_opacity'] = $opacity;

		$color                     = isset( $raw['header_text_color'] ) ? sanitize_hex_color( $raw['header_text_color'] ) : '';
		$opts['header_text_color'] = $color ? $color : '#e2e8f0';

		$color                   = isset( $raw['body_text_color'] ) ? sanitize_hex_color( $raw['body_text_color'] ) : '';
		$opts['body_text_color'] = $color ? $color : '#e2e8f0';

		return $opts;
	}


	/**
	 * Output the checkbox field for enabling maintenance mode.
	 *
	 * @return void
	 */
	public static function field_enabled(): void {
		$opts = get_option( BECKIN_MAINTENANCEMODE_OPTION_KEY, array() );
		?>
		<label>
			<input type="checkbox" name="<?php echo esc_attr( BECKIN_MAINTENANCEMODE_OPTION_KEY ); ?>[enabled]" value="1" <?php checked( ! empty( $opts['enabled'] ) ); ?> />
			<?php
				/* translators: Checkbox label that enables or disables the maintenance mode page for visitors. */
				esc_html_e( 'Show maintenance page to visitors (admin bypass)', 'beckin-maintenance-mode' );
			?>
		</label>
		<?php
	}


	/**
	 * Output the checkbox field for enabling editor bypass mode.
	 *
	 * @since 1.0.10
	 *
	 * @return void
	 */
	public static function field_editor_bypass_mode(): void {
		$opts = get_option( BECKIN_MAINTENANCEMODE_OPTION_KEY, array() );
		?>
		<label>
			<input type="checkbox" name="<?php echo esc_attr( BECKIN_MAINTENANCEMODE_OPTION_KEY ); ?>[editor_bypass_mode]" value="1" <?php checked( ! empty( $opts['editor_bypass_mode'] ) ); ?> />
			<?php
				printf(
					wp_kses_post(
						/* translators: Shown next to a checkbox. "edit_posts" is a WordPress capability name and <br> is an HTML tag and should not be translated. Role names like Editors, Authors, Contributors are WordPress roles. */
						__(
							'Allow users with "edit_posts" capability to bypass maintenance mode.<br>e.g., Editors, Authors, Contributors, etc.',
							'beckin-maintenance-mode'
						)
					)
				);
			?>
		</label>
		<?php
	}


	/**
	 * Output the text field for the maintenance page header title.
	 *
	 * Displays a plain-text input field for the maintenance page header.
	 * HTML tags are not allowed, but users can include HTML entities such as &#38;#128119;.
	 *
	 * @since 1.0.6
	 *
	 * @return void
	 */
	public static function field_header(): void {
		$opts = get_option( BECKIN_MAINTENANCEMODE_OPTION_KEY, array() );
		?>
		<input type="text" size="60" name="<?php echo esc_attr( BECKIN_MAINTENANCEMODE_OPTION_KEY ); ?>[header]" value="<?php echo esc_attr( $opts['header'] ?? '' ); ?>" />
		<p class="description">
		<?php
			printf(
				wp_kses_post(
					/* translators: Help text shown under the header title field. Explains that only plain text is allowed, but emoji HTML entities like &#128119; are supported. <br> &#128119; &#38;#128119; are HTML & HTML entities and should not be translated. */
					__(
						'Plain text only.<br>If you want to use an emoji ( &#128119; ), you can include HTML entities like &#38;#128119;',
						'beckin-maintenance-mode'
					)
				)
			);
		?>
		</p>
		<?php
	}


	/**
	 * Output the textarea field for the custom maintenance message.
	 *
	 * @return void
	 */
	public static function field_message(): void {
		$opts = get_option( BECKIN_MAINTENANCEMODE_OPTION_KEY, array() );
		?>
		<textarea name="<?php echo esc_attr( BECKIN_MAINTENANCEMODE_OPTION_KEY ); ?>[message]" rows="5" cols="60"><?php echo esc_textarea( $opts['message'] ?? '' ); ?></textarea>
		<p class="description">
			<?php
				/* translators: Help text under the maintenance message textarea. Indicates that some basic HTML tags are allowed. */
				esc_html_e( 'Basic HTML allowed.', 'beckin-maintenance-mode' );
			?>
		</p>
		<?php
	}


	/**
	 * Output the numeric field for Retry-After seconds.
	 *
	 * @return void
	 */
	public static function field_retry(): void {
		$opts = get_option( BECKIN_MAINTENANCEMODE_OPTION_KEY, array() );
		?>
		<input type="number" min="0" step="1" name="<?php echo esc_attr( BECKIN_MAINTENANCEMODE_OPTION_KEY ); ?>[retry_after]" value="<?php echo esc_attr( isset( $opts['retry_after'] ) ? (int) $opts['retry_after'] : 0 ); ?>" />
		<p class="description">
			<?php
				/* translators: Help text for the Retry-After field. "0" means the Retry-After header will not be sent. */
				esc_html_e( 'Hint for crawlers (0 disables the header).', 'beckin-maintenance-mode' );
			?>
		</p>
		<?php
	}


	/**
	 * Output the color field for the maintenance page background.
	 *
	 * @since 1.0.9
	 *
	 * @return void
	 */
	public static function field_background_color(): void {
		$opts          = get_option( BECKIN_MAINTENANCEMODE_OPTION_KEY, array() );
		$color         = isset( $opts['background_color'] ) ? sanitize_hex_color( $opts['background_color'] ) : '';
		$current_color = $color ? $color : '#0f172a';
		?>
		<input type="color"
			name="<?php echo esc_attr( BECKIN_MAINTENANCEMODE_OPTION_KEY ); ?>[background_color]"
			value="<?php echo esc_attr( $current_color ); ?>"
		/>
		<p class="description">
			<?php
				/* translators: Help text under the background color picker for the maintenance page. */
				esc_html_e( 'Choose the background color for the maintenance page.', 'beckin-maintenance-mode' );
			?>
		</p>
		<?php
	}


	/**
	 * Output the color field for the message box background.
	 *
	 * @since 1.0.9
	 *
	 * @return void
	 */
	public static function field_message_background_color(): void {
		$opts          = get_option( BECKIN_MAINTENANCEMODE_OPTION_KEY, array() );
		$color         = isset( $opts['message_background_color'] ) ? sanitize_hex_color( $opts['message_background_color'] ) : '';
		$current_color = $color ? $color : '#ffffff';
		?>
			<input type="color"
				name="<?php echo esc_attr( BECKIN_MAINTENANCEMODE_OPTION_KEY ); ?>[message_background_color]"
				value="<?php echo esc_attr( $current_color ); ?>"
			/>
			<p class="description">
				<?php
					/* translators: Help text under the color picker for the message box background. */
					esc_html_e( 'Choose the background color for the message box.', 'beckin-maintenance-mode' );
				?>
			</p>
		<?php
	}


	/**
	 * Output the opacity field for the message box background.
	 *
	 * @since 1.0.9
	 *
	 * @return void
	 */
	public static function field_message_background_opacity(): void {
		$opts    = get_option( BECKIN_MAINTENANCEMODE_OPTION_KEY, array() );
		$current = isset( $opts['message_background_opacity'] ) ? (int) $opts['message_background_opacity'] : 6;
		if ( $current < 0 ) {
			$current = 0;
		} elseif ( $current > 100 ) {
			$current = 100;
		}
		?>
			<input type="number"
				min="0"
				max="100"
				step="1"
				name="<?php echo esc_attr( BECKIN_MAINTENANCEMODE_OPTION_KEY ); ?>[message_background_opacity]"
				value="<?php echo esc_attr( $current ); ?>"
			/>
			<p class="description">
				<?php
					/* translators: Help text for the message box opacity field. Explains that 0 is fully transparent and 100 is fully opaque. */
					esc_html_e( 'Set the opacity (0 = fully transparent, 100 = fully opaque) for the message box background.', 'beckin-maintenance-mode' );
				?>
			</p>
		<?php
	}


	/**
	 * Output the color field for the maintenance page header text.
	 *
	 * @since 1.0.9
	 *
	 * @return void
	 */
	public static function field_header_text_color(): void {
		$opts          = get_option( BECKIN_MAINTENANCEMODE_OPTION_KEY, array() );
		$color         = isset( $opts['header_text_color'] ) ? sanitize_hex_color( $opts['header_text_color'] ) : '';
		$current_color = $color ? $color : '#e2e8f0';
		?>
			<input type="color"
				name="<?php echo esc_attr( BECKIN_MAINTENANCEMODE_OPTION_KEY ); ?>[header_text_color]"
				value="<?php echo esc_attr( $current_color ); ?>"
			/>
			<p class="description">
				<?php
					/* translators: Help text under the color picker for the header text on the maintenance page. */
					esc_html_e( 'Choose the header text color for the maintenance page.', 'beckin-maintenance-mode' );
				?>
			</p>
		<?php
	}


	/**
	 * Output the color field for the maintenance page body text.
	 *
	 * @since 1.0.9
	 *
	 * @return void
	 */
	public static function field_body_text_color(): void {
		$opts          = get_option( BECKIN_MAINTENANCEMODE_OPTION_KEY, array() );
		$color         = isset( $opts['body_text_color'] ) ? sanitize_hex_color( $opts['body_text_color'] ) : '';
		$current_color = $color ? $color : '#e2e8f0';
		?>
			<input type="color"
				name="<?php echo esc_attr( BECKIN_MAINTENANCEMODE_OPTION_KEY ); ?>[body_text_color]"
				value="<?php echo esc_attr( $current_color ); ?>"
			/>
			<p class="description">
				<?php
					/* translators: Help text under the color picker for the body text on the maintenance page. */
					esc_html_e( 'Choose the body text color for the maintenance page.', 'beckin-maintenance-mode' );
				?>
			</p>
		<?php
	}


	/**
	 * Render the plugin settings page output.
	 *
	 * @since 1.0.9 Changed how the sections and settings are rendered.
	 * @since 1.2.0 Added reset styles button.
	 *
	 * @return void
	 */
	public static function render_page(): void {
		if ( ! current_user_can( BECKIN_MAINTENANCEMODE_ADMIN_CAPABILITY ) ) {
			return;
		}
		?>
		<div class="wrap">
			<h1><?php echo esc_html__( 'Maintenance Mode', 'beckin-maintenance-mode' ); ?></h1>

			<div style="background:#fff;border:1px solid #ccd0d4;border-radius:6px;padding:14px;margin-top:20px;">
				<h2 style="margin:0 0 6px;font-size:16px;"><?php esc_html_e( 'About Beckin', 'beckin-maintenance-mode' ); ?></h2>
				<p class="coffee-description">
					<?php
					echo wp_kses_post(
						sprintf(
							/* translators: 1: Opening HTML <a> tag, 2: closing HTML </a> tag. */
							__( 'I develop plugins that help WordPress users save time and get more done. If this plugin helped you, please consider %1$sbuying me a coffee%2$s &#9749; to help support future updates and new features.', 'beckin-maintenance-mode' ),
							'<a href="' . esc_url( 'https://buymeacoffee.com/beckin' ) . '" target="_blank" rel="noopener noreferrer">',
							'</a>'
						)
					);
					?>
				</p>
			</div>

			<hr style="margin:20px 0;">

			<form method="post" action="options.php">
			<?php
				settings_fields( 'beckin_maintenancemode' );
				do_settings_sections( 'beckin-maintenance-mode' );
				// submit_button(); Keeping commented out submit button for now.
			?>

				<p class="submit">
					<?php
						submit_button( null, 'primary', 'submit', false );

						/* translators: Button label for resetting maintenance mode styling settings to their default values. */
						$reset_label = esc_html__( 'Reset Style Settings', 'beckin-maintenance-mode' );

						submit_button(
							$reset_label,
							'secondary',
							BECKIN_MAINTENANCEMODE_OPTION_KEY . '[reset_settings]',
							false,
							array(
								'id' => 'beckin-maintenancemode-reset-styles',
							)
						);
					?>
				</p>
			</form>
		</div>
		<?php
	}
}

Beckin_Maintenance_Mode_Admin::init();
