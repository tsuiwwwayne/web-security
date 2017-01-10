<?php
  class Db {
    private static $instance = null;
    private function __construct() {}
    private function __clone() {}
    
    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new PDO("mysql:host=localhost;dbname=scenario_3", "root", "");
        }
        return self::$instance;
    }
  }
?>