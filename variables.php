<?php

/**
* The block of initialization and processing of entering variables
* Блок инициализации и обработки входящих переменных
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
* Убиваем магические кавычки 
*/         
    function stripslashesDeep($data)     
    {     
        if(is_array($data))      
            $data = array_map("stripslashesDeep", $data);      
        else    
            $data = stripslashes($data);      
        return $data; 
    } 

    if(get_magic_quotes_gpc())  
    {  
        $_GET = stripslashesDeep($_GET);   
        $_POST = stripslashesDeep($_POST);   
        $_COOKIE = stripslashesDeep($_COOKIE);
        $_REQUEST = stripslashesDeep($_REQUEST);  
    }     

/**
 * Инициализация переменной
 */
$page = !empty($_GET['route']) ? $_GET['route'] : '';

$GET = array(
    'page' => 'main',
    'mod' => 'read',
    'parent' => 0,
    'id' => 0,
    'num' => 0,
);

/**
 * Инициализация переменной из GET-параметров 
 */
if(PHT_REWRITE === 'on' && !empty($_GET['route']))
{
    $param = explode('/', trim($_GET['route'], '/'));
    $i = 0;
    
    foreach ($GET as $var => $val)
    {
        if(!empty($param[$i]))
            $GET[$var] = $param[$i];
        
        $i++;
    }
}
elseif(!empty($_GET))
{
    foreach ($GET as $var => $val)
        if(!empty($_GET[$var]))
            $GET[$var] = $_GET[$var];
}

/**
 * Кнопки
 */
$ok = !empty($_POST['ok']);
$delete = !empty($_POST['delete']);

/**
 * Инициализация переменных POST
 */
$POST = array(
    'value1' => '',
    'value2' => ''
);

if(!empty($_POST['form']))
    $POST = array_merge ($POST, $_POST['form']);

$CART  = array();
@$CART = $_SESSION['cart'];

/**
 * Другие переменные
 */
$info = array();

$active_menu = array(
    'main' => '',
    'about' => '',
    'news' => '',
    'production' => '',
    'contacts' => '',
);