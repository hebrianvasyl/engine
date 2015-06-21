<?php

/**
* Library of functions for work from DB MySQL
* Библиотека функций для работы с БД MySQL
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

/**
 * Функция обработки литеральных констант для SQL
 */
function escapeString($data)
{
    if(is_array($data))
        $data = array_map ("escapeString", $data);
    else
        $data = mysql_real_escape_string ($data);
    
    return $data;
}

/**
 * Function for inquiry to DB MySQL
 * Функция для запроса к БД  MySQL
 */
function mysqlQuery($sql, $print = false)
{
    $result = mysql_query($sql, PHT_CONNECT);
    
    if($result === false || $print)
    {
        $error = mysql_error();
        $trace = debug_backtrace();
        
        $head = $error ?'<strong style="color: red;">MySQL error: </strong>'
                .'<br />'
                .'<strong style="color: green;">'. $error .'</strong>'
                .'<br /><br />':NULL;
        
        $error_log = date("Y-m-d h:i:s") .' '. $head
                     .'<strong>Query: </strong><br />'
                     .'<pre><span style="color: #CC0000">'. $trace[0]['args'][0] .'</pre></span>'
                     .'<br /><br />'
                     .'<strong>File: </strong><strong style="color: #660099">'. $trace[0]['file'] .'</strong>'
                     .'<br />'
                     .'<strong>Line: </strong><strong style="color: #660099">'. $trace[0]['line'] .'</strong>';
    
        /**
         * TODO to clean in release 
         */
        //--------------------------------
            die($error_log);
        //--------------------------------
            
        file_put_contents(PHT_ROOT .'log/musql.log', strip_tags($error_log) ."\n\n", FILE_APPEND);
        header("HTTP/1.1 404 Not Found");
        die(file_get_contents(PHT_ROOT .'/404.html'));        
    }
    else
        return $result;
}

/**
 * Connection and installation of charset of connection 
 * Подключение и установка кодировки соединения
 */
$db_pht = mysql_connect(PHT_SERVER, PHT_DBUSER, PHT_DBPASSWORD) 
        or die('No connect');

define('PHT_CONNECT', $db_pht);

mysql_select_db(PHT_DATABASE, PHT_CONNECT)
        or die('No database selected');

mysql_query('SET NAMES utf8');