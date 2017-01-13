<?php if(!WEB_SAFE): ?>
  <!--Load old version of jQuery that is vulnerable to location.hash XSS-->
  <script src="https://code.jquery.com/jquery-1.6.2.min.js"></script>
<?php endif ?>

<div class="container below-static-navbar padding-top-20">
    <div class="panel panel-default">
      <div class="panel-heading">All Posts</div>
      <div class="panel-body">
          <?php
            if(empty($posts)){
              echo "You currently have no posts!";
            } else {
              $index = 0;
              foreach($posts as $post) {
                 echo '<div id="' . (++$index) . '" class = "row" style="padding:10px,0,10px,0;"><div class="col-md-10">' . $post->content . '</div><div class="col-md-2" style="text-align:right"><a href="?controller=posts&action=delete&id=' . $post->id . '" style="pull-right" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></a></div></div><hr>';
              }
            }
          ?>
      </div>
    </div>
</div>
<script>
  var currentHash = location.hash;
  $(location.hash).css('color', 'blue')
                  .css("font-weight", "Bold");

  // Force reload when hash changes.
  window.onhashchange = function() {
    if (location.hash != currentHash) {
      location.reload();
    }
  };
</script>
