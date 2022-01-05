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
define('DB_NAME', 'trello');

/** MySQL database username */
define('DB_USER', 'admin');

/** MySQL database password */
define('DB_PASSWORD', 'sacha');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The database collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

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
define('AUTH_KEY',         '!}a`@-Gsj/(!pi1(`Gh!d+T]A=rB]^mFwFV+)/B:*0})N(>Y@km/#}=0Ya1M(N$4');
define('SECURE_AUTH_KEY',  '2*Jn8#g sHh03](0U>YzCVqT}Xw!LDaZP8[Z]fIiQ)Z$aQJx|j*X,EPgJ)w#@Z>E');
define('LOGGED_IN_KEY',    ' 1sYwf=>7a0e3*[9yaC~-E{lvLiky+]m707cS vx!~<f<=+oj]^0YsvlkU0Hvp:r');
define('NONCE_KEY',        'X[l^MH}|P9o/bjW~NrtXC16>Afu(O9EB6(5/<9L@3UhZ(^<3Sf;J^Fu:lY>C!o.p');
define('AUTH_SALT',        '?-[B8L}#:-~ctiM_~#ex=X2jT7_.,$!X>P04[845THGh)R,(!r[lO+x!~m@:wN}l');
define('SECURE_AUTH_SALT', 'yTb~o5o)B@c0E?*~h21Rw**} E.(X <s?K<_*HP@O FEif?K*2V4/:eBCEHlRCLB');
define('LOGGED_IN_SALT',   'a}Jaaq@$R;a3YW=Du+aH;-P5F^Z:^i-v%K4.lRFxqC|hEa-IA(wZsfr/z8dXsh;Y');
define('NONCE_SALT',       'zq;HtGM]ifaz1_w47`%SzYaw{Oz34_Ij|I:Edx_$9~iQApa:-v#lf?3>Ku[U6SYk');

/**#@-*/

/**
 * WordPress database table prefix.
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
define('WP_DEBUG', false);

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if (!defined('ABSPATH')) {
    define('ABSPATH', __DIR__ . '/');
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
