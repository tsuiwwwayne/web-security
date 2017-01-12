<?php
  // Set this flag to determine whether the application is intentionally vulnerable.
  define("WEB_SAFE", true);

  // Start PHP session.
  session_start();

  // CSRF token generation
  if (WEB_SAFE) {
    if (empty($_SESSION['token'])) {
      $_SESSION['token'] = bin2hex(mcrypt_create_iv(32, MCRYPT_DEV_URANDOM));
    }
  } else {
    unset($_SESSION['token']);
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
