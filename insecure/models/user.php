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
        $req = $db->prepare('SELECT id, display_name FROM users WHERE username = ? AND password = ?');
        $req->execute(array($username, $password));

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
    }

    // TODO.
    // Returns a Profile object.
    public static function getProfile($userID) {

    }
  }
?>