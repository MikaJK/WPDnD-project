<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'GUBtkK7iLGmPHNNNH60WJhdcC3Njez5pbgynvWbBcaTgbTOaGHIk30JzlYTxymCJKlLxW0JuUzG/tyw21FDGEQ==');
define('SECURE_AUTH_KEY',  'ogW1wAEZ1iojm5Qp4BKnvHjFENJR9qFOIwrVFR4ZaIILzxWy2EcC/KDnkttApjGN+2b6tH8k+9CwtswrlsdkOg==');
define('LOGGED_IN_KEY',    'RpaHKIPLU4LecuotTlMgWvkB8WGqhGrmAzKtE6J1DKK36bZzwm+7pw8+rOMNihjnOCa0jU3e/HiDqvzBYwnNsw==');
define('NONCE_KEY',        'CoWc/UYu1NTJjqr0IuIy8n9/HAs7+pRo6uTOts3D55qKniV8zvzyiYwmQVS+Poi+LwZa8n9IZnp2lycQ2cn4uQ==');
define('AUTH_SALT',        'jWzfSIKNvpjVqHyByf2GaTjYZIKbjeM+8EDVRtVFac+WpBkcqJsZMsPrOhW4XkQf2WIMsbtZrtJEZXmjWTVHvQ==');
define('SECURE_AUTH_SALT', 'qeldpCspxPbxwq7j5dj7sBufq5SyoZzPPmW0GeYtfO8+CbeY1qJixu3HPDiRVNAV6a0DUUFIiDlzKZfj0q1TQQ==');
define('LOGGED_IN_SALT',   'HI58z9fntP9floPYbcLPcnyED+IDbGutz1rCpCjUPL9Q1zOKZbjsOa5WLANTmie4CWi8r12svv9cNsMXjjTQhQ==');
define('NONCE_SALT',       'rjKRv+YgE+a9xQAf47jFziY7fM/0s+TzHks2FAdIeDPYV+HSIrqXFcg6zZIDXeYZM9i20WbkZQs10wMR3Z+4dQ==');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
