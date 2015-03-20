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
define('DB_NAME', 'zachfe5_zfwpdb');

/** MySQL database username */
define('DB_USER', 'zachfe5_zfwpdb');

/** MySQL database password */
define('DB_PASSWORD', '](kP0S78sY');

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
define('AUTH_KEY',         '7d3veyoyvtv5gwsowahugdwwz4sxtefqmgba3z2pce7bnsuc1gz4zqrz2ycbrzhg');
define('SECURE_AUTH_KEY',  'hnmrud4vbcotjw1dixgpjgy4cqdtnvn5cr7eo0d18spfkqzdzro5xipzvh6uydr5');
define('LOGGED_IN_KEY',    'h9f56th0mvfalvqzs0xtfycx5a5rw5wmpzklb1isxbj7ltzswdtm7kjjxbjdxkew');
define('NONCE_KEY',        'lpmh5w9ajtrd43vno7sotsmye3oyw2byxnl4jt3aevurlrryugilc20lwhnsxtxx');
define('AUTH_SALT',        'irttclopdrnxleocxwpwy3u1gqpnuc5ylneaqqmb2u1ghp8izze9fwmts2qfzu2d');
define('SECURE_AUTH_SALT', 'zl2h6opubbl370if4pvwyuz97xhw7qgzp2jrfkp8yijybt46vwzxiujg251tda4j');
define('LOGGED_IN_SALT',   'lgctizrw9cetrhckjaf8rahqovvsfbbdkurxfo16y5qgyaxa2lcd6xqwlnzrgebm');
define('NONCE_SALT',       'lbhj89deeocfxy7fpqyd6jankkcfftvfjyekr9njnsxuqbdnl9j9ih4vg6cwxybp');

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
