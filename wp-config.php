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
define( 'DB_NAME', 'bronya' );

/** Database username */
define( 'DB_USER', 'bronya' );

/** Database password */
define( 'DB_PASSWORD', 'bronya123' );

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
define( 'AUTH_KEY',         '-_`>3OpCc4,rwy9g.aoxb@)I$4jJJdHy_+7L+*vRA+ui^ ZjW}&!.~};wF8AdO;b' );
define( 'SECURE_AUTH_KEY',  '_3V1xj|n!XzD 7p7j4akQq~}[0{+Db#:6hYBdfI.f@R^WB;i&E{rz6E7DL%shMJS' );
define( 'LOGGED_IN_KEY',    ',jN FqSNBtrXn$_sXYm>hx{(95 d/W?.&tTo@.=|}0`,!G]4SVOr_!mxSTaU%AK;' );
define( 'NONCE_KEY',        'HXo}: A>&,!&GZcP9J<kG?dQa5sC .P;?37yeY$z%FTnVy;`Pi~t!c>)& }zczSt' );
define( 'AUTH_SALT',        'h=OkVf%*UuC0{Ua29=>B4x$h.guVaqV3 W[=i[vB]Nd_!AOP6vtXb)$a8{zkVX4R' );
define( 'SECURE_AUTH_SALT', 'ZFIg2/P8$LwzO(csW8H)gOz*UFdHy8>@R4Xjr312M,lxIctm*,*_pTo+m~.-E;Pr' );
define( 'LOGGED_IN_SALT',   '/H7$)%O%QK~kz]l8,k|&dZt{e05<$TtJH;1XT6ykRY3w&s1Y#<I$GxDWR~j=H( }' );
define( 'NONCE_SALT',       '?D@z#yL:zLZm= /~mvC:ynh1gc *?vl^6}0jfq/#=H[b;oi?e08L<E_L?U^>d/h ' );

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
