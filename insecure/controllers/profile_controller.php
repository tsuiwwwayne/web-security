<?php
  class ProfileController{
    public function index() {
      // we store all the posts in a variable
      if (!isset($_SESSION['user_id'])) {
          return call('pages', 'error');
      }
      $updated = 0;
      $profile = Profile::getProfile($_SESSION['user_id']);
      require_once('views/profile/index.php');
    }
    public function updateProfile(){
      if (!isset($_SESSION['user_id'])) {
          return call('pages', 'error');
      }
      require_once('models/profile.php');
      //$username = User::getUserName($_SESSION['user_id']);
      $user_id = $_SESSION['user_id'];
      $displayName = $_POST["display_name"];
      $icon = $_POST["icon"];
      $homepage = $_POST["homepage"];
      $profile_colour = $_POST["profile_colour"];

      Profile::updateProfile($user_id, $displayName, $icon, $homepage, $profile_colour);

      $profile = Profile::getProfile($_SESSION['user_id']);
      $updated = 1;
      require_once('views/profile/index.php');
    }
  }
?>
