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
      case 'login_register':
        $controller = new LoginRegisterController();
      break;
      case 'upload':
        $controller = new UploadController(); 
      break;
    }

    $controller->{ $action }();
  }
  
  // List of controllers and actions
  $controllers = array('pages' => ['home', 'error'],
                       'posts' => ['index', 'show', 'add', 'myPosts','addPostIndex'],
                       'profile' => ['index', 'updateProfile'],
                       'user' =>  ['login', 'logout', 'updateProfile', 'register'],
                       'upload' =>  ['index','uploadfile']);
                       
  // Controllers in this array require that a valid user session be present (i.e. $_SESSION['user_id'] exists)
  $controllers_authenticated = array();
  if (array_key_exists($controller, $controllers)) {
    if (in_array($action, $controllers[$controller])) {
      call($controller, $action);
    // } else if (in_array($action, $controllers_authenticated[$controller])) {
    //   if (isset($_SESSION['user_id'])) {
    //     call($controller, $action);
    //   }
    } else {
      call('pages', 'error');
    }
  } else {
    call('pages', 'error');
  }
?>
