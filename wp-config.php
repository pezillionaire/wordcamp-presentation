<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'scss');

/** MySQL database username */
define('DB_USER', 'pez');

/** MySQL database password */
define('DB_PASSWORD', 've3rew');

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
define('AUTH_KEY',         '$a:dfU|kxW:h?kMI,%,lRs O7-^o4Y sV5:4$tz2zL}F-U@!Ta7vj~^d>m9V-GTp');
define('SECURE_AUTH_KEY',  'k7oHcQ+RaxJiMhNg4s~Tzo5,jsBP%Rp:XZk]9uAolh><be _wZ0o]TP^a5Ha-Z:.');
define('LOGGED_IN_KEY',    'w`wR6@@4r8)Zb+_L 2!vz4yp5-e|cp>Hh4[gKt=Dntb4>QtAS&UpP+ 7C$6yL|dK');
define('NONCE_KEY',        'U>6?|+`SEAq,vGgc TqWE?z5rf&5_*Ld,4=boTU_s@G(BUB!ILvCbkZSz;;NsA`f');
define('AUTH_SALT',        'bfG+HM;&${Sk{Y/P)g=j360v/V&4.3ESf|-#Scv|~ cZ)E+H(`aL!?73s,cb!Q;~');
define('SECURE_AUTH_SALT', '!w,%-3bsMmM$tqaTU>a&x!F0oDFU$W}g-1>6z{ru1`A1$K/vMkwU+El-/!=3oI32');
define('LOGGED_IN_SALT',   'H6#u+?W(%<9^Scimui)73KA+$<2<1zE_;Dk- |?-X4I|7]*$2OHH;3o$Va#_urPi');
define('NONCE_SALT',       'c0+}~,JV)XmzEd|lh{lHn!q-Dm^r$zvl(oR| )vDC[2U=Cdz*Hvsfj6rlmm^p*k9');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
