<?php
    class UploadController {
        public function index(){
            if (!isset($_SESSION['user_id'])) {
                return call('pages', 'error');
            }
            require_once('views/upload-file/index.php');
        }
        public function uploadfile() {
            if (!isset($_SESSION['user_id'])) {
                return call('pages', 'error');
            }

            require_once('models/user.php');
            $username = User::getUserName($_SESSION['user_id']);

            $target_dir = "userfiles/" . $username . "/";
            if (!file_exists($target_dir)) mkdir($target_dir);
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
            $uploadOk = 1;
            $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            // Check file size
            if ($_FILES["fileToUpload"]["size"] > 500000) {
                $output = "Sorry, your file is too large.";
                $uploadOk = 0;
            }
            if (WEB_SAFE) {
                // Only allow certain file formats
                if($fileType != "jpg" && $fileType != "png" && $fileType != "jpeg"
                && $fileType != "gif" && $fileType != "txt" && $fileType != "pdf") {
                    $output = "Sorry, this filetype is not allowed.";
                    $uploadOk = 0;
                }
            }
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                // Do nothing
            // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                    $output = "The file ". basename( $_FILES["fileToUpload"]["tmp_name"]). " has been uploaded.";
                    $path = substr($_SERVER['REQUEST_URI'], 0, strrpos($_SERVER['REQUEST_URI'], '/'));
                    $filepath = $_SERVER['HTTP_ORIGIN'] . $path . '/' . $target_file;
                    //print_r($_SERVER);
                } else {
                    $output = "Sorry, there was an error uploading your file.";
                }
            }

            // Comment this out - the view should display this variable.
            require_once('views/upload-file/index.php');
        }
    }
?>
