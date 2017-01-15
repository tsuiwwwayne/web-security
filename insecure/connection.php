<?php
  class Db {
    private static $instance = null;
    private function __construct() {}
    private function __clone() {}

    public static function getInstance() {
        if (!isset(self::$instance)) {
            $db_host = "eu-cdbr-azure-west-a.cloudapp.net";
            $db_name = "scenariodb3";
            $db_user = "bedcdb8cd4f6ec";
            $db_pass = "7682fd8d";
          
            //self::$instance = new PDO("mysql:host=scenario3instance.cn23ibbreyu5.eu-west-1.rds.amazonaws.com;dbname=scenario_3", "scenario3_user", "scenario3_pass");
            self::$instance = new PDO("mysql:host=eu-cdbr-azure-west-a.cloudapp.net;dbname=scenariodb3", "bedcdb8cd4f6ec", "7682fd8d");
            //self::$instance = new PDO("mysql:host=$db_host;dbname=$db_name", "$db_user", "$db_pass");
        }
        return self::$instance;
    }
  }
?>
