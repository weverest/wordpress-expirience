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
define('DB_NAME', 'wordpress');

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
define('AUTH_KEY',         '/Db3-jwCPT*4JLw]2<Ja_OKh)0d{LY(TeT[<]G:W|iF4%W5<:`j!z(;c1q/G}SN8');
define('SECURE_AUTH_KEY',  'Mb8E|GJC32{g7y^B=jT_658`U/eMSA|K/o&}/L~km,hwv1nVBJ@H4!yTk@;@PV-)');
define('LOGGED_IN_KEY',    'ehZ*AEezUT(Dj+4hR>Qf1x.htlVp-Eph&kYEr6fC9!gO`j[;TR{%j=~w~SbD1+Lb');
define('NONCE_KEY',        ']>oxIX+u UJp8P+_sLTk$:Ty;7,o`UdU|~tU|n$k;[d{F@&]GHs=vaF}6=$9fA>K');
define('AUTH_SALT',        'sqL <oG`D{1-+>PrgFst>ESUlw}1}/E$|yt>3~9B*]d_Us@kMC0M~9n7X|>-+;^I');
define('SECURE_AUTH_SALT', 'O^%&Dee;wKaZ5{t3&- zD&XJx<vK-EMPAFJ/R(9>B*P[,3gm~FydIQXh<Bi^+y8r');
define('LOGGED_IN_SALT',   'o!!~+IwB4{{-.ykfi-/wQd:NZ8iufiwB%gi7,d6P#?tlb&cKq)$3<*I>Y/::{oAs');
define('NONCE_SALT',       '+hr~Q5y ef1X_D0qS])-@@t(%rzQ!w^eu%docS+[[=]Ow#I/lpWeK7[h2[Bh/klS');

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
define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', true);
define('SCRIPT_DEBUG', true);
define('SAVEQUERIES', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
