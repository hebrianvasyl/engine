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

if(empty($_SESSION['cart']))
    $_SESSION['cart'] = array();

$cart = new Cart_Model();

if(!empty($_POST['update_cart']))
    $cart->update();

if($GET['mod'] === 'remove')
    $cart->remove();


$cart_items = $cart->createRows('cart/cart_rows');
$total_sum = $cart->total_sum; 
if(!empty($cart_items))
    include PHT_ROOT .'/skins/tpl/cart/show.tpl';
else 
    include PHT_ROOT .'/skins/tpl/cart/cart_empty.tpl';