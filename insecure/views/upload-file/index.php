<div class="panel panel-default" style="margin-top: 30px;">
  <div class="panel-heading">Select a file to upload to your account</div>
  <div class="panel-body">
      <form class="form-horizontal" action="?controller=upload&action=uploadfile" method="post" enctype="multipart/form-data">
        <div class="input-group">
         	<label class="input-group-btn">
                <span class="btn btn-primary">
                    Choose File<input type="file" id="fileToUpload" style="display: none;" multiple="">
                </span>
            </label>
            <input type="text" class="form-control" readonly>
        </div>
        <br>
        <button type="submit" class="btn btn-default">Upload</button>
      </form>
  </div>
</div>

<div style="border: 2px solid #326ff2; border-radius:5px; padding:10px;" id ="success-msg">
	<p>File uploaded!</p>
	<p>File available at: http://google-gruyere.appspot.com/774120962627/lmy6088/output.txt</p>
</div>

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