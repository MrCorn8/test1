<h2>Login</h2>
<?php if ($error==1) {?>
	<p>Your username/password did not match.</p>
<?} ?>

<form action="<?=base_url() ?>users/login" method="post">
	<p>Username: <input type="text" name="username"></p>
	<p>Password: <input type="password" name="password"></p>
	<p><input type="submit" value="Login"></p>
</form>