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
define( 'DB_NAME', 'nwddevne_wp80' );

/** Database username */
define( 'DB_USER', 'nwddevne_wp80' );

/** Database password */
define( 'DB_PASSWORD', 'F8S]-8ZpB4' );

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
define( 'AUTH_KEY',         's7hgjmqxtkmygvv6y8rzrawr5hjrzqpinqmmihwbfvskwvfacveoc08iozcwbh5o' );
define( 'SECURE_AUTH_KEY',  '6g6g4vc1jmozjazolwwpusvdf79cqwytk37qwa9mgb8vz6flqfl1u6lr62deigxy' );
define( 'LOGGED_IN_KEY',    'aovei4mku8udcfj6sjakdjrdisabkxlro2sbtvswvenqziv14xfh0jnxrj3njbva' );
define( 'NONCE_KEY',        'ymz3sumuo7dvv6lmvvdnahpryh5onrszrx6rhhpen5mr7df64mc1zcsw0njrueej' );
define( 'AUTH_SALT',        'ifvjmbnol63ygorr6frkfdgsoyqbq91lw6bd39zz5orzlhy5obapcwzicmh7vdsz' );
define( 'SECURE_AUTH_SALT', 'we9jvvjp2yydxuupgfys6yfrsewg6tf7fznlb9kcfdsr4s3qq9taxtyddguji9gy' );
define( 'LOGGED_IN_SALT',   'ixiupbp561kz4eveycrxpztcqtfxwf5kym06xg1agho7cxuwckviwdq7wwokfvxr' );
define( 'NONCE_SALT',       'ziihgqchcxxvnwi4pa35fn6tkzeoogdjkupumbs3y8uke5ngahdzzldytxausw05' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wprg_';

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
