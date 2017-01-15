<?php
  class ProfileController{
    public function index() {
      // we store all the posts in a variable
      if (!isset($_SESSION['user_id'])) {
          return call('pages', 'error');
      }
      $updated = 0;
      $user_id = $_SESSION['user_id'];
      if(!WEB_SAFE && isset($_REQUEST['id'])){
          // In vulnerable version, we allow client to specify the ID to post as.
          $user_id = $_REQUEST['id'];
      }
      $profile = Profile::getProfile($user_id);
      require_once('views/profile/index.php');
    }
    public function updateProfile(){
      if (!isset($_SESSION['user_id'])) {
          return call('pages', 'error');
      }
      require_once('models/profile.php');
      //$username = User::getUserName($_SESSION['user_id']);
      if(!WEB_SAFE){
        $user_id = $_SESSION['user_id'];
        if(isset($_REQUEST['id'])){
          // In vulnerable version, we allow client to specify the ID to post as.
          $user_id = $_REQUEST['id'];
        }
        $displayName = $_POST["display_name"];
        $icon = $_POST["icon"];
        $homepage = $_POST["homepage"];
        $profile_colour = $_POST["profile_colour"];
        Profile::updateProfile($user_id, $displayName, $icon, $homepage, $profile_colour);
        $profile = Profile::getProfile($user_id);
        $updated = 1;
        require_once('views/profile/index.php');
      }

      // Clean inputs for web safe mode
      if(WEB_SAFE){
        $user_id = $_SESSION['user_id'];
        $displayName = htmlspecialchars($_POST["display_name"]);
        $icon = htmlspecialchars($_POST["icon"]);
        $homepage = htmlspecialchars($_POST["homepage"]);
        $profile_colour = htmlspecialchars($_POST["profile_colour"]);
        // If not valid url
        if(filter_var($homepage, FILTER_VALIDATE_URL,FILTER_FLAG_PATH_REQUIRED) === false){
          $homepage = '';
          $updated = 2; // error condition
          $error_msg = 'Please enter a valid URL';
          $profile = Profile::getProfile($_SESSION['user_id']);
          require_once('views/profile/index.php');
        }else{
          Profile::updateProfile($user_id, $displayName, $icon, $homepage, $profile_colour);
          $profile = Profile::getProfile($_SESSION['user_id']);
          $updated = 1;
          require_once('views/profile/index.php');
        }
      }
    }
  }
?>
