<?php
  function call($controller, $action) {
    require_once('controllers/' . $controller . '_controller.php');

    switch($controller) {
      case 'pages':
        $controller = new PagesController();
        break;
      case 'posts':
        // we need the model to query the database later in the controller
        require_once('models/post.php');
        $controller = new PostsController();
        break;
      case 'user':
        require_once('models/user.php');
        $controller = new UserController();
        break;
      case 'upload':
        $controller = new UploadController();
        break;
      break;
      case 'profile':
        require_once('models/profile.php');
        $controller = new ProfileController();
        break;
      case 'upload':
        $controller = new UploadController();
      break;
      case 'admin':
        $controller = new AdminController();
      break;
    }

    $controller->{ $action }();
  }

  // List of controllers and actions
  $controllers = array('pages' => ['home', 'error'],
                       'posts' => ['index', 'show', 'add', 'myPosts', 'addPostIndex', 'delete'],
                       'profile' => ['index', 'updateProfile'],
                       'user' =>  ['index', 'login', 'logout', 'updateProfile', 'register'],
                       'upload' =>  ['index','uploadfile'],
                       'admin' => ['index', 'displayUserInformation']);

  if (!WEB_SAFE) {
    call($controller, $action);
    return;
  }

  if (array_key_exists($controller, $controllers)) {
    if (in_array($action, $controllers[$controller])) {
      call($controller, $action);
    } else {
      call('pages', 'error');
    }
  } else {
    call('pages', 'error');
  }
?>
