<?php
  class ProfileController{
    public function index() {
      // we store all the posts in a variable
      if (!isset($_SESSION['user_id'])) {
          return call('pages', 'error');
      }
      $username = User::getUsername($_SESSION['user_id']);
      require_once('views/profile/index.php');
    }
  }
?>