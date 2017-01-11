<?php
  class Db {
    private static $instance = null;
    private function __construct() {}
    private function __clone() {}

    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new PDO("mysql:host=scenario3instance.cn23ibbreyu5.eu-west-1.rds.amazonaws.com;dbname=scenario_3", "scenario3_user", "scenario3_pass");
        }
        return self::$instance;
    }
  }
?>
