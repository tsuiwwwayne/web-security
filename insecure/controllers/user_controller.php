<?php
  class UserController {
    // Input:
    // user, password
    public function login() {
      // Output error if no username or password provided.
      if (!isset($_REQUEST['username']) || !isset($_REQUEST['password'])) {
        return call('pages', 'error');
      }

      $username = $_REQUEST['username'];
      $password = $_REQUEST['password'];

      $user = User::login($username, $password);
      if ($user) {
        $_SESSION['user_id'] = $user->id;
        //echo "ELLO " . User::getDisplayName($user->id) . "!";
        //return call('pages', 'home');
        // Redirect
        require_once('utilities.php');
        Utilities::redirect("?");
      } else {
        $output = "LOGIN FAIL";
        echo "LOGIN FAIL";
        //self::logout();
        return call('pages', 'error');
      }
    }

    public function logout() {
      unset($_SESSION['user_id']);
      // Return to home page.
      // Redirect
      require_once('utilities.php');
      Utilities::redirect("?");
    }

    public function register() {
      echo "register";
      if (!isset($_REQUEST['username']) || !isset($_REQUEST['password']) || !isset($_REQUEST['displayname'])) {
        return call('pages', 'error');
      }
      
      $username     = $_REQUEST['username'];
      $password     = $_REQUEST['password'];
      $displayname  = $_REQUEST['displayname'];

      // Enforce that username is alphanumeric.
      if (!ctype_alnum($username)) {
        return call('pages', 'error');
      }

      if (WEB_SAFE) {
        // Enforce no special characters in display name.
        $displayname = htmlspecialchars($displayname);
      }

      User::registerUser($username, $password, $displayname);
    }
  }
?>