<?php    

/**  
* The main configurations 
* Главный файл конфигурация (роутер)  
* @author Vasya Hebryan - PhotoCamera e-Shop
* @copyright © 2012 PhotoCamera e-Shop
*/ 
///////////////////////////////////////////////////////// 

/**
 * Генерация страницы ошибки при доступе вне системы 
 */
if(!defined('PHT_KEY'))
{
header("HTTP/1.1 404 Not Found");
exit(file_get_contents('./404.html'));
}


/////////////////////////////////////////////////////////////
//              OPTIONS OF CONNECTION WITH A DB
//                 НАСТРОЙКИ СОЕДИНЕНИЯ С БД   
/////////////////////////////////////////////////////////////

/**
 * Включает модуль перенаправления 
 */
define('PHT_REWRITE', 'on');

/**
 * Количество слов в анонсе 
 */
define('PHT_CONFIG_NUM_WORDS', 20);

/**
 * Количество рядов в постраничном режиме 
 */
define('PHT_CONFIG_NUM_ROWS', 5);

/**
 * Количество новостей на главной странице
 */
define('PHT_CONFIG_MAIN_ROWS', 3);


/////////////////////////////////////////////////////////////
//              OPTIONS OF CONNECTION WITH A DB
//                 НАСТРОЙКИ СОЕДИНЕНИЯ С БД   
/////////////////////////////////////////////////////////////

/**
 * Префикс таблиц БД
 * Сервер БД
 * Пользователь БД
 * Пароль БД
 * Название БД
 */
define('PHT_DBPREFIX', 'pht_');
define('PHT_SERVER', 'localhost');
define('PHT_DBUSER', 'mysql');
define('PHT_DBPASSWORD', 'mysql');
define('PHT_DATABASE', 'localhost_kursova');

/////////////////////////////////////////////////////////////
/**
 * Устанавливаем физический пусть до кореневой директории скрипта
 */
define('PHT_ROOT', str_replace('\\', '/', dirname(__FILE__)));

/**
 * Устанавливаем путь до кореневой директории скрипта
 * по протоколу HTTP 
 */
define('PHT_HOST', 'http://'. $_SERVER['HTTP_HOST'] .'/');

define('DOLLAR', 8);