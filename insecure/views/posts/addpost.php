<div class="panel panel-default" style="margin-top: 30px;">
  <div class="panel-heading">New Post</div>
  <div class="panel-body">
      <form class="form-horizontal" action="?controller=posts&action=add" method="post" enctype="multipart/form-data">
        <div class="form-group">
         	<label class="control-label col-sm-2" for="pwd">Add a new post:</label>
          <div class="col-sm-10"> 
            <textarea class="form-control" rows="5"  name="content"></textarea><br>
            <button type="submit" class="btn btn-default">Add Post</button>
          </div>
        </div>
      </form>
  </div>
</div>