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

/**
 * Блок записи информации
 */
if($ok)
{
    if(!$POST['value1'])
        $info[] = PHT_LANG_NO_NAME;
    
    if(!$POST['value2'])
        $info[] = PHT_LANG_NO_TEXT;
    
    if(empty($info))
    {
        $sql = "INSERT INTO `". PHT_DBPREFIX ."guest`
                SET
                `name` = '". escapeString($POST['value1']) ."',
                `text` = '". escapeString($POST['value2']) ."'";
        mysqlQuery($sql);
        
        reDirect();
    }
}

$pgt = new IRB_Paginator($GET['num'], PHT_CONFIG_NUM_ROWS);

$sql = "SELECT DATE_FORMAT(`date`, '%d-%m-%Y') AS `date`, `name`, `text`
        FROM `". PHT_DBPREFIX ."guest`
        ORDER BY `id` ASC";

$res = $pgt->countQuery($sql);

$page_menu = $pgt->createMenu();
$rows = '';

if(mysql_num_rows($res) > 0)
{
    $tpl = getTpl('guest/rows');
    $bb = new IRB_BBdecoder();
    
    while ($row = mysql_fetch_assoc($res))
    {
        $row['name'] = htmlspecialchars($row['name']);
        $row['text'] = $bb->createBBtags($row['text']);
        $rows .= parseTpl($tpl, $row);
    }
}
$POST = htmlChars($POST);
include PHT_ROOT .'/skins/tpl/guest/show.tpl';


    
 