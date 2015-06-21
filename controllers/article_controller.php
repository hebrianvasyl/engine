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
$article = new Line_Model('article', $GET['num']);

if($GET['mod'] === 'full')
{
    $article->createFull($GET['parent']);
    $rows = $article->createRows('article/rows', 'all', PHT_LANG_BACK);
    $page_menu = '';
}
else
{
    $article->createPerview(PHT_CONFIG_NUM_ROWS, PHT_CONFIG_NUM_WORDS);
    $rows = $article->createRows('article/rows', 'full', PHT_LANG_FULL);
    $page_menu = $article->menu;
}

// Подключаем шаблон модуля
include PHT_ROOT .'/skins/tpl/news/show.tpl';