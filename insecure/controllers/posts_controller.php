<?php
  class PostsController {
    public function index() {
      // we store all the posts in a variable
      $posts = Post::all();
      require_once('views/posts/index.php');
    }

    public function myPosts() {
      $posts = Post::getPostsForUser($_SESSION['user_id']);
      require_once('views/posts/mypost.php');
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
      if (isset($_SESSION['user'])) {
        $user_id = $_SESSION['user_id'];
      }

      if (!WEB_SAFE && isset($_REQUEST['id'])) {
        // In vulnerable version, we allow client to specify the ID to post as.
        $user_id = $_REQUEST['id'];
      }

      if (!isset($user_id) || !isset($_REQUEST['content'])) {
        return call('pages', 'error');
      }

      $content = $_REQUEST['content'];

      // Sanitize incoming content.
      if (WEB_SAFE) {
        $content = htmlspecialchars($content);
      }

      $success = Post::add($user_id, $content);
    }
  }
?>
