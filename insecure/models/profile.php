<?php
    class Profile {
        public $id;
        public $username;
        //public $password;
        //public $role;
        public $displayname;
        public $icon;
        public $homepage;
        public $profileColor;

        public function __construct($id, $username, $displayname, $icon, $homepage, $profileColor){
            $this->id = $id;
            $this->username = $username;
            //$this->userpassword = $password;
            //$this->role = $role;
            $this->displayname = $displayname;
            $this->icon = $icon;
            $this->homepage = $homepage;
            $this->profileColor = $profileColor;
        }

        public static function getProfile($id){
            $db = Db::getInstance();
            // we make sure $id is an integer
            $id = intval($id);
            $req = $db->prepare('SELECT * FROM users WHERE id = :id');
            $req->execute(array('id' => $id));
            $user = $req->fetch();
            $profile = new Profile($user['id'], $user['username'], $user['display_name'], $user['icon'], $user['home_page'], $user['profile_color']);
<<<<<<< HEAD
            return $profile;
=======
            return $profile;
>>>>>>> bac6502489c80d095f42037d56b50e2df7373e1a
        }

        public static function updateProfile($id, $displayname, $icon, $homepage, $profileColor){
            $db = Db::getInstance();
            // we make sure $id is an integer
            $id = intval($id);
            $req = $db->prepare('UPDATE users SET display_name = ?, icon = ?, home_page = ?, profile_color = ? WHERE id = ?');
            $req->execute(array($displayname, $icon, $homepage, $profileColor, $id));
        }
<<<<<<< HEAD

        public static function allProfiles() {
            $list = [];
            $userIDs = User::allUserIDs();
            foreach ($userIDs as $userID) {
                $list[] = self::getProfile($userID);
            }

            return $list;
        }
    }

?>
=======
    }

?>
>>>>>>> bac6502489c80d095f42037d56b50e2df7373e1a
