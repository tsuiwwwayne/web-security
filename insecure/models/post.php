<?php
  class Post {
    // Properties
    public $id;
    public $author;
    public $content;

    public function __construct($id, $author, $content) {
      $this->id      = $id;
      $this->author  = $author;
      $this->content = $content;
    }

    // Gets all posts
    public static function all() {
      $list = [];
      $db = Db::getInstance();
      $req = $db->query('SELECT posts.id, users.display_name, posts.content FROM posts JOIN users ON posts.user_id = users.id');

      // we create a list of Post objects from the database results
      foreach ($req->fetchAll() as $post) {
        $list[] = new Post($post['id'], $post['display_name'], $post['content']);
      }

      return $list;
    }

    // Gets a single post
    public static function getPostsForUser($user_id) {
      $list = [];
      $db = Db::getInstance();
      $user_id = intval($user_id);
      $req = $db->prepare('SELECT * FROM posts where user_id = :user_id');
      $req->execute(array('user_id' => $user_id));
      // we create a list of Post objects from the database results
      foreach($req->fetchAll() as $post) {
        $list[] = new Post($post['id'], $post['user_id'], $post['content']);
      }

      return $list;
    }

    public static function getPostLastForUser($user_id) {
        $list = [];
        $db = Db::getInstance();
        $user_id = intval($user_id);
        $req = $db->prepare('SELECT * FROM posts where user_id = :user_id ORDER BY date_created DESC LIMIT 1');
        $req->execute(array('user_id' => $user_id));
        $post = $req->fetch();

        if (WEB_SAFE) {
          
        }

        if ($post && count($post) > 0) {
           return new Post($post['id'], $post['user_id'], $post['content']);
        } else {
           return false;
        }
    }

    public static function find($id) {
      $db = Db::getInstance();
      // we make sure $id is an integer
      $id = intval($id);
      $req = $db->prepare('SELECT posts.id, users.display_name, posts.content FROM posts JOIN users ON posts.user_id = users.id WHERE posts.id = :id');
      // the query was prepared, now we replace :id with our actual $id value
      $req->execute(array('id' => $id));
      $post = $req->fetch();

      return new Post($post['id'], $post['display_name'], $post['content']);
    }

    public static function add($userID, $content) {
        $db = Db::getInstance();
        if (WEB_SAFE) {
          $req = $db->prepare('INSERT INTO posts (user_id, date_created, content) VALUES (?, NOW(), ?)');
          $req->execute(array($userID, $content));
        } else {
          $sql = "INSERT INTO posts (user_id, date_created, content) VALUES ($userID, NOW(), '$content')";
          $req = $db->query($sql);
        }
        // INSERT INTO `posts` (`id`, `user_id`, `date_created`, `content`) VALUES (NULL, '2', '2017-01-10 08:37:11', 'This is another piece of content!');
    }

    // Return owner's user ID
    public static function getPostOwner($postID) {
      $db = Db::getInstance();
      $req = $db->prepare('SELECT user_id FROM posts WHERE id = :id');
      $req->execute(array('id' => $postID));
      $post = $req->fetch();

      return $post['user_id'];
    }

    // Deletes a post
    public static function delete($postID) {
      $db = Db::getInstance();
      $req = $db->prepare('DELETE FROM posts WHERE id = ?');
      $req->execute(array($postID));
    }
  }
?>
