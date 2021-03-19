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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'project1' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'GIO^24j#6ebTob0 `louz:Gv/}4TFL#v{.KnRriS>mSX2&KR*zF?O_-A6V[yZ{1o' );
define( 'SECURE_AUTH_KEY',  'o;,fg;A-a(4l8p|j;i%k2s$zZ`576^]YPK~tD%kCif@fNw|w03vWEC+- 8e`N7`3' );
define( 'LOGGED_IN_KEY',    'dzcv%FIOK5y52@T[~WSsq]_[%n2a#?qJ78Ed%3Ja>_Wt_z)+:ANcqN_1[GpAng&Y' );
define( 'NONCE_KEY',        '->1WRdkSy^$>EhQ:J@IRvl6{&uH5@~M?%2-aF;u3HczYtZ+Y7l_9`Fh~okPVm+[J' );
define( 'AUTH_SALT',        'x]2hGla7hMT/@L{A]9H@aEtp},]QGTF{]0]kjU[Lad)7f~;A#:JK+b]_tb78eeNg' );
define( 'SECURE_AUTH_SALT', 'rl193$`qYj|sw(UvyoWx0[zE:U1|EXK/D%)PA5ySSj49*5*w{}s(L{7/=Q8wKoKg' );
define( 'LOGGED_IN_SALT',   '`SCXV<zAm7/Hu9)#h`FfDj@&Av(<N(.;.*ld5La~;&,Lu?`e$/fD>U>LLc8EMp#~' );
define( 'NONCE_SALT',       'hv7~EHv.M*_uti{@:^ivL8Xx* =6W7{RQl.+?Cjxe2IC/(c,X*q`8D!5Fr24_5&7' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', true );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
