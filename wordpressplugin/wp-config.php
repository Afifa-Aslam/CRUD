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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'WordpressWeb' );

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
define( 'AUTH_KEY',         'J1`/ Ltnw.x?R% h:q+(&qiPDto`1k6:xZ&y=-UaNo*ntqy>#8uI(dH:{gjXh4%E' );
define( 'SECURE_AUTH_KEY',  '(|{d(.MKDmTk-3$7t#;}1yY aOmoQx7_uW8`PFKP9HH.8<P7@riY%G~jFX^iPC5q' );
define( 'LOGGED_IN_KEY',    '`Q{2hgsm;tm}x)/con2+<!xLm;Gg6eONC1,?b5afp98/TVJso(AuO}Zs(yKHi+i:' );
define( 'NONCE_KEY',        '0z ;Ez/x8(=.}B?7>c#eHTr9a^q2@yl.ri~O$<+aL 3m.?xrL}]ihi[}0MNQmBcU' );
define( 'AUTH_SALT',        'MuzkJJ@G:G%xYty$;LmPo`AMS1O(tl;{(B`Vtb_cVr*TCjkjZHAAo`B5)-8L]SSq' );
define( 'SECURE_AUTH_SALT', 'OZDU<Bxg}T>RB&sv4Ir[)&xgbi/=r%ocK!e{SaB@Z=EH >R**RZ5?;lQ?mazfWDO' );
define( 'LOGGED_IN_SALT',   ',Z^cdm8^%TC?3F$Y3g&Dg&+q mW0K3La2-vZP.)nm[bS%:G6#&x[2jQ=-|6H(~1t' );
define( 'NONCE_SALT',       '}mX_|Kk?Imk K5%$ &r){nd]xmprXtVl~+9o$$Av^`S7U=X*4f;ZHvD{EiFrdP,q' );

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
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );
define('WP_ALLOW_MULTISITE',true);
define('MULTISITE', true);
define('SUBDOMAIN_INSTALL', false);
define('DOMAIN_CURRENT_SITE', 'localhost');
define('PATH_CURRENT_SITE', '/WordpressWeb/');
define('SITE_ID_CURRENT_SITE', 1);
define('BLOG_ID_CURRENT_SITE', 1);


/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
