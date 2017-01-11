<?php
    class Profile{
        public $id;
        public $userName;
        public $userPassword;
        public $role;
        public $displayName;
        public $icon;
        public $homePage;
        public $profileColor;
        public $privateSnippet;

        public function __construct($id, $userName, $userPassword, $role, $displayName, $icon, $homePage, $profileColor, $privateSnippet){
            $this->id = $id;
            $this->userName = $userName;
            $this->userPassword = $userPassword;
            $this->role = $role;
            $this->displayName = $displayName;
            $this->icon = $icon;
            $this->homePage = $homePage;
            $this->profileColor = $profileColor;
            $this->privateSnipper = $privateSnippet;
        }

        public function getProfile($id){
            $db = Db::getInstance();
            // we make sure $id is an integer
            $id = intval($id);
            $req = $db->prepare('SELECT * FROM users WHERE id = :id');
            
            $req->execute(array('id' => $id));
            $post = $req->fetch();

            return new Post($post['id'], $post['username'], $post['password'], $post['role'], $post['display_name;'], $post['icon'], $post['home_page'], $post['profile_color'], $post['private_snippet']);
        }

        public function updateProfile($id, $userName, $userPassword, $displayName, $icon, $homePage, $profileColor, $privateSnippet){
            $db = Db::getInstance();
            // we make sure $id is an integer
            $id = intval($id);

            $req = $db->prepare('UPDATE users SET username = ?, password = ?, display_name = ?, icon = ?, home_page = ?, profile_color = ?, private_snipper = ? WHERE id = ?');
            $req->execute(array($userName, $userPassword, $displayName, $icon, $homePage, $profileColor, $privateSnippet, $id));
        }
    }

?>