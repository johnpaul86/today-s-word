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
define( 'DB_NAME', 'impelsys' );

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
define( 'AUTH_KEY',         'SJk:?t0Hu9EXBjt,I[M6<Essmqf}{#b[.V*x%%G_Yq>xy.)#<Q,ho~{4gqpVRKeG' );
define( 'SECURE_AUTH_KEY',  'sBCPE;9xjoq`Cb&2g&6=v|AEgc_^v(G<[p?HM68~R2!r^ Vlkr%+&pCd 5sW(E-A' );
define( 'LOGGED_IN_KEY',    '=z}rwBU4<754isge_KwQuEOuHa5U4B>%|.I|5[PHL|yRCY}0Sw-T$i;`aYvozH-%' );
define( 'NONCE_KEY',        '2J(U1JRL#O}7Fls6/t[X6rx) Yd3=Z2@+]+Quc8t;P6<#mhT`d~3h(V:iaw[W+v/' );
define( 'AUTH_SALT',        '6YbgxqsZk1jZc@rt9g@Zzc_K<CC_ JYEy|^_:g:h$ohKH2Tk,IcI2hHGxY.r._5R' );
define( 'SECURE_AUTH_SALT', '3k4<X`5Bc*L37{LMM(:lhNC_GNE!V-w`l|)0QXE?e`c0I487v32vE 10(N0+_TFc' );
define( 'LOGGED_IN_SALT',   'W-?2brDHBl@o  CENf=W8fgF?>KAkAS5(%~#Q=nFl !@{)Ym*/%j56eAe`MK%1-@' );
define( 'NONCE_SALT',       'Nr|]=K%`h~i)pgRr|w^?uibR}XjH4:%o$ym=lL60_k evi$BB89/EK!IR:KXDB%B' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'im_';

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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
