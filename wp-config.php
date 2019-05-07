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
define( 'DB_NAME', 'wp798' );

/** MySQL database username */
define( 'DB_USER', 'wp798' );

/** MySQL database password */
define( 'DB_PASSWORD', '257!.Sj1p3' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'awcgej0erld1kwwoawvq5rvx6oecvy4ajcqeut09kyzcmeleu3r94cskghpjbspf' );
define( 'SECURE_AUTH_KEY',  'a8ascexbvm2yzmb2meols6zfmuiuejngoikyk6jojwy2ucjh43tcowralf8jpcwn' );
define( 'LOGGED_IN_KEY',    'uobfkzoyzczp5pf7uynozxv9xbmomagbsdxnycesz95zpnjfonqeinzlhwnwfdme' );
define( 'NONCE_KEY',        'loqwxvl1dpxcbfrinanxqadwdlyuzqy3aadjqahekerfmlgfee1harv5d6c6vwk2' );
define( 'AUTH_SALT',        'qyisxlszywl3jfo4djvaxg1o5auaqhfsymsydzlauwojwus0x1ctgbqrdyfbslzh' );
define( 'SECURE_AUTH_SALT', 'tmpngyzgvplmbs8yzlpcmcbsmy6mijcql0vzkiof6lyyjbixgwctispk1abkz1if' );
define( 'LOGGED_IN_SALT',   'vrtrve4mfva8stny1rhq6wnyakrzxduv0z6oyxtlw9pvbmcykowt4n2bkfklbtwj' );
define( 'NONCE_SALT',       '1pdptclakcraomyv7kcexluemhengkztcmyfq3xkyvwybqmsdfg7hdoymt5ox4jq' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wptt_';

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
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );

@ini_set( 'upload_max_filesize' , '128M' );
@ini_set( 'post_max_size', '128M');
@ini_set( 'memory_limit', '256M' );
@ini_set( 'max_execution_time', '300' );
@ini_set( 'max_input_time', '300' );
