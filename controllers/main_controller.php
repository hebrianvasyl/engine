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

$news = new Line_Model('news');

$news->createPerview(PHT_CONFIG_MAIN_ROWS, PHT_CONFIG_NUM_WORDS, false);
$news_rows = $news->createRows('main/news_rows', 'full', PHT_LANG_FULL);

$product = new Production_Model('production');

$product->createLastProducts(PHT_CONFIG_NUM_WORDS, '6');
$product_rows = $product->createRows('main/product_rows', 'product', true);

$product->createCategory();
$category_list = $product->createRows('main/categories_list', 'cat');

$stc = new Static_Model('main');
$main_content = $stc->createContent();


include PHT_ROOT .'/skins/tpl/main/show.tpl';