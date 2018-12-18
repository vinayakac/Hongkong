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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'hk_wordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'indegene123');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', 'fb0c6e9e418d27b14c0f0989ab6220734cf2fb19ae1a2cf552dc908e9434185d');
define('SECURE_AUTH_KEY', 'ac1d5dd4257c2920f00860bafaf581e09f63b9a25067ae9bf929da7a6a8c3366');
define('LOGGED_IN_KEY', '541e75a71ed3a054b7a0a67f0161339c6158e33abaa510dddc80299456b69588');
define('NONCE_KEY', 'ac6ceca4734ffdb18202de4a4935b540b2ea43d755d6f5b8a4768d84bab4f36c');
define('AUTH_SALT', '85a7e9a81ee2b7023063b0954d08c633e62eb451e1f60aa8731753fcb5625165');
define('SECURE_AUTH_SALT', '19440317d253c8332a009cf72bf594b3bd206f09cc803d2c627d4e197e792d6a');
define('LOGGED_IN_SALT', 'e1bba1117306b27ff4fa6da5d53310f1360cb3873dc03e4551cc522fce85e0f1');
define('NONCE_SALT', 'e6508a2670b5db87310862ed25564e35a5757788f59a6cfc24cacd127ff6a7d5');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */
/**
 * The WP_SITEURL and WP_HOME options are configured to access from any hostname or IP address.
 * If you want to access only from an specific domain, you can modify them. For example:
 *  define('WP_HOME', 'http://fightthefracture.asia/hk');
 *  define('WP_SITEURL', 'http://fightthefracture.asia/hk');
 *
*/

define('WP_SITEURL', 'http://fightthefracture.hk');
define('WP_HOME', 'http://fightthefracture.hk');


/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

define('WP_TEMP_DIR', '/opt/bitnami/apps/wordpress/tmp');


define('FS_METHOD', 'direct');


//  Disable pingback.ping xmlrpc method to prevent Wordpress from participating in DDoS attacks
//  More info at: https://docs.bitnami.com/?page=apps&name=wordpress&section=how-to-re-enable-the-xml-rpc-pingback-feature

// remove x-pingback HTTP header
add_filter('wp_headers', function($headers) {
    unset($headers['X-Pingback']);
    return $headers;
});
// disable pingbacks
add_filter( 'xmlrpc_methods', function( $methods ) {
        unset( $methods['pingback.ping'] );
        return $methods;
});
add_filter( 'auto_update_translation', '__return_false' );
