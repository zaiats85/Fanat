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
define('AUTH_KEY',         '1&Vw5%d]as9_>,g7+OIv{jH{xt3)v:@m:jz>%] Lr[^QQzh|4rGIn5}=T8I+dC44');
define('SECURE_AUTH_KEY',  'CRnCF,BBoHg)U>{KDRCs`)op=RAf^xovf^;ik|~Mv3m|M+ZF$!?l%s,][Zru}{0~');
define('LOGGED_IN_KEY',    'g*=0!myW&wN=pyTd/?@#+7 RW1x8Hr;U~Pl+A~#zCfV<HdI0Y,OV+OoRpM7O~ 1X');
define('NONCE_KEY',        'u{BR&! 7fjc/jHPp|;ccD ?67K){owoX~Lncu/;4,Goz9NsysDOjZ(y ?[Aoz(su');
define('AUTH_SALT',        'BnIytot0U<&3T& l2&-A/2-(=|cl{N/&L,oelCj)j@m6+[R[~ye!M,v`+3mo{(<-');
define('SECURE_AUTH_SALT', 'ckj+KMPgqm+_<mu.b4~>E0= 22TwJ|bH[9AHuQE1:r`5FqEE@]4:<G|!]Nv%6]?J');
define('LOGGED_IN_SALT',   'SV:/l$>y]?kDj(mDn(Hom!Y+&8j`+qM^X<COeGD2qS-CtoV8?-3O&i%Hh/. [lG/');
define('NONCE_SALT',       'YmQvFt.>/[|%iShDa1~}(b@@KTbYucA6gI_*0tC5&o d5-;5U4K$WN!NSCfY1w&r');

/**#@-*/

/**
 * Install plugins on localhosl
*/

define('FS_METHOD', 'direct');

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

