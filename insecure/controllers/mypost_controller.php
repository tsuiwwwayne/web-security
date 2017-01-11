<?php
  class MyPostController{
    public function index() {
      // we store all the posts in a variable
      $posts = UserPost::all();
      require_once('views/mypost/index.php');
    }
  }
?>