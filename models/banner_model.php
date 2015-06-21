<?php

/**
 * Модель
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

class Banner_Model
{
    public $table;
    private $res;
    
     
    public function __construct()
    {
        $this->table = 'banners';
        
    }
    
    /*
    * 
    */
    public function createBanners($template, $limit = 1)
    {
        $sql = "SELECT * FROM `". PHT_DBPREFIX . $this->table ."` ORDER BY RAND() LIMIT ". $limit;
        $this->res = mysqlQuery($sql);
        
        $rows = '';
        $tpl = getTpl($template);
        
        while($row = mysql_fetch_assoc($this->res))
        {
            $row['title'] = htmlspecialchars($row['title']);
            
            $rows .= parseTpl($tpl, $row);
        }
        
        return $rows;
    }
    
}