<!-- Carousel
================================================== -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img class="first-slide" src="assets/img/carousel-cover-1.png" alt="First slide">
      <div class="container">
        <div class="carousel-caption">
          <h1>UCL Group E</h1>
          <p>Team project investigating the vulnerabilities of web security, using HTML, CSS, JavaScript and PHP.</p>
          <p><a class="btn btn-lg btn-primary" href="https://github.com/tsuiwwwayne/web-security" role="button">Github</a></p>
        </div>
      </div>
    </div>
    <div class="item">
      <img class="second-slide" src="assets/img/carousel-cover-2.jpg" alt="Second slide">
      <div class="container">
        <div class="carousel-caption">
          <h1 class="margin-20">Team Members</h1>
          <div class="row">
            <div class="col-xs-6 col-md-3">
              <img class="img-circle" src="assets/img/wayne-tsui.png" alt="Generic placeholder image" width="100" height="100">
              <p class="margin-20">Wayne Tsui</p>
            </div>
            <div class="col-xs-6 col-md-3">
              <img class="img-circle" src="assets/img/raymond-tan.png" alt="Generic placeholder image" width="100" height="100">
              <p class="margin-20">Raymond Tan</p>
            </div>
            <div class="col-xs-6 col-md-3">
              <img class="img-circle" src="assets/img/christopher-lau.png" alt="Generic placeholder image" width="100" height="100">
              <p class="margin-20">Christopher Lau</p>
            </div>
            <div class="col-xs-6 col-md-3">
              <img class="img-circle" src="assets/img/jason-in.png" alt="Generic placeholder image" width="100" height="100">
              <p class="margin-20">Jason In</p>
            </div>
          </div><!-- /.row -->
        </div>
      </div>
    </div>
    <div class="item">
      <img class="third-slide" src="assets/img/carousel-cover-3.png" alt="Third slide">
      <div class="container">
        <div class="carousel-caption">
          <h1>Think of something guys</h1>
          <p>Put some content here please</p>
          <p><a class="btn btn-lg btn-primary" href="#" role="button">Browse something</a></p>
        </div>
      </div>
    </div>
  </div>
  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div><!-- /.carousel -->

<!-- Information of all users.
     For each user, include profile photo, display name and latest post.
     Also has link to home page (if logged in).
================================================ -->

<div class="container marketing">
  <div class="row">
    <div class="col-xs-6 col-md-4">
      <img class="img-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" width="140" height="140">
      <h2>Heading</h2>
      <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>
      <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
    </div>

    <?php
      if(!empty($posts)){
        foreach($posts as $post) {
          echo '<div class = "row" style="padding:10px,0,10px,0;"><div class="col-md-10">'. $post->id . ' ' . $post->content . '</div>' . '<div class="col-md-2" style="text-align:right"><a href="#" style="pull-right" class="btn btn-primary"><span class="glyphicon glyphicon-trash"></span></a></div></div><hr>';
        }
      }
    ?>

  </div><!-- /.row -->

</div><!-- /.container -->
