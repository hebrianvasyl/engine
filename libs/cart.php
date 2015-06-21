<?php

/**
* Library of the cart functions
* Библиотека функций корзины
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

if(!empty($_POST['add_to_cart']))
{
    $id = !empty($_POST['id']) ? $_POST['id'] : '';
    $name = !empty($_POST['name']) ? $_POST['name'] : '';
    $price = !empty($_POST['price']) ? $_POST['price'] : '';
    $count = !empty($_POST['count']) ? $_POST['count'] : '';
    
    if(!empty($_SESSION['cart'][$id]))
    {
        $count += $_SESSION['cart'][$id]['count'];
        $_SESSION['cart'][$id] = array('id' => $id, 'name' => $name, 'price' => $price, 'count' => $count);
    }
    else
    {
         $_SESSION['cart'][$id] = array('id' => $id, 'name' => $name, 'price' => $price, 'count' => $count);
    }
}

function show_cart()
{
    if(!empty($_SESSION['cart']))
    {
        $total_price = 0;
        $total_count = 0;
        
        foreach($_SESSION['cart'] as $item)
        {
            $total_price += $item['price']*$item['count'];
            $total_count += $item['count'];
        }
        
        return  '<p>В корзине <strong>'. $total_count .' товар(-ов)</strong>'.
                '<br />на сумму <strong>'. $total_price .' грн.</strong>'.
                '<br /><a href="'. href('page=cart') .'">Перейти в корзину</a></p>';
    }
    else
    {
        return '<p class="empty">В корзине нет товаров</p>';
    }
}