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

class Production_Model
{
    public $table, $cat_name;
    private $res, $num;
    
    /**
     * Коструктор
     */
    public function __construct($table, $num = 1)
    {
        $this->table = $table;
        $this->num = $num;
    }
    
    public function createLastProducts($num_words, $limit)
    {
         $sql = "SELECT `id`, `name`, `photo`, `price`,
                SUBSTRING_INDEX (`description`, ' ', ". $num_words .") AS `description`
                FROM `". PHT_DBPREFIX . $this->table ."`
                ORDER BY `id` DESC
                LIMIT ". $limit;
        
        $this->res = mysqlQuery($sql);
        
    }
    
    /**
     * Метод генерации списка категорий
     * @param int $id
     * @return void
     */
    public function createCategory($id = '')
    {
        $sql1 = "SELECT * 
                FROM `". PHT_DBPREFIX . $this->table ."_cat`";
        $sql2 = empty($id) ? " ORDER BY `sort` ASC " : " WHERE `id` = ". (int)$id;
        $sql = $sql1 . $sql2;
        
        //exit(var_dump($sql));
        
        
        $res = mysqlQuery($sql);
        
        //$arr = mysql_fetch_assoc($res);
        
        //exit(var_dump($arr));
        
        if(empty($id))
            $this->res = $res;
        elseif(mysql_fetch_assoc($res) != FALSE)
            $this->cat_name = mysql_result($res, 0, 'name');
    }
    
    /**
     * Метод генерации списка товаров выбраной категории
     */
    public function createListProduct($id, $num_rows, $num_words, $list = true)
    {
        $pag = new IRB_Paginator($this->num, $num_rows);
        
        $sql = "SELECT `id`, `name`, `photo`, `price`,
                SUBSTRING_INDEX (`description`, ' ', ". $num_words .") AS `description`
                FROM `". PHT_DBPREFIX . $this->table ."`
                WHERE `id_parent` = ". (int)$id ."
                ORDER BY `sort` ASC";

        $this->res = $pag->countQuery($sql);
        
        // Призваиваем ему внутри класса значение
        if($list)
            $this->menu = $pag->createMenu();
    }
    
    /**
     * Метод генерации товара
     * @param int $id
     * @return void
     */
    public function createProduct($id)
    {
        $sql = "SELECT *
                FROM `". PHT_DBPREFIX . $this->table ."`
                WHERE `id` = ". (int)$id;
        
        $this->res = mysqlQuery($sql);
    } 
           
    
    /**
     * Метод представления
     * @param string $template
     * @param string $mod
     * @return string
     */
    public function createRows($template, $mod, $flag = false)
    {
        $rows = '';
        $tpl = getTpl($template);
        $bb = new IRB_BBdecoder();
        
        while($row = mysql_fetch_assoc($this->res))
        {
            $row['name'] = htmlspecialchars($row['name']);
            $row['description'] = $bb->createBBtags($row['description']);
            $row['src'] = ($mod == 'product') ? PHT_HOST .'media/products/'. $row['photo'] : PHT_HOST .'media/'. $row['photo'];
            if(!empty($row['price']))
                $row['price_dlr'] = floor($row['price'] / DOLLAR);
            if(!$flag)
                $row['url'] = href('page=production', 'mod='. $mod, 'parent='. $row['id']);
            else
                $row['url'] = href('page=production', 'mod='. $mod, 'id='. $row['id']);
            
            $rows .= parseTpl($tpl, $row);
        }
        return $rows;
    }
    
}