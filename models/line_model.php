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

class Line_Model
{
    // Объявляем публичное свойство
    public $table, $menu, $page;
    private $res, $num;
    
    /**
     * Конструктор
     * @param string $table
     * @param int $num
     */
    public function __construct($table, $num = 1)
    {
        $this->table = $this->page =  $table;
        $this->num = $num;
    }
    
    /**
     * Метод генерации ленты анонсов 
     * @param int $num_rows
     * @param int $num_words
     * @param boolean $list
     * @return void
    */
    public function createPerview($num_rows, $num_words, $list = true)
    {
        $pag = new IRB_Paginator($this->num, $num_rows);

        $sql = "SELECT `id`, DATE_FORMAT(`date`, '%d-%m-%Y') AS `date`, `title`, 
            SUBSTRING_INDEX(`text`, ' ', ". $num_words .") AS `text`
            FROM `". PHT_DBPREFIX . $this->table ."`
            WHERE `public` = 1
            ORDER BY `id` DESC";

        $this->res = $pag->countQuery($sql);
        
        // Призваиваем ему внутри класса значение
        if($list)
            $this->menu = $pag->createMenu();
    }

    /**
     * Метод генерации полного текста по идентификатору 
     * @param int $id
     * @return void
    */
    public function createFull($id)
    {
        $sql = "SELECT `id`, DATE_FORMAT(`date`, '%d-%m-%Y') AS `date`, `title`, `text`
            FROM `". PHT_DBPREFIX . $this->table ."`
            WHERE `public` = 1
            AND `id` = ". (int)$id ."
            ORDER BY `id` DESC";

        $this->res = mysqlQuery($sql);
    }
    
    /**
     * Метод представления
     * @param string $template
     * @param string $mod
     * @param string $link
     * @return string
     */
    public function createRows($template, $mod, $link)
    {
        $rows = '';
        $tpl = getTpl($template);
        $bb = new IRB_BBdecoder();
        
        while ($row = mysql_fetch_assoc($this->res))
        {
            $row['title']   = htmlspecialchars($row['title']);
            $row['text']    = $bb->createBBtags($row['text']);
            $row['link']    = $link;
            $row['url']     = href('page='. $this->page, 'mod='. $mod, 'parent='. $row['id'], 'num='. $this->num);
            $rows .= parseTpl($tpl, $row);
        }
        return $rows;
    }
}
