<?php
  class PostsController {
    public function index() {
      // we store all the posts in a variable
      $posts = Post::all();
      require_once('views/posts/index.php');
    }

    public function show() {
      // we expect a url of form ?controller=posts&action=show&id=x
      // without an id we just redirect to the error page as we need the post id to find it in the database
      if (!isset($_GET['id']))
        return call('pages', 'error');

      // we use the given id to get the right post
      $post = Post::find($_GET['id']);
      require_once('views/posts/show.php');
    }

    // Input:
    // content (string)
    // For vulnerable version:
    // id (user_id)
    public function add() {
      // Require valid session
      if (WEB_SAFE) {
        if (!isset($_SESSION['user'])) {
          return call('pages', 'error');
        }
        $user_id = $_SESSION['user_id'];
      } else {
        // In vulnerable version, we allow client to specify the ID to post as.
        if (!isset($_REQUEST['id'])) {
          return call('pages', 'error');
        }
        $user_id = $_REQUEST['id'];
      }

      if (!isset($_REQUEST['content'])) {
        return call('pages', 'error');
      }
      $content = $_REQUEST['content'];

      $success = Post::add($user_id, $content);
      
    }
  }
?>