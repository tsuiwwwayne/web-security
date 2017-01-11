<div class="panel panel-default" style="margin-top: 30px;">
  <div class="panel-heading">Edit your profile</div>
  <div class="panel-body">
      <form class="form-horizontal">
        <div class="form-group">
          <label class="control-label col-sm-2" for="email">UserID:</label>
          <div class="col-sm-10">
            <label class="control-label for="email"><?php echo $username ?></label>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="pwd">Display Name:</label>
          <div class="col-sm-10"> 
            <input type="text" class="form-control" id="display_name" placeholder="Display Name">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="pwd">Icon:</label>
          <div class="col-sm-10"> 
            <input type="text" class="form-control" id="icon">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="pwd">Homepage:</label>
          <div class="col-sm-10"> 
            <input type="text" class="form-control" id="homepage" placeholder="Homepage">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="pwd">Profile Color:</label>
          <div class="col-sm-10"> 
            <input type="text" class="form-control" id="profile_colour">
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


