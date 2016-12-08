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
define('DB_NAME', 'makarem');

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
define('AUTH_KEY',         'RL8qfkE_xoorf:VB=Y]reIX0!}d=^DF/%h!>n]R`ya^H~K5,zz<q hf j+QNou(B');
define('SECURE_AUTH_KEY',  '2Y*_Ydqqz*.M~&c(-;!mhqc;xFT3,EoLZGw.8*/$#lajYKPm~{6K2J@MSGZIs_<7');
define('LOGGED_IN_KEY',    'l1RXpTTwj!NFYc*/r2-B$_eiGvm:OR[x&CZf0k%4.nFs>2#{gdIec%9uDl(m/gTe');
define('NONCE_KEY',        'iMYTE!&7@>DY`I$zvzbj.ZBd;<Q%e>D.^{b?Y:u#2akW+]R3w5-V$P#vBCKb:A8R');
define('AUTH_SALT',        'k$C=7d8SMVcP;Wig8X16%.PaAJ_n;^`~]47uO&@RD~LjGH7ipHbQ3`.J#!eC=i5v');
define('SECURE_AUTH_SALT', '?!_aZs5 ]K]E#_`Tuf}WI}G6-QU!|AIarIkV?0kL)#s8tu+VC9UQ7!H{,#6xUixy');
define('LOGGED_IN_SALT',   ':lrA|4R4=rLJtcwH~sX[t-j%kO<rbX;Cf/[>mHt2wm !2&qZrc6#;14/I&/ i>sP');
define('NONCE_SALT',       '5FgN[GD,U~2QNr?BDr7*h[^d-&hc_v/a2Il@E9|Oldk4[6 cS_hB=3/9Ccs+Y^4v');

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
