<?php
  class UserPost {
    // we define 2 attributes
    public $id;
    public $content;

    public function __construct($id, $content) {
      $this->id      = $id;
      $this->content = $content;
    }

    public static function all() {
      $list = [];
      $db = Db::getInstance();
      $req = $db->query('SELECT * FROM posts');

      // we create a list of Post objects from the database results
      foreach($req->fetchAll() as $post) {
        $list[] = new Post($post['id'], $post['content']);
      }

      return $list;
    }
  }
?>