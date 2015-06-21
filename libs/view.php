<?php

/**
* View
* Функции представления
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
 * Функция формирования мета-тегов 
 */
function getMeta($tag, $page)
{
    // Объявляем переменную $meta статичной
    static $meta;
    // Если она пуста и файл с данными на месте
    if(empty($meta) && file_exists(PHT_ROOT .'/setup/meta.txt'))
            // читаем его и демериализуем массив
            $meta = unserialize (file_get_contents(PHT_ROOT .'/setup/meta.txt'));
    
    if(!empty($meta[$page][$tag])) // Если метаданные имеються
        return htmlspecialchars($meta[$page][$tag]); // выводим, предварительно обработав
    else // а на нет
        return NULL; // и суда нет.
}

/**
 * Функция чтения шаблонов 
 */
function getTpl($tpl)
{
    if(file_exists(PHT_ROOT .'/skins/tpl/'. $tpl .'.tpl'))
            return file_get_contents(PHT_ROOT .'/skins/tpl/'. $tpl .'.tpl');
    else
        die('The template <strong>' . $tpl .'.tpl</strong> is absent in the specification');
}

/**
 * Функция разбора шаблона 
 */
function parseTpl($cont, $data = '')
{
    if(is_array($data))
    {
        extract($data, EXTR_PREFIX_ALL, 'tpl');
        
        ob_start();
            eval('?>'. $cont .'<?php ');
            $cont = ob_get_contents();
        ob_end_clean();
    }
    
    return $cont;
}

/**
 * Функция обработки переменных для ввода в поток
 */
function htmlChars($data)
{
    if(is_array($data))
        $data = array_map("htmlChars", $data);
    else
        $data = htmlspecialchars ($data);
    
    return $data;
}