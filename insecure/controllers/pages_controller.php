<?php
  class PagesController {
    public function home() {
      require_once('models/user.php');
      $loggedIn = isset($_SESSION['user_id']);
      if ($loggedIn) {
        $displayName = User::getDisplayName($_SESSION['user_id']);
      }
      require_once('views/pages/home.php');
    }

    public function error() {
      require_once('views/pages/error.php');
    }
  }
?>