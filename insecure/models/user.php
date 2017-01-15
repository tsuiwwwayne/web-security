<?php
  class User {
    // Properties
    public $id;
    public $displayName;

    public function __construct($id, $displayName) {
      $this->id           = $id;
      $this->displayName  = $displayName;
    }

    // Attempts login with the specified username and password.
    // Returns new User object on success, false on failure.
    public static function login($username, $password) {
        $db = Db::getInstance();
        if (WEB_SAFE) {
            $req = $db->prepare('SELECT id, display_name FROM users WHERE username = ? AND password = ?');
            $req->execute(array($username, $password));
        } else {
            $sql = "SELECT id, display_name FROM users WHERE username = '$username' AND password = '$password'";
            $req = $db->query($sql);
        }

        $user = $req->fetch();  // Returns false on failure.

        if ($user && count($user) > 0) {
            return new User($user['id'], $user['display_name']);
        } else {
            return false;
        }
    }

    public static function getDisplayName($userID) {
        $db = Db::getInstance();
        $req = $db->prepare('SELECT display_name FROM users WHERE id = ?');
        $req->execute(array($userID));

        $user = $req->fetch();  // Returns false on failure.

        if ($user && count($user) > 0) {
            return $user['display_name'];
        } else {
            return false;
        }
    }

    public static function getUsername($userID) {
        $db = Db::getInstance();
        $req = $db->prepare('SELECT username FROM users WHERE id = ?');
        $req->execute(array($userID));

        $user = $req->fetch();  // Returns false on failure.

        if ($user && count($user) > 0) {
            return $user['username'];
        } else {
            return false;
        }
    }

    public static function registerUser($username, $password, $displayname) {
        $db = Db::getInstance();
        $req = $db->prepare('INSERT INTO users (username, password, display_name, role) VALUES (?, ?, ?, 2)');
        $req->execute(array($username, $password, $displayname));

        $id = $db->lastInsertId();
        return($id);
    }

    public static function allUserIDs() {
        $list = [];
        $db = Db::getInstance();
        $req = $db->query('SELECT users.id FROM users');

        // we create a list of User ids from the database results
        foreach ($req->fetchAll() as $user) {
          $list[] = $user['id'];
        }

        return $list;
    }

    public static function isUserAdmin($userID) {
        $db = Db::getInstance();
        $req = $db->prepare('SELECT role FROM users WHERE id = ?');
        $req->execute(array($userID));

        $user = $req->fetch();  // Returns false on failure.

        if ($user && count($user) > 0 && $user['role'] == 1) {
            return true;
        } else {
            return false;
        }
    }

  }
?>
