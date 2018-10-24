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
define('DB_NAME', 'theme_from_scratch');

/** MySQL database username */
define('DB_USER', 'root');

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
define('AUTH_KEY',         '8`kO$=(fjmi*ZI702g^z{/ag-E7kG/Wo5IpO1}ERZrg-^7HfFeO:>= bT1a#V]{C');
define('SECURE_AUTH_KEY',  'GHNr%;/JM>KBWz8E$V7ST1^Z@veig.9HsK4qD[rD*_^(}_53^)V:O.&1]H1_QNQ<');
define('LOGGED_IN_KEY',    '?{g,C#AF(y4#?j$|_;fc(=7*N65veFd>`=~$V>8t+.<@:IA$r_>hFMcoV|ZEkWLX');
define('NONCE_KEY',        'E*Yp5<0gT<R~&FFm`9O,]v?>XA8>#fixcr|& =6eQ3Oz+;m{q9ZgnL{je>`JVw;<');
define('AUTH_SALT',        'A;N_3y?$EGvD,uPya34U;k+(>3TscWvlqO8Y>RA!Ot|&;*:QQ v9yf,-e=;7kbHF');
define('SECURE_AUTH_SALT', 'Q`ZSuzP2`L@(7[Lu0Q$xgO8tF,9U-Wi~J6{ e2y.lTx?Ae{fSSSiQEjMb3@DaYj,');
define('LOGGED_IN_SALT',   '4/X=0+dPWV<0?KdTLpPGSK+gA9^o@~TV #m>`vtBr=+Yw/h@+9h|&!CO%/xdgF=A');
define('NONCE_SALT',       'Az^.[6lLR^j^O&%2?AA/$r$%wp@6s]L ]M8myn3@M=Lj0@=-7 B,SG(U5*3ffwND');

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
