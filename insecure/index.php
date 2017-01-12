<?php
  // Set this flag to determine whether the application is intentionally vulnerable.
  define("WEB_SAFE", true);

  // Start PHP session.
  session_start();

  if (WEB_SAFE) {
    // CSRF token generation
    if (empty($_SESSION['token'])) {
      $_SESSION['token'] = bin2hex(mcrypt_create_iv(32, MCRYPT_DEV_URANDOM));
    }
    // Turn off all error reporting
    error_reporting(0);
  } else {
    unset($_SESSION['token']);
    error_reporting(E_ALL);
  }

  // Database singleton.
  require_once('connection.php');

  if (isset($_GET['controller']) && isset($_GET['action'])) {
    $controller = $_GET['controller'];
    $action     = $_GET['action'];
  } else {
    $controller = 'pages';
    $action     = 'home';
  }

  require_once('views/layout.php');
?>
