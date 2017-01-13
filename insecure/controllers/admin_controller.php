<?php
    class AdminController {
        public function index(){
            $find = false;
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
        public function displayUserInformation() {

            if (!isset($_REQUEST['message'])) {
              return call('pages', 'error');
            }
            $inputUsername = $_REQUEST['message'];
            $find = true;
            require_once('views/admin/admin.php');
        }
    }
?>
