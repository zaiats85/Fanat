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
define('DB_NAME', 'everest');

/** MySQL database username */
define('DB_USER', 'oleg');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         '/>V(7w<[c+#L(v0x`WMNz.].~DB.C0z|R;-KEe8UNCD|gS-8R ChK+_T6>8u>|dT');
define('SECURE_AUTH_KEY',  'br2KU3[=PIl>a2[JT,[dVPV{KvrS~;5*.-q-!s&-MIHXiiEQKBnujayN@y.=%IOE');
define('LOGGED_IN_KEY',    'r*CBIB-$[8uH`gZnz/Dq8_vl2*zE@?)Z|7~DmbOUlbv V:*)6OTg#R;&Dpdp#wO+');
define('NONCE_KEY',        'V-v 8-gK>n<[9+_}m&YRl+Hx^A#+0>nR l*_QCg(@ZPLLJ?hc&ZIT}{4k^Sxe$P=');
define('AUTH_SALT',        'W:-GJ9AD[<K?AZ0}O[,tmT05)VT2`|P K<h! HB5GUN=7f cA%Guqw UMe</1j9c');
define('SECURE_AUTH_SALT', 'O+Mzf1T$^#=LgOU,Y.)^N:f*-zF>?!r6s+_:iD8)@4STa_@_h--91+7`aEg-i{$_');
define('LOGGED_IN_SALT',   'Bt;_R8L;>~5Mr@g}V7]W0+mbcc]0BG]FZIw:P&9rne$(e*D^+^LarKARQN>|b5q%');
define('NONCE_SALT',       'A?OUm*Hsnd%d`cH9G{@2|O8@t[#:: X`!MREEeJtJ,o))P+ZK?j6|jTWcDeWn ,J');

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

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');


