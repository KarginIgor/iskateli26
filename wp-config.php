<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://ru.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'iskateli' );

/** Имя пользователя MySQL */
define( 'DB_USER', 'mysql' );

/** Пароль к базе данных MySQL */
define( 'DB_PASSWORD', 'mysql' );

/** Имя сервера MySQL */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '@WN{_K2>}b/njz o=5op1yd=]Q%Gk ^(NGQ-9x]pL1U2AJI?eq)1SD|Ti,zUI%ki' );
define( 'SECURE_AUTH_KEY',  'mzGb-B^4^qu%fNS&K_&MO/E=&Iv1~5^%T hDqI1&v.Kwnd6p=a?^uoKb98{{)o(5' );
define( 'LOGGED_IN_KEY',    'Yf?N_S!lB6Zhm;t!1Zw%sp; yH(3Mcnc+8|9B2/?s[e[(*. 9gldOsiT>T4rs#G]' );
define( 'NONCE_KEY',        '/~0j0k;.lpFwm|YWT~;MEf.@),g-P0Q:1!Ax,HYH;RYs<=3o1[A}ifz@XBug$=[a' );
define( 'AUTH_SALT',        'c5>(Wdxu*~{Vq3/05puD3zcvg<oL4vY.rl iX40mhSI9X *vlatR{:c}KwD3~Qua' );
define( 'SECURE_AUTH_SALT', '*(T86|k+rvf:wJ:Smyu$x7oS~)eO-ZqevVOpm4@a4WsI!;R#]]Emec5FnA$BV9Fu' );
define( 'LOGGED_IN_SALT',   '>AN;|O{3|*BA:{7EZ+<2Vlab9h6Ethe1qv|sQdbQ1^!22M284W~VlYnb`!PG5zw+' );
define( 'NONCE_SALT',       'Y{J3HaM cC-PPDTZV.5qTWS9CZDbr6djni`7UoZ?hR5{!{iLG#kyVk:UqK^khqbG' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в документации.
 *
 * @link https://ru.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once ABSPATH . 'wp-settings.php';
