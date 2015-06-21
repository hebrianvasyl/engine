<?php

/**
 * Контроллер
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

// Вызываем класс
$news = new Line_Model('news', $GET['num']);

$banners = new Banner_Model();

$banner_rows = $banners->createBanners('banners/show', 1);

// Теперь это не функции. а методы класса. Значит обозначим принадлежность.
if($GET['mod'] === 'full')
{
    $news->createFull($GET['parent']);
    $rows = $news->createRows('news/full', 'all', PHT_LANG_BACK);
    $page_menu  = '';
}
else
{
    $news->createPerview(PHT_CONFIG_NUM_ROWS, PHT_CONFIG_NUM_WORDS);
    $rows = $news->createRows('news/rows', 'full', PHT_LANG_FULL);
    // Достаем из обэкта внутриклассовую переменную (свойство)
    $page_menu = $news->menu;
}

// Подключаем шаблон модуля
include PHT_ROOT .'/skins/tpl/news/show.tpl';