<?php    

/**  
* The main router 
* Главный маршрутизатор (роутер)  
* @author Vasya Hebryan - PhotoCamera e-Shop
* @copyright © 2012 PhotoCamera e-Shop
*/ 
///////////////////////////////////////////////////////// 

/** 
* Устанавливаем кодировку и уровень ошибок 
*/ 
    header("Content-Type: text/html; charset=utf-8"); 
    error_reporting(E_ALL);  
    
    // Запускаем сессию 
    session_start();
    // unset($_SESSION);
    
    // Включаем буферизацию
    ob_start();

/**
 * Debug
 * Дебаггер 
 * @TODO to clean in release
 */
    define('PHT_TRACE', true);
    include './debug.php';
    
/**
 * Устанавливаем ключ-константу 
 */
    define('PHT_KEY', true);
    
/**
 * Подключаем файлы ядра 
 */
    include './config.php';
    include PHT_ROOT .'/variables.php';
    include PHT_ROOT .'/language/ru.php';
    include PHT_ROOT .'/libs/mysql.php';
    include PHT_ROOT .'/libs/default.php';
    include PHT_ROOT .'/libs/view.php';
    include PHT_ROOT .'/libs/cart.php';

    //exit("<pre>".print_r($CART, 1));
   // var_dump($_SESSION['cart']);
    
    
/**
 * Переключатель страниц 
 */
    switch($GET['page'])
    {
        case 'main' :
            include PHT_ROOT .'/controllers/main_controller.php';
            $active_menu['main'] = 'id="menu_active"';
        break;
    
        case 'about' :
            include PHT_ROOT .'/controllers/about_controller.php';
            $active_menu['about'] = 'id="menu_active"';
        break;
    
        case 'news' :
            include PHT_ROOT .'/controllers/news_controller.php';
            $active_menu['news'] = 'id="menu_active"';
        break;
    
        case 'delivery' :
            include PHT_ROOT .'/controllers/delivery_controller.php';
        break;
    
        case 'payment' :
            include PHT_ROOT .'/controllers/payment_controller.php';
        break;
    
        case 'production' :
            include PHT_ROOT .'/controllers/production_controller.php';
            $active_menu['production'] = 'id="menu_active"';
        break;
        
        case 'contacts' :
            include PHT_ROOT .'/controllers/contacts_controller.php';
            $active_menu['contacts'] = 'id="menu_active"';
        break;
    
        case 'cart' :
            include PHT_ROOT .'/controllers/cart_controller.php';
        break;
    
        case 'checkout' :
            include PHT_ROOT .'/controllers/checkout_controller.php';
        break;
    
        case 'article' :
            include PHT_ROOT .'/controllers/article_controller.php';
        break;
    
        default :
            include PHT_ROOT .'/controllers/main_controller.php';
        break;
    }
    
    $title = getMeta('title', $GET['page']);
    $keywords = getMeta('keywords', $GET['page']);
    $description = getMeta('description', $GET['page']);
    
    // Заканчивае буферизацию и помещаем вывод в переменную $content
    $content = ob_get_clean();
    
/** 
* Подключаем главный шаблон 
*/ 
    include PHT_ROOT .'/skins/tpl/index.tpl';