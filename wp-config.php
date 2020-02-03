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
define( 'DB_NAME', 'pranda' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         'd}Q%9n)kh4I[tQ_H!j/V1zztx4l&Qf=69c$rGp,4gmaIE9B1oYU3kwj]Waw0dq}W' );
define( 'SECURE_AUTH_KEY',  'bD|OO2qbXVfN]L9&<~wuZ`_3(kMtEU%+3X5tlZsWSg13?)uZ;87+TQ.6Cxwr~O.O' );
define( 'LOGGED_IN_KEY',    '~a,n3+(w{i;A-N>i=b%RUiGXh[U{~Xw:8wm8?zPjz Yc-/uA~C|&c`^5PR>wrL$b' );
define( 'NONCE_KEY',        'Wc)LNxAUP=+*3`WMH9;j_-On.zemO`&lq!xLcusG.ynF$~_QW_{TdwzD7:9>C<+<' );
define( 'AUTH_SALT',        '<ON1Ao{-dP8(?C5m;eh(riCa$C2-v&~+ql*%YaCoFi~HQTA={-({f2w1}DNdIwu*' );
define( 'SECURE_AUTH_SALT', 'py}^9`P333mCpo**Tw#Ah XO=wf|%k4M.V5~s26}ay@!m6rKRkNMIiY0|hK%^[_L' );
define( 'LOGGED_IN_SALT',   'WJ+I7kV`l,c279]$(}ql|rj>-[*`R|]R;=Ba,3PcF.w~b})Re6D)/[NfOi*9ZFmP' );
define( 'NONCE_SALT',       'l99nZ7T^r#V_)mqYWs4[a FbsLvO#%lS{dol/}m+Y6Mzrw3m2_]x}h^Y-/Zs<^Mb' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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
