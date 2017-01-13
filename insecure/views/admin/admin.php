<?php if(!WEB_SAFE): ?>
  <!--Load old version of jQuery that is vulnerable to location.hash XSS-->
  <script src="https://code.jquery.com/jquery-1.6.2.min.js"></script>

  <!-- Load old version of jQuery UI that is vulnerable to XSS via dialog title option -->
  <script src="http://code.jquery.com/ui/1.9.1/jquery-ui.min.js"></script>
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.9.1/themes/smoothness/jquery-ui.css" />
<?php else: ?>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<?php endif ?>

<script>
   $(function() {
      $("#delete-website-modal").dialog({
        autoOpen: true,
        resizable: false,
        height: "auto",
        width: 400,
        modal: true,
        buttons: {
          "Confirm": function() {
            $("#delete-website-btn").prop('disabled', true);
            $("#delete-website-btn").text("Nice try!");
            $(this).dialog("close");

          },
          Cancel: function() {
            $(this).dialog("close");
          }
        }
      });
      $("#delete-website-modal").dialog({title:"<?php echo $inputUsername ?>"});
   });
</script>

<div class="container below-static-navbar padding-top-20">
    <div class="text-center">
        <h1 class="margin-20">Administrator Panel</h1>
        <?php if($find): ?>
        <div id = "delete-website-modal">The website will be permanently deleted and cannot be recovered. Are you sure?</div>
        <?php endif ?>

        <form class="form-horizontal" method="post" action="?controller=admin&action=displayUserInformation">
            <div class="form-group">
               <div class="row margin-left-20 margin-right-20">
                  <label class="control-label col-sm-3" for="username">Goodbye Message:</label>
                  <div class="col-sm-8">
                     <input type="text" class="form-control" name="message" placeholder="Enter message" required>
                  </div>
               </div>
            </div>
            <button id="delete-website-btn" class="btn btn-danger padding-left-20 padding-right-20" type="submit">Delete Website</button>
        </form>
    </div>
</div>
