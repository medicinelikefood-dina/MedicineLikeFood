<?php
/** Enable W3 Total Cache */
define('WP_CACHE', true); // Added by W3 Total Cache

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
 * and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', getenv('MYSQL_DATABASE') ?: getenv('DB_NAME') ?: 'wordpress');

/** MySQL database username */
define('DB_USER', getenv('MYSQL_USER') ?: getenv('DB_USER') ?: 'root');

/** MySQL database password */
define('DB_PASSWORD', getenv('MYSQL_PASSWORD') ?: getenv('DB_PASSWORD') ?: '');

/** MySQL hostname */
define('DB_HOST', (getenv('MYSQL_HOST') ?: getenv('DB_HOST') ?: 'localhost') . (getenv('MYSQL_PORT') ? ':' . getenv('MYSQL_PORT') : ''));

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
define('AUTH_KEY',         '1N|uPDpDZHF9O3HBj2~U34jv9R)V%iLyIXP$Z/|kn5AsqSp/W|qsDTy~rZrop47t');
define('SECURE_AUTH_KEY',  '8Y`&9lcnKftTMoM19XY:;~n*g!;9$6%#nt:"l#K7v;*vRRp%D"pPDCai6d7d4Y98');
define('LOGGED_IN_KEY',    'pNhhcEkfXXv`4#%(Cbnu|#d&r7"YWfVGTA2$lW/Tt4@"~:7$O&v?_x*lQ08^DP@$');
define('NONCE_KEY',        'AQGmlloV@vevxFuSUKRA72lvQGyB6|?oj#S!QvcJC"9wFS|a^&FgVOPQN%#a&0AY');
define('AUTH_SALT',        'fA_X`OHB2g%Y?HB#vi5N@CmZwP$$29o;hkpSq;odj^_B:6_*qVqQ3!"^4UPFTfC3');
define('SECURE_AUTH_SALT', 'Nfo)4+RH+:O@4gM%SXP/tz2!~s_;%I"jgZyF&&(QgrCL73Z$_y19nM4bo3m_yML(');
define('LOGGED_IN_SALT',   'StbeNdqdu?+O4gxEC+?qT:v0kJ$d4tLp&QqRGAq4YkmI6Ds0EM|SMrUK&24a)hvm');
define('NONCE_SALT',       'C(tx/CIu:Wk6My+V^nu%Yw7u?;jhDE6NuH5VHFy`Yg%M%77h3NaN!$zdYTEDU5aj');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_yrfv9t_';

/**
 * Limits total Post Revisions saved per Post/Page.
 * Change or comment this line out if you would like to increase or remove the limit.
 */
define('WP_POST_REVISIONS',  10);

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

/**
 * Dynamic site URL detection for Railway
 */
$proto = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https" : "http";
$host = $_SERVER['HTTP_HOST'] ?? getenv('RAILWAY_PUBLIC_DOMAIN') ?? ($_SERVER['SERVER_NAME'] ?? 'localhost');
define('WP_SITEURL', $proto . '://' . $host);
define('WP_HOME', $proto . '://' . $host);

/**
 * Set memory limit
 */
define('WP_MEMORY_LIMIT', '1024M');

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
