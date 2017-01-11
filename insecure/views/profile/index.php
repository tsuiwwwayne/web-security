<div class="panel panel-default" style="margin-top: 30px;">
  <div class="panel-heading">Edit your profile</div>
  <div class="panel-body">
      <?php if($updated == 1): ?>
          <p style="color: red; text-align: center;">Successfully updated profile!</p>
      <?php endif ?>  
      <form class="form-horizontal" action="?controller=profile&action=updateProfile" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <label class="control-label col-sm-2" for="email">UserID:</label>
          <div class="col-sm-10">
            <label class="control-label for="email"><?php echo $profile->username ?></label>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="pwd">Display Name:</label>
          <div class="col-sm-10"> 
            <input type="text" class="form-control" name="display_name" value=" <?php echo $profile->displayname ?> ">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="pwd">Icon:</label>
          <div class="col-sm-10"> 
            <input type="text" class="form-control" name="icon" value="<?php echo $profile->icon ?>">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="pwd">Homepage:</label>
          <div class="col-sm-10"> 
            <input type="text" class="form-control" name="homepage" value="<?php echo $profile->homepage ?>">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="pwd">Profile Color:</label>
          <div class="col-sm-10"> 
            <input type="text" class="form-control" name="profile_colour" value="<?php echo $profile->profileColor ?>">
          </div>
        </div>
        <div class="form-group"> 
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">Update</button>
          </div>
        </div>
      </form>
  </div>
</div>


