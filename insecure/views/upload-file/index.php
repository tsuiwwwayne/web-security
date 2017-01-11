<div class="container below-static-navbar padding-top-20">
    <div class="panel panel-default">
      <div class="panel-heading">Select a file to upload to your account</div>
      <div class="panel-body">
          <form class="form-horizontal" action="?controller=upload&action=uploadfile" method="post" enctype="multipart/form-data">
            <div class="input-group">
             	<label class="input-group-btn">
                    <span class="btn btn-primary">
                        Choose File<input type="file" id="fileToUpload" name="fileToUpload" style="display: none;" multiple="">
                    </span>
                </label>
                <input type="text" class="form-control" readonly>
            </div>
            <br>
            <button type="submit" class="btn btn-default">Upload</button>
          </form>
      </div>
    </div>

    <?php if(isset($output)): ?>
    <div style="border: 2px solid #326ff2; border-radius:5px; padding:10px;" id ="success-msg">
      <?php if($uploadOk == 1): ?>
        <p>File uploaded!</p>
        <p>File available at: <?php echo $filepath ?></p>
      <?php else: ?>
        <p>Upload failed!</p>
        <p><?php echo $output ?></p>
      <?php endif ?>
    </div>
    <?php endif ?>

    <script>
    $(function() {
    	// We can attach the `fileselect` event to all file inputs on the page
    	$(document).on('change', ':file', function() {
    		var input = $(this),
    	    numFiles = input.get(0).files ? input.get(0).files.length : 1,
    	    label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
    	    input.trigger('fileselect', [numFiles, label]);
    	});
    	// We can watch for our custom `fileselect` event like this
    	$(document).ready( function() {
          $(':file').on('fileselect', function(event, numFiles, label) {
            var input = $(this).parents('.input-group').find(':text'),
                log = numFiles > 1 ? numFiles + ' files selected' : label;
    	          if( input.length ) {
    	              input.val(log);
    	          } else {
    	              if( log ) alert(log);
    	          }
            });
    	});
    });
    </script>
</div>
