<?php
class Dirweg   
{    
      
    public $browdirurl; // браузерный путь к директории  
    public $serdirurl; // серверный путь к директории  
    public $file; // название файла  
  
    public function __construct(){  
        $pieces = explode('/', $_SERVER['PHP_SELF']);      
        $this->file = array_pop($pieces);  
  
        $url = $_SERVER['SERVER_NAME'].$_SERVER['PHP_SELF'];    
        $this->browdirurl =  "http://".mb_strstr($url, $this->file, true);   
  
        $url = $_SERVER['DOCUMENT_ROOT'].$_SERVER['PHP_SELF'];    
        $this->serdirurl =  mb_strstr($url, $this->file, true);   
      }  
}