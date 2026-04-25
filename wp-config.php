<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'dbs15603694' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost:3306' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'tyHZRhaTU2LpGxD12FkY9JF66wTzWqk7czFg71VQIzo6JzpVP8F9euWYl3ReVlIQ');
define('SECURE_AUTH_KEY',  'ziH51mEiXQKw5dgikM3SHZWnLgZezTELFG6GzaX570MlDlsiKbVja6HYXlsIImnN');
define('LOGGED_IN_KEY',    'B2V21zxWvqkOqqzTavD9lyUQq6dAeE3hvypjoyj4lZBTqWs12tTpug0lnMf4AB9R');
define('NONCE_KEY',        'ifgrFbKe0Fj3bioXqoymUk1652v6p5wgec0JcBJ1okvEqj5sa53K6T8yoyN57j3K');
define('AUTH_SALT',        'lK9d6lYPeRdsejgZqcBvO3wYAzwGKuztuIBATSP2ewdX5RhUaHlSpW0r7q1WzAqs');
define('SECURE_AUTH_SALT', 'Hq8hQJi6059kG0lYqrdbSuit1qALtHesazkGSUDRGJZbnAaQfBC5UVPA3IW2lCTB');
define('LOGGED_IN_SALT',   '1ixvFxCCrSnwlJFzLTfOyc5GRKiSsgACR6lulUN0ylGiytCTXDd4N8LbbXsgIEts');
define('NONCE_SALT',       'KGlVGQ37tEpJswRZIPq7N0r1xkimZrMt0jRxESZqBppUbmfXt28y9EbdvLHlFNAf');

/**
 * Other customizations.
 */
define('WP_TEMP_DIR',dirname(__FILE__).'/wp-content/uploads');


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
 */
$table_prefix = 'qqkb_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



define( 'DISABLE_WP_CRON', true );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
