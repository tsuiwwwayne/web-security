<?php
  class UserController {
    // Input:
    // user, password
    public function login() {
      // Output error if no username or password provided.
      if (!isset($_REQUEST['user']) || !isset($_REQUEST['password'])) {
        return call('pages', 'error');
      }

      $username = $_REQUEST['user'];
      $password = $_REQUEST['password'];

      $user = User::login($username, $password);
      if ($user) {
        $_SESSION['user_id'] = $user->id;
        // echo "ELLO " . $user->displayName . "!";
        // echo "<br>";
        echo "ELLO " . User::getDisplayName($user->id) . "!";
      } else {
        echo "LOGIN FAIL";
        return call('pages', 'error');
      }
    }

    public function logout() {
      unset($_SESSION['user_id']);
      // Return to home page.
      return call('pages', 'home');
    }

    public function getDisplayName() {
      
    }

    public function updateProfile() {

    }
  }
?>