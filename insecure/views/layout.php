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

    <!-- Custom theme -->
    <link href="bootstrap-3.3.7-dist/css/theme.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for home page-->
    <link href="bootstrap-3.3.7-dist/css/carousel.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this login and register page -->
    <link href="bootstrap-3.3.7-dist/css/login-register.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this login and register page -->
    <link href="bootstrap-3.3.7-dist/css/the-big-picture.css" rel="stylesheet" type="text/css">

  </head>
  <body class="background-full">
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
                <a href="?" class="navbar-brand">Strange Security</a>
              </div>
              <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                  <?php if(isset($_SESSION['user_id'])): ?>
                  <li><a href="#my-posts">My Posts</a></li>
                  <li><a href="#add-post">Add Post</a></li>
                  <li><a href="#upload">Upload</a></li>
                  <?php else: ?>
                  <!-- empty -->
                  <?php endif ?>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                  <li>
                      <?php if(isset($_SESSION['user_id'])): ?>
                      <a href='?controller=user&action=logout'>Logout</a>
                      <?php else: ?>
                      <a href='?controller=login_register&action=index'>Login/Register</a>
                      <?php endif ?>
                  </li>
                </ul>
              </div>
            </div>
          </nav>

        </div>
      </div>

    <?php require_once('routes.php'); ?>

    <!-- FOOTER -->
    <footer>
        <hr class="featurette-divider">
        <div class="container">
            <p class="pull-right"><a href="#">Back to top</a></p>
            <p>&copy; 2017 Strange, Inc.</p>
        </div>
    </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
  </body>
</html>
