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

define( 'DB_NAME', 'bitnami_wordpress' );


/** Database username */

define( 'DB_USER', 'bn_wordpress' );


/** Database password */

define( 'DB_PASSWORD', '5ed94f6cdf7621d53ae645bb4d80d4793de3031140cd31e6952ce10d482c2e0d' );


/** Database hostname */

define( 'DB_HOST', 'localhost:3306' );


/** Database charset to use in creating database tables. */

define( 'DB_CHARSET', 'utf8' );


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

define( 'AUTH_KEY',         'CtDa4T/:V6D@C]0k8A]o5:CspykZf/0DHBC}+[oid2.)-4RIo>hM7/d;zTVsS)W4' );

define( 'SECURE_AUTH_KEY',  '%^n4yEG=}1rY>hLLn2Ue/j6n?d1?fe]YRzxs^wk-`@FeJ]ZO0vak&qTyUjnJoJY_' );

define( 'LOGGED_IN_KEY',    'Xii2xjo~u!bw/H$BK#kZFQMyk@t7H=/wJN}l3}uhdD8,7[]f#QWVvD lq+t-OAe1' );

define( 'NONCE_KEY',        '6<)@kqjL(wO<aJk:h.#:;tiJH.1i*s,|_dvqtjl,90(oEqjhLM`Vlf&sIpz3t;+7' );

define( 'AUTH_SALT',        'FB$g?6oJ$f=!jaIQ5KjR8A}$Pw^V=:$ugZC`~>UXLnf7I.Ux-W8nx#w89_w)ms/>' );

define( 'SECURE_AUTH_SALT', 'u3w!C*%=5-*lI$H7^e:KkG^{gCP,}jmc[2tMf}`Q]t=pxes~Z4CC+&*4}D19kQf0' );

define( 'LOGGED_IN_SALT',   '$_JUrF3p.rn5WVf+BF=}7W/eBT%k$kdSM>Z#suqYzBb}NJ8{i!BNGZc;vw2quSU;' );

define( 'NONCE_SALT',       '5J4hAy*KROA55DBqlA+c~^Wp|wOxLWk Si,MBzCQW$gzw||4;jJjc!/[#QPwMA=C' );


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




define( 'FS_METHOD', 'direct' );
/**
 * The WP_SITEURL and WP_HOME options are configured to access from any hostname or IP address.
 * If you want to access only from an specific domain, you can modify them. For example:
 *  define('WP_HOME','http://example.com');
 *  define('WP_SITEURL','http://example.com');
 *
 */
if ( defined( 'WP_CLI' ) ) {
	$_SERVER['HTTP_HOST'] = '127.0.0.1';
}

define( 'WP_HOME', 'http://' . $_SERVER['HTTP_HOST'] . '/' );
define( 'WP_SITEURL', 'http://' . $_SERVER['HTTP_HOST'] . '/' );
define( 'WP_AUTO_UPDATE_CORE', 'minor' );
/* That's all, stop editing! Happy publishing. */


/** Absolute path to the WordPress directory. */

if ( ! defined( 'ABSPATH' ) ) {

	define( 'ABSPATH', __DIR__ . '/' );

}


/** Sets up WordPress vars and included files. */

require_once ABSPATH . 'wp-settings.php';

/**
 * Disable pingback.ping xmlrpc method to prevent WordPress from participating in DDoS attacks
 * More info at: https://docs.bitnami.com/general/apps/wordpress/troubleshooting/xmlrpc-and-pingback/
 */
if ( !defined( 'WP_CLI' ) ) {
	// remove x-pingback HTTP header
	add_filter("wp_headers", function($headers) {
		unset($headers["X-Pingback"]);
		return $headers;
	});
	// disable pingbacks
	add_filter( "xmlrpc_methods", function( $methods ) {
		unset( $methods["pingback.ping"] );
		return $methods;
	});
}
