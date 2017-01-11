<?php
  class UserController {

    public function index() {
        $errorMessage = "";
        require_once('views/login-register/login-register.php');
    }

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
        // Redirect
        require_once('utilities.php');
        Utilities::redirect("?");
      } else {
        $errorMessage = "Login failed. Something went wrong...";
        require_once('views/login-register/login-register.php');
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
