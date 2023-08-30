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
define( 'DB_NAME', 'db_wordpress' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '123456' );

/** Database hostname */
define( 'DB_HOST', 'db' );

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
define( 'AUTH_KEY',         'vO,=b2xWZ|L+9skugZ~,UzwcM^5{4G.*FcrE=)Q4/I^zbOi_9+H8Zd)`AZqfT@i{' );
define( 'SECURE_AUTH_KEY',  '*Te=n?AhWPMAK7Xj8aXZ*xB}4*)Y^n/ 8_y>5-]Ji9!h2(MGOZFLS^e[6o+$dF)%' );
define( 'LOGGED_IN_KEY',    'RqZKD}*MEMA6H{mb.<>S;OXV2_BWS8LyY`Opg1(CDo/+ffOe7H5C<Jk$l=XvBVRU' );
define( 'NONCE_KEY',        'TKHjr&3Qc4{:nG5E;TLhOVD1slQOFzqlQ2+{8@D?tgGx</,Id>t!f2Lzftuh-q1s' );
define( 'AUTH_SALT',        'fMkv4)i~]Ml12lX$Go;IGh.Y,<K6lEd[xSw$UQWORLKUTuH,S[eq*Yy^4a7PVW-s' );
define( 'SECURE_AUTH_SALT', '|GQLA^lxE#OB-@6cJ!X?rs;;(i:;ER`!yRu^OiLbqUX?8!4wVG(cE:z=47[Z4mZ@' );
define( 'LOGGED_IN_SALT',   'mV]BT`xyJ 6EStF393w$RSt }@Q5N`DvVP=Uajg.hp.5Rk7`}.Da!Ip`95LlsYCw' );
define( 'NONCE_SALT',       '6yrn$ToFdN4[tumiL}<ahpZ3z:i]RjA#6 E9zfKXsc/&XZ5mU`ykEP4ZZL:c*jO2' );

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
