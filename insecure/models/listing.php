<?php
    class Listing {
        public $id;
        public $displayname;
        public $icon;
        public $homepage;
        public $profileColor;
        public $latestPost;

        public function __construct($id, $displayname, $icon, $homepage, $profileColor, $latestPost){
            $this->id = $id;
            $this->displayname = $displayname;
            $this->icon = $icon;
            $this->homepage = $homepage;
            $this->profileColor = $profileColor;
            $this->latestPost = $latestPost;
        }

        public static function getListing($id) {
            $db = Db::getInstance();
            $id = intval($id);
            $req = $db->prepare('SELECT * FROM users WHERE id = :id');
            $req->execute(array('id' => $id));
            $user = $req->fetch();
            $latestPost = Post::getPostLastForUser($id);
            $lastestPostContent = "";
            if ($latestPost) {
                $lastestPostContent = $latestPost->content;
            }
            $listing = new Listing($user['id'], $user['display_name'], $user['icon'], $user['home_page'], $user['profile_color'], $lastestPostContent);
            return $listing;
        }

        public static function allListings() {
            $list = [];
            $userIDs = User::allUserIDs();
            foreach ($userIDs as $userID) {
                $list[] = self::getListing($userID);
            }
            return $list;
        }
    }

?>
