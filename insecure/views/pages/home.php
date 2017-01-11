<p>Hello world!<p>

<p>This is the home page.</p>

<?php if ($loggedIn): ?>
<p>You are logged in as <?php echo $displayName ?>.</p>
<?php else: ?>
<p>You are not logged in.</p>
<?php endif ?>