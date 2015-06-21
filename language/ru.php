<?php

/**
 * Language file (Russian)
 * Языковый файл (русский) 
 * @author Vasya Hebryan - PhotoCamera e-Shop
 * @copyright © 2012 PhotoCamera e-Shop 
 */
/////////////////////////////////////////////////////////


/**
 * Generation of page of an error at access out of system
 * Генерация страницы ошибки при доступе вне системы 
 */
if(!defined('PHT_KEY'))
{
    header("HTTP/1.1 404 Not Found");
    exit(file_get_contents('./404.html'));
}

define('PHT_LANG_FULL', 'Читать дальше');
define('PHT_LANG_BACK', '');
define('PHT_LANG_NO_NAME',   'Нет имени');
define('PHT_LANG_NO_TEXT',   'Нет текста');