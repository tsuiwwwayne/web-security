<?php
  class UserController {
    // Input:
    // user, password
    public function login() {
      // Redirect to error if no username or password provided.
      $username = $_REQUEST['user'];
      $password = $_REQUEST['password'];
      if (!isset($_REQUEST['user']) || !isset($_REQUEST['password'])) {
        return call('pages', 'error');
      }

      $user = User::login($username, $password);
      if ($user) {
        $_SESSION['user'] = $user;
        $_SESSION['user_id'] = $user->id;
        echo "ELLO " . $user->displayName . "!";
      } else {
        echo "LOGIN FAIL";
        return call('pages', 'error');
      }
    }

    public function logout() {
      unset($_SESSION['user']);
      unset($_SESSION['user_id']);
      // Return to home page.
      return call('pages', 'home');
    }

    public function updateProfile() {

    }
  }
?>