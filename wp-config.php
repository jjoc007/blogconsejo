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
define('DB_NAME', 'concejoBta');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         '/D`cnHFzesP`zdbMtn~^,pB8;MlOq14)3a(V-S2vy);wYp9rp7H[Na}~INlt7c$r');
define('SECURE_AUTH_KEY',  '+yo.O>@kE?+pk_tCrLM$7<XER*|7*Lm6csnZm[dR8]fH~EB=nhwH`-jR8nUD0/KE');
define('LOGGED_IN_KEY',    'y,z>ca~],[DHcr=]B]r@hEyPKp6iBK/e7QWGE/&8wcRL,ytK~e;falJG|0QRhE@2');
define('NONCE_KEY',        'Uz9*1p9Cb:.RR0Po#MS;.0Aw~.G+*H<0V%c_bKu.=~d ,nI.*(4kpV6xd*K.[Coz');
define('AUTH_SALT',        'PzYjXj@58-._|Z*fM}lT/UmOd8G9weRj78VDN3vj:%!qTm^o%YEp R.]JsNY?xxp');
define('SECURE_AUTH_SALT', 't_][t7Cq1KEUb)B+Ylzb]AK5{C2Cj4n=cdXYh&#1UxR@| /Xsb{1hvtLoK8F=#Rk');
define('LOGGED_IN_SALT',   'd&]G[]Ig9ew}4AQ#=n|)-gYzu)xvf,z`u][%wAl;BT=MH,fPi@Ca]KM=#|?iK `h');
define('NONCE_SALT',       'i?la:bry#`vAd,}Fo2pbyp2A+)jSIc|j5=7O9Geo+{4psEr*L-sD2|&~M1M[>0r>');

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
