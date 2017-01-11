<div class="container below-static-navbar padding-top-20">
    <div class="panel panel-default">
      <div class="panel-heading text-center">All your snippets</div>
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
</div>
