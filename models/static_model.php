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

class Static_Model
{
    public $content;
    
    /**
     * Коструктор
     * @param string $filename
     */
    public function __construct($filename)
    {
        $content = @file_get_contents(PHT_ROOT .'/setup/'. $filename .'.txt');
        
        if(!empty($content))
            $this->content = $content;
        else
            $this->content = 'No page '. $filename;
    }
    
    /**
     * Метод представления
     * @return void
     */
    public function createContent()
    {
        return $this->content;
    }
            
}