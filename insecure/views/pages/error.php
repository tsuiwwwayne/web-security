<div class="container below-static-navbar padding-top-20">
    <div class="text-center text-danger">
        <h2>Error</h2>
        <p>Looks like something went wrong.</p>
        <?php if (isset($output)): ?>
        <p>Please review the following error message: <?php echo $output ?></p>
        <?php endif ?>
    </div>
</div>    