<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'psf_ebu2023' );

/** Database username */
define( 'DB_USER', 'PSFEbu' );

/** Database password */
define( 'DB_PASSWORD', 'H#p02r4g1DJ' );

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
define( 'AUTH_KEY',         '7rIYz~77`wM`rLeY@a(.1S?iNUkK|U!h#&Lke>5{5E_@1dnfY+]*?ndS+^^]f/zE' );
define( 'SECURE_AUTH_KEY',  ':>Su6xXfV;s-&1.2xN%hM<c{@LSqmeiJi&?OK5zT#L)T&9/Yvf?t{R;30]9k2snR' );
define( 'LOGGED_IN_KEY',    'N6:)f,14i>;=V,k(jY.iwJ>4G[#U{R Gp 8~mR.NANYzFs3m8LG//9M2!Pl&`Srj' );
define( 'NONCE_KEY',        'y&XkxD`l8w#H}6u@:=Pnt<7ah91aRcA&YL=M+kKl/6IQ;0Y!PoZf=Pvpv=OnZxP@' );
define( 'AUTH_SALT',        'or-=O;XK#N<2J|_+Cip.BLe{tYY:xuZRL;qwE]R_lAJclEE.J|4zyq{;0MIsQeMT' );
define( 'SECURE_AUTH_SALT', 'fw(Uh/%_>K_3/EIFNk#EP:Oalf#<rM&D,},!`*Aae$@Wnr#Q$o]pYvb1L^]YW[V8' );
define( 'LOGGED_IN_SALT',   'r!-w:VkR]aR5hylV71`.1q$)l|8)JPC,]/8cYmD5yYa_6D2`Icl6O,`poFo#j~sd' );
define( 'NONCE_SALT',       'El@Mq)c@,<ZF=<RD5a8^L?!X^0gO8$q$TX%?mvuoMe5py?7>A!d?Qs;@o{ BTH2i' );

/**#@-*/

/**
 * WordPress database table prefix.
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
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
