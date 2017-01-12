<?php
    class AdminController {
        public function index(){
            require_once('models/user.php');
            if (WEB_SAFE) {
                if ($_SESSION['isAdmin']) {
                    require_once('views/admin/admin.php');
                } else {
                    return call('pages', 'error');
                }
            } else {
                require_once('views/admin/admin.php');
            }
        }
    }
?>
