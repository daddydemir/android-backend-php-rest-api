<?php

class Connect extends PDO{
    public function __construct()
    {
        parent::__construct("mysql:host=your_server_address;dbname=your_dbname" , "your_username" , "your_pass" , array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        $this->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
        $this->setAttribute(PDO::ATTR_EMULATE_PREPARES , false);
    }
}

?>