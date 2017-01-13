<?php
  class PostsController {
    public function index() {
      // we store all the posts in a variable
      if (!isset($_SESSION['user_id'])) {
          return call('pages', 'error');
      }
      $posts = Post::all();
      require_once('views/posts/index.php');
    }

    public function myPosts() {
      if (!isset($_SESSION['user_id'])) {
          return call('pages', 'error');
      }
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
    public function addPostIndex(){
      if (!isset($_SESSION['user_id'])) {
        return call('pages', 'error');
      }
      require_once('views/posts/addpost.php');
    }

    public function add() {
      // Require valid session
      if (isset($_SESSION['user_id'])) {
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

      if (WEB_SAFE) {
        // Sanitize incoming content.
        $content = htmlspecialchars($content);

        // Check CSRF token
        if (empty($_REQUEST['token']) || !hash_equals($_SESSION['token'], $_REQUEST['token'])) {
          // Invalid CSRF token...
          return call('pages', 'error');
        }
      }

      $success = Post::add($user_id, $content);
      $posts = $posts = Post::getPostsForUser($_SESSION['user_id']);
      require_once('views/posts/mypost.php');
    }

    public function delete() {
      // Get session
      if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
      }

      if (!isset($user_id) || !isset($_REQUEST['id'])) {
        return call('pages', 'error');
      }

      $id = $_REQUEST['id'];

      if (WEB_SAFE) {
        // Verify that the user owns the snippet. (or that the user is an administrator)
        if ($user_id != Post::getPostOwner($id)) {
          return call('pages', 'error');
        }
      }

      $success = Post::delete($id);
      $posts = $posts = Post::getPostsForUser($_SESSION['user_id']);
      require_once('views/posts/mypost.php');
    }
  }
?>
