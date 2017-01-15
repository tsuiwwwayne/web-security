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

    // Session inactivity handling
    if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
      // last request was more than 30 minutes ago
      unset($_SESSION['user_id']);
    }
    $_SESSION['LAST_ACTIVITY'] = time();
    setcookie(session_name(),session_id(),time()+0);
    
  } else {
    unset($_SESSION['token']);
    error_reporting(E_ALL);
    // Let cookie last for a long time (instead of being a session cookie)
    setcookie(session_name(),session_id(),time()+6000);
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
