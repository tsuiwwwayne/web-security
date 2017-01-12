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
      if ($username == "") {
          $errorMessage = "Please enter your username";
          require_once('views/login-register/login-register.php');
          return;
      }
      if ($password == "") {
          $errorMessage = "Please enter your password";
          require_once('views/login-register/login-register.php');
          return;
      }

      $user = User::login($username, $password);
      if ($user) {
        $_SESSION['user_id'] = $user->id;
        if (User::isUserAdmin($_SESSION['user_id'])) {
            $_SESSION['isAdmin'] = true;
        }
        // Redirect
        require_once('utilities.php');
        Utilities::redirect("?");
      } else {
        $errorMessage = "Wrong Username or Password";
        require_once('views/login-register/login-register.php');
      }
    }

    public function logout() {
      unset($_SESSION['user_id']);
      unset($_SESSION['isAdmin']);
      // Return to home page.
      // Redirect
      require_once('utilities.php');
      Utilities::redirect("?");
    }

    public function register() {
      if (!isset($_REQUEST['username']) || !isset($_REQUEST['password']) || !isset($_REQUEST['displayname'])) {
        return call('pages', 'error');
      }

      $username     = $_REQUEST['username'];
      $password     = $_REQUEST['password'];
      $displayname  = $_REQUEST['displayname'];

      if (WEB_SAFE) {
        // Enforce that username is alphanumeric.
        if (!ctype_alnum($username)) {
            $errorMessage = "Only alphanumeric characters allowed for Username";
            require_once('views/login-register/login-register.php');
        }

        // Enforce no special characters in display name.
        $displayname = htmlspecialchars($displayname);
      }

      User::registerUser($username, $password, $displayname);
    }
  }
?>
