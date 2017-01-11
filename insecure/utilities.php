<?php
    class Utilities {
        public static function redirect($location) {
            echo "<script>window.location.replace(\"$location\")</script>";
        }
    }
?>