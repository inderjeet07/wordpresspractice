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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress_practice' );

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
define( 'AUTH_KEY',         'm)pBa(lE/K;|=]utj34gAy w^Fj&(vctH0VM147{ksU$F,<<K717VqB:C|Ze9@wY' );
define( 'SECURE_AUTH_KEY',  ';>#:MIpZ0.<r(ChbV%kcHO/Y6k!];9`: u(>Rx0z$&K]`Yt;,|p0_A_WR$FWy[o_' );
define( 'LOGGED_IN_KEY',    '4wFUXo)jJr~ug)1g-6uWOGdMjh0>-/~;w2Kn0]Q:I^kch2F8d4DL)>@qVbbxq1E!' );
define( 'NONCE_KEY',        '+E@4uL,oEiEkt`Z|J9_(xvQudGSo3fxKh|h8o ;[E)+G$S~M3v,p?kR#2X(>~d>x' );
define( 'AUTH_SALT',        '-M8ci*0zQAERja>fH{Z6r1dBXxYAw:Yg~a!w=N6~{%JK9$3P|8H/%vM+ R8q.[7-' );
define( 'SECURE_AUTH_SALT', '<{+fr[r000NTItC~yglG2BH@8x8dLlI_RDA~iBEt~]#pJ9^={glz@UHsh?YP8jEf' );
define( 'LOGGED_IN_SALT',   '7=e8##X8?LmiavZSK6Rr-,Ah:poCceu-6%{K$:4^Owz;Yj/45@_cwy?tV+2j9>-`' );
define( 'NONCE_SALT',       'rB>:_FY;wXmF@-P(XhwUrDZ~{c~Ynu2SAg> tq#Ya3`$wX!U_]e%XcBQbX}nK&7_' );

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
