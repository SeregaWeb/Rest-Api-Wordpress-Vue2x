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
define( 'DB_NAME', 'vue_vp_blog' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

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
define( 'AUTH_KEY',         '+-6gAIK?T+d[(~ 4V +RW`N/zMQb/u67XMp?}xpJB2A0hqG6X{h,n<E9]?qZ24.4' );
define( 'SECURE_AUTH_KEY',  'z-TCW]5Or,i,(dqH|w,1Yf.6f0b`Os_)y`C09`~W98+7-/We=~`EWJ[mgv;k!c?z' );
define( 'LOGGED_IN_KEY',    ';zc[/vjy22p|o.c,KDOOF[beiaaBM_T`%>:4_b[I}(R06`w#Qo6IBI6h@ry3J1ZJ' );
define( 'NONCE_KEY',        'IQm3QmJS7h/P}f gEYcKqn7QWQ+#+{s)4Y+4+heL?f..tx$:U9QzYhpZ=YPhIZ{-' );
define( 'AUTH_SALT',        'E} i8MXvX}ES5ma->m`JhC}@SZT%zo8Jj+q0s1;|hHzjLmtm#]n>:pFQ1`+1JMs7' );
define( 'SECURE_AUTH_SALT', '$GJkUaU(kY+Pw>F4PV|L4(ugi-$8@v-c9?pSR$#hn>INvv11Bn;3wFJDK Op$`(R' );
define( 'LOGGED_IN_SALT',   '+Bc/v~8q.ccjk(Pur=yi.V}7g_5ihB~5]+j@,W]1nh1uu^i-dqK?.k~A:FDBzw&L' );
define( 'NONCE_SALT',       'U^vGPOnjX[V(VM/ WuIT=9d$L}s*Q5+os:nngn`7)=bTRO.{ <X5bHisx!&E7-^*' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'Vwp_';

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
