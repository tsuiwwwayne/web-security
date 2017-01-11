<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Strange Security</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    
    <!-- Custom styles for home page-->
    <link href="bootstrap-3.3.7-dist/css/carousel.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this login and register page -->
    <link href="bootstrap-3.3.7-dist/css/login-register.css" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

  </head>
  <body style="padding-top: 70px;">
    <div class="navbar-wrapper">
      <div class="container">
          <nav class="navbar navbar-inverse navbar-static-top">
            <div class="container">
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Strange Security</a>
              </div>
              <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                  <li class="active"><a href="#">Home</a></li>
                  <li><a href="?controller=mypost&action=index">My Posts</a></li>
                  <li><a href="#add-post">Add Post</a></li>
                  <li><a href="?controller=profile&action=index">Profile</a></li>
                  <li><a href="?controller=upload&action=index">Upload</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                  <li><a href='?controller=login_register&action=index'>Login/Register</a></li>
                </ul>
              </div>
            </div>
          </nav>
    </div>
    <div class="container">
      <?php require_once('routes.php'); ?>
    </div>
  </body>
   <!-- Bootstrap core JavaScript
=======

    <header>
      <a href='?'>Home</a>
      <a href='?controller=posts&action=index'>Posts</a>
    </header>

    <?php require_once('routes.php'); ?>

    <!-- FOOTER -->
    <footer>
        <hr class="featurette-divider">
        <div class="container">
            <p class="pull-right"><a href="#">Back to top</a></p>
            <p>&copy; 2017 Strange, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
        </div>
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
</html>
