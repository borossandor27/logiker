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
define( 'DB_NAME', 'logiker' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

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
define( 'AUTH_KEY',         '=mFdA;wgVHcq0xqdm1:ALT8#>29k!%+;XmG^aZ`i$CR&$%Q&3IX>LcdbAF-tMsx1' );
define( 'SECURE_AUTH_KEY',  'vleI;:q0*7~ieY%D=>v 0E9&I|w;V/]nkxfMT#O;IN-#e&96D!=$i$#!sSdoogg}' );
define( 'LOGGED_IN_KEY',    'W/Mn3*|?zZm{F`%]|y^_^Qj-5H2D]&8?k,.jrm10;5E U(={Y:CF}h<N$My`CJ2U' );
define( 'NONCE_KEY',        'lqECzIz,$)H=P[PYG%(u#L^W:3!<Vt:OQqu@K U3hIXSS.R,o}m#sJl$|..pAfND' );
define( 'AUTH_SALT',        '|#CVX$b``cnSf$H*~wx1?JMv2Yy1Hzbcs:?3<KR!d&H`_e^W[su0cHWAHcX>8Cw{' );
define( 'SECURE_AUTH_SALT', 'ubuRDP0cj|Uh!^UE;6`[~]~2{75#:=?.!a 4IX;}(:8RapMJkeo*3q@Ws4h[BRJv' );
define( 'LOGGED_IN_SALT',   'P?1^!0D^h=*$hOMQH)(J!bzc|2U4rz|ZmWRonZ~<N:.]J~i?u<PihL2te3fLgGra' );
define( 'NONCE_SALT',       '(y1oNi=r=GeC# 2IiQHY19[_JBCYtP $V0$}BE0}LKjk)dVs,j^2G/+0Ln9V3gWd' );

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
$table_prefix = 'logiker_';

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

define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', false);

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
