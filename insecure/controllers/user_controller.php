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
        return call('pages', 'home');
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
      return call('pages', 'home');
    }
  }
?>
