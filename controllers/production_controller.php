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

$prod = new Production_Model('production', $GET['num']);
$banners = new Banner_Model();

$banner_rows = $banners->createBanners('banners/show', 2);

if($GET['mod'] === 'product')
{
    $prod->createCategory($GET['parent']);
    $prod->createProduct($GET['id']);
    $cat_name = $prod->cat_name;
    $back_link = '<a href="'. href('mod=all') .'">Продукция</a> / '. '<a href="'. href('mod=cat', 'parent='. $GET['parent']) .'">'. $prod->cat_name .'</a> / ';
    $production = $prod->createRows('production/product', 'product'); 
    $page_menu = '';
}
elseif($GET['mod'] === 'cat')
{
    $prod->createCategory($GET['parent']);
    $prod->createListProduct($GET['parent'], PHT_CONFIG_NUM_ROWS, PHT_CONFIG_NUM_WORDS);
    $back_link = '<a href="'. href('mod=all') .'">Продукция</a> / '. $prod->cat_name;
    $cat_name = $prod->cat_name;
    $production = $prod->createRows('production/product_rows', 'product', true);
    $page_menu = $prod->menu;
}
else
{
    $prod->createCategory();
    $cat_name = $back_link = '';
    $back_link = 'Продукция';
    $production = $prod->createRows('production/categories_row', 'cat');
    $page_menu = '';
}
if(!$production)
{
    $production = '<span class="production-empty">'.
                    'Извините, но товаров по даному критерию не обнаружено.'.
                  '</span>';
   $page_menu = '';
}
include PHT_ROOT .'/skins/tpl/production/show.tpl';