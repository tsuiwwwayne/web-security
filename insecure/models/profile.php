<?php
    class Profile{
        public $id;
        public $username;
        public $password;
        public $role;
        public $displayname;
        public $icon;
        public $homepage;
        public $profileColor;

        public function __construct($id, $username, $password, $role, $displayname, $icon, $homepage, $profileColor){
            $this->id = $id;
            $this->username = $username;
            $this->userpassword = $password;
            $this->role = $role;
            $this->displayname = $displayname;
            $this->icon = $icon;
            $this->homepage = $homepage;
            $this->profileColor = $profileColor;
        }

        public function getProfile($id){
            $db = Db::getInstance();
            // we make sure $id is an integer
            $id = intval($id);
            $req = $db->prepare('SELECT * FROM users WHERE id = :id');
            
            $req->execute(array('id' => $id));
            $post = $req->fetch();

            return new Post($post['id'], $post['username'], $post['password'], $post['role'], $post['display_name'], $post['icon'], $post['home_page'], $post['profile_color']);
        }

        public function updateProfile($id, $username, $password, $displayname, $icon, $homepage, $profileColor){
            $db = Db::getInstance();
            // we make sure $id is an integer
            $id = intval($id);

            $req = $db->prepare('UPDATE users SET username = ?, password = ?, display_name = ?, icon = ?, home_page = ?, profile_color = ? WHERE id = ?');
            $req->execute(array($username, $password, $displayname, $icon, $homepage, $profileColor, $id));
        }
    }

?>