<div class="panel panel-default" style="margin-top: 30px;">
  <div class="panel-heading">All your current snippets</div>
  <div class="panel-body">
      <?php 
        if(empty($posts)){
          echo "You currently have no posts!";
        }
        else{    
          foreach($posts as $post) {
            echo '<div class = "row" style="padding:10px,0,10px,0;"><div class="col-md-10">'. $post->id . ' ' . $post->content . '</div>' . '<div class="col-md-2" style="text-align:right"><a href="#" style="pull-right" class="btn btn-primary"><span class="glyphicon glyphicon-trash"></span></a></div></div><hr>';
          }
        }
      ?>
  </div>
</div>