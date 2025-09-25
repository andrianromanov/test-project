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
define( 'DB_NAME', 'test_project' );

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
define( 'AUTH_KEY',         'F,@>)H3c44OV~}7G%+@k{{-O95]Q/>FR&:rN|cogxS~$nS&-0aY=f2]::SHNo=YW' );
define( 'SECURE_AUTH_KEY',  'K[?1YoEn100[z`cptP$<a0Uf<9J}tjNR2:jIl_l;EqH@F}q&3kfQmhd*GboC{Q;N' );
define( 'LOGGED_IN_KEY',    '$f;#ksma7Pow31](#c}5&[930Fxp46gjOm>JnEJ!`{J((xptpHY}LvT{Fsn8A7&b' );
define( 'NONCE_KEY',        'cGQva!MfFvW#O7~FFgorVG:OPIFl-W1 xG1=vu5j]/<P_L}+4XUL8KA0`W2~d$La' );
define( 'AUTH_SALT',        'iu0/OC)iHd&0,D^/v:ElYof>M98E2nZ%*;s{/g$I9/s5_{cqd1YMqS@w<OT}w^av' );
define( 'SECURE_AUTH_SALT', 'IP#<x>x?aTVKA478tYtbLufaW3yYQoxms{n( &2|yb+BJ*6w}p[3X5_s<[AS.uIN' );
define( 'LOGGED_IN_SALT',   'tGAN}LF6l{5pJ;ThV8]A>NyI#[3x.]/3Lx`X38Wz~{JgeaW%(PL`GNEQA>cyEt}%' );
define( 'NONCE_SALT',       ' >Kw4zrrF/_6?=GXLN%4`qy.QMe&EZeeY1Xaa-,Q-EV&|}AHr/m};D,XW^dCO$.F' );

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
