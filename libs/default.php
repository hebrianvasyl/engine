<?php

/**
* Library of the general functions
* Библиотека общих функций
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

/**
 * Функция перенаправления
 */
function reDirect()
{
    $arguments = func_get_args();
    
    if(count($arguments))
    {
        header('location: '. href($arguments));
        exit();
    }
    else
    {
        header('location: '. str_replace("/index.php", "", $_SERVER['HTTP_REFERER']));
        exit();
    }
}

/**
 * Вывод информации
 */
function getInfo($info)
{
    if(count($info))
        return '<br />'. implode ('<br />', $info);
    else
        return '&nbsp;';
}

/**
 * Функция формирования GET-параметров 
 */
function href()
{
    global $GET;    // Объявляем массив $GET, сформированый ранее, глобальным
    $tmp = $GET;    // Перевисываем переменную, что бы не влиять на глобальный массив
    $href = '';
    $host = PHT_HOST;
    // Получаем массив аргументов переданных в функцию (тут_вот)
    $arg = func_get_args();
    // Задел на будущее - ссылки для админи
    if(defined('PHT_ADMIN'))
        $host .= 'admin/';
    // Ссылка на корень сайта
    if($arg[0] == 'host')
        return PHT_HOST;
    // Если аргумент - массив, берем первый элемент
    if(is_array($arg[0]))
        $arg = $arg[0];
    // Перебираем полученые аргументы
    foreach ($arg as $var)
    {
        // Разделяем имя переменной и значение (page=gallery, например)
        $param = explode('=', $var);
        // Если в массиве $GET ($tmp) есть ключ, полученый выше (в данном случае 'page')
        if(array_key_exists($param[0], $tmp))
            $tmp[$param[0]] = $param[1]; // То этому ключу присваиваем полученое значение
        else // Иначе выдаем ошибку, что такая переменная не зарегестрирована
            die('The variable <strong>'. $param[0] .'</strong> is not defined');
       
    }
    // Обрезаем те параметры, которые не передались в аргумент
    $cnt = array_flip(array_keys($tmp));
    $tmp = array_slice($tmp, 0, $cnt[$param[0]] + 1);
    // теперь поочередно вставляем значение из GET ($tmp) в ссылку
    foreach ($tmp as $var => $val)
        if(PHT_REWRITE === 'on')
            $href .= '/'. $val; // Если Rewrite включен - ссылки через слеш
        elseif(!empty($val))
            $href .= '&'. $var .'='. $val; // Если нет - обычные GET параметры
        //Обрезаем пустоту скраю, чтобы было красивее
        if(PHT_REWRITE === 'on')
            return $host . hrefTrim($href); // Обычная функция trim() не подходит, пользуем свою
        else
            return $host .'?'. trim($href, '&');
}

/**   
 * Адаптированная обертка функции trim() 
*/   
function hrefTrim($link)
{
    return preg_replace('#(/0)+$#', '', ltrim($link, '/'));
}

/**
 * Автозагрузка классов
 */
function __autoload($classname)
{
    ini_set('include_path', PHT_ROOT .'/models');
    include_once strtolower($classname) .'.php';
}