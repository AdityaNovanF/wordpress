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
define( 'DB_NAME', 'wordpress' );

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
define( 'AUTH_KEY',         '+tvk>@)7d6rGld`vF|m6!LV@5&Iy1>`mbkP2{8bBh5Mp}dkv@e&zz{OkK<{a >%i' );
define( 'SECURE_AUTH_KEY',  'b:I/NaHFiat0$![5u>)Oay`D^Y,D_jIhA%-Wg,^/Y{~/>+XR/{O^bD~y6UGd><L|' );
define( 'LOGGED_IN_KEY',    'ET5B.tbBf*tJr[AQ6BB7ha)7[F_OCh,<?XCFb|(ueb_goGW3aZiNTr<fbx Z]-K,' );
define( 'NONCE_KEY',        '#~6<MnlcPL#<u%3}(m_l4uibySvg`&AU^+qFM3AhYj,Fs.H6co8,-:-xGD6ax)2^' );
define( 'AUTH_SALT',        ';Df7bZFiZI#n&E) @`pF)hx=D,Yo)daiFK5Ve$<ok/[2F*%hY9@~M1x};rX0oy4q' );
define( 'SECURE_AUTH_SALT', 'cJ*VS5&,7r>{!bb28V&xXTW6H+zHx2}~q|-|U)e?OsIjaJ6&@-TOSJ^6CU[.L6qq' );
define( 'LOGGED_IN_SALT',   '4h&wV+$#906NM:Ek*Z0S]J.C/q]t|d/B9O.jP[x1,d$yLUfcf:}^6$<&gA:porms' );
define( 'NONCE_SALT',       'PtOWPdgVrM)|u8NSkdsr.IG=Hm^5z74S1|ytkBMgc_y1#@=f;oF{9l]zlBdf-qK^' );

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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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
