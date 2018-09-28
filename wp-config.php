<?php
/**
 * Основне поставке Вордпреса.
 *
 * Ова датотека се користи од стране скрипте за прављење wp-config.php током
 * инсталирања. Не морате да користите веб место, само умножите ову датотеку
 * у "wp-config.php" и попуните вредности.
 *
 * Ова датотека садржи следеће поставке:
 * * MySQL подешавања
 * * тајне кључеве
 * * префикс табеле
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL подешавања - Можете добити ове податке од свог домаћина ** //
/** Име базе података за Вордпрес */
define('DB_NAME', 'odmc');

/** Корисничко име MySQL базе */
define('DB_USER', 'odmc');

/** Лозинка MySQL базе */
define('DB_PASSWORD', 'qMHgpQNuWI2FjhTP');

/** MySQL домаћин */
define('DB_HOST', 'localhost');

/** Скуп знакова за коришћење у прављењу табела базе. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Не мењајте ово ако сте у сумњи. */
define('DB_COLLATE', '');

/**#@+
 * Јединствени кључеви за аутентификацију.
 *
 * Промените ово у различите јединствене изразе!
 * Можете направити ово користећи {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org услугу тајних кључева}
 * Ово можете променити у сваком тренутку да бисте поништили све постојеће колачиће.
 * Ово ће натерати кориснике да се поново пријаве.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'S`q=[|kdon^o,]J|-e=mRlcXI8q7?*v7Q$_MxM{`v:!nC[23>qS~_TiHqerux=o-');
define('SECURE_AUTH_KEY',  ' zR&q 9o!8-]ve-]I MM*| K>{e* JeWl8p)iYkrk%AnpiIx)#@j@}H /9?>r(Ew');
define('LOGGED_IN_KEY',    '2M|fB5!NQNk}_D[lA)6kxzPAb_^O8D)h8x6!*nweBb)O9YIuw~Ln[K(M805Q)}B@');
define('NONCE_KEY',        'zw1!6Zvma_h8#rUwSn*GPji:a9EAj>wd&ex~i[|f%q[D|d)ud^dUvIbXfZE[*6wk');
define('AUTH_SALT',        'jZ.lWmA/a.@qU(9/A7Y[p;I r&.+lrNC!/j_oh2UKLQugC^`dm]TMuf!T!M/L~Vs');
define('SECURE_AUTH_SALT', 'L]IcA~#l=c3sD<:45v#5M+NCz&Nr@HIzsaM;Z8< +[gVyp7hMFHE)4,zFKCpKXe!');
define('LOGGED_IN_SALT',   'CA3tvf.PBn)u=V}kF9`fOq-U/+; k0RqLt@r_1F]66EVe8T,NQWa=8@XD&q:tikG');
define('NONCE_SALT',       ' <1:6/@]@6J@1V6oh=KW$P7Pq92;|CI7*)b#fFP m.~JC.D@R`93bshNrt]6#H`Z');

/**#@-*/

/**
 * Префикс табеле Вордпресове базе података.
 *
 * Можете имати више инсталација Вордпреса у једној бази уколико
 * свакој дате јединствени префикс. Само бројеви, слова и доње цртице!
 */
$table_prefix  = 'wp_';

/**
 * За градитеље: исправљање грешака у Вордпресу ("WordPress debugging mode").
 *
 * Промените ово у true да бисте омогућили приказ напомена током градње.
 * Веома се препоручује да градитељи тема и додатака користе WP_DEBUG
 * у својим градитељским окружењима.
 *
 * За више података о осталим константама које могу да се
 * користе током отклањања грешака, посетите Документацију.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* То је све, престаните са уређивањем! Срећно блоговање. */

/** Апсолутна путања ка Вордпресовом директоријуму. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Поставља Вордпресове променљиве и укључене датотеке. */
require_once(ABSPATH . 'wp-settings.php');
