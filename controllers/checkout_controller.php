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

//if(empty($_SESSION['cart']))
//    $_SESSION['cart'] = array();
//
//$cart = new Cart_Model();


if(!empty($_SESSION['cart']))
{
    if(!empty($_POST['next']))
        $step = $_POST['step'];
    else
        $step = 1;

    if($step == '2')
    {
        $date = date('Y-m-d H:i:s');
        $customer_name = $_POST['customer_name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $adress = $_POST['adress'];
        $coupon = $_POST['coupon'];
        $pay_method = $_POST['pay'];

        $sql = "INSERT INTO `". PHT_DBPREFIX ."orders` (`customer_name`, `email`, `phone`, `adress`, `coupon`, `pay_method`, `date`)
                VALUES ('". $customer_name ."', '". $email ."', '". $phone ."', '". $adress ."', '". $coupon ."', '". $pay_method ."', '". $date ."')";

        $res = mysqlQuery($sql);

        if(!empty($res))
            $_SESSION['cart'] = array();
    }    
    include PHT_ROOT .'/skins/tpl/checkout/step'. $step .'.tpl';
}
else
{
    include PHT_ROOT .'/skins/tpl/checkout/empty_error.tpl';
}
