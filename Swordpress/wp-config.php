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
define( 'DB_NAME', 'Swordpress' );

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
define( 'AUTH_KEY',         'DrQn7ot[t_@gF9-$14b2X[5*}sZs.vk^aWiPcN,g>7cL {?MHb[QY6DG=`aeTY)m' );
define( 'SECURE_AUTH_KEY',  '[yfk!52DayW8H6Tjn iPy[ uXX@5AWyJ7<>>z?|}mqy}Re|nFjk5:NOwbl|xIooO' );
define( 'LOGGED_IN_KEY',    'Hv25/_MD@Q&C{>g& J<B{QE~|c;@kY4(DnPXo5>_TdSEm_TGOnV~/:g P(nxJbD2' );
define( 'NONCE_KEY',        '2+$Lka`|nUh_0=Z24dp`xl5I}Yxtho5sz&^y610CI4~>i@h?sP2M[wKUG>UrhU2!' );
define( 'AUTH_SALT',        'VPTG+bznE/ t*}R_^llok2&-#m qYq<SG,~P/KpUz=}ZD(J=/py3j%9)M=2OLBH9' );
define( 'SECURE_AUTH_SALT', 'I:.:>L?4,s;f%up$g)%-VN{;%Nc1h]vI<B)QdTHTZK*w0ETW-!@&9w%O7PtwqsDm' );
define( 'LOGGED_IN_SALT',   'ZS_B^({M)WoRU&6j2D Ir A HxW.MbqVq_0{Zji_h+?sOD+tHm`VeCrDglFrPbQi' );
define( 'NONCE_SALT',       '?i>RL.O{<*bqQ,FPRJ)!uZ@lPu0yKTIz#v2^K0H@Dpzre9P&S!lT6a_Iv1Fu6cNY' );

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
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
