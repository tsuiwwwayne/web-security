<div class="container below-static-navbar padding-top-20">
  <p>Oops, this is the error page.</p>
  <p>Looks like something went wrong.</p>
  <?php if (isset($output)): ?>
  <p>Please review the following error message: <?php echo $output ?></p>
  <?php endif ?>
</div>
