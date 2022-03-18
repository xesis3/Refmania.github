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
define( 'DB_NAME', 'refmania_db' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         'R3LWZhSrtkep[GwdgPKbsgNHWLJs~}H~d=KH[}XF:!_hk=xD)_cDX%8<j{kLUC%;' );
define( 'SECURE_AUTH_KEY',  'Yw[z8%:4Qz`[ EN7,OTJj9.Q_WZWg?4?<U0#QQ~v~4+ cH`/_z~Yeu+[bni3RzB5' );
define( 'LOGGED_IN_KEY',    '_1AWlirdxP3DOet2[9a*#3gnx@l7h1KkY;%@0K69SnPW*AZ2BX %#E^ -Qj1;&BA' );
define( 'NONCE_KEY',        'p9vgmO=Vo^SFXCjDP_9wK[t43+iZN0sL@.$.wR0T5/%p?Nv~,36k60;?Kj`|xQa_' );
define( 'AUTH_SALT',        '!rxN?aG:&@x|x9)TPkW<]LT9MUxDTw$?E#QwD{i$z|g*s3jj8YeXs#O)kuG5PsHH' );
define( 'SECURE_AUTH_SALT', '[[3F;~D W/L8?xnUWS9D@I9eiQ>@w|<}`N`t_uD&i%d.!E?N)l= xC}cpA<ICG<~' );
define( 'LOGGED_IN_SALT',   '^E_nnJz&{_3vU=k ~!<3;wv%^21<0ZDozZeDt8X @f~.mESM`TKB:BGm[!F&R)s]' );
define( 'NONCE_SALT',       ':v4R:)Ph;&V<1}o2,ERsxWCtF>fykQ4+2wYyq )H4I9*|q+IC F$C~GPZr_ mkbw' );

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
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
