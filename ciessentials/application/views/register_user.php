<h2>Register User</h2>

<?php 
if ($errors) {
	echo $errors;
}
?>

<?php echo form_open(base_url().'users/register'); ?>
<p>Username: <?php 
$data_form = array('name' => 'username' ,
	'size' => 50,
	'id' => 'username',
	'value'=>set_value('username')
	);
echo form_input($data_form);
?>
</p>
<p>
	<?php echo form_label('Password', 'password').': '; 
	$data_form = array('name' => 'password' ,
		'size' => 50,
		'id' => 'password'
		);
	echo form_password($data_form);
	?>
</p>
<p>
	<?php echo form_label('Password Confirmed', 'password2').': '; 
	$data_form = array('name' => 'password2' ,
		'size' => 50,
		'id' => 'password2'
		);
	echo form_password($data_form);
	?>
</p>

<p>
	<?php echo form_label('Email', 'email').': '; 
	$data_form = array('id' => 'email',
		'name'=>'email',
		'size'=>50,
		'value'=>set_value('email')
		);
	echo form_input($data_form);
	?>
</p>
<p>
	User Type: <?php 
	$options = array('' => '--' ,
		'admin' => 'Admin',
		'author' => 'Author',
		'user' => 'User'
		);
	echo form_dropdown('user_type', $options, set_value('user_type'),'id="user_type"');
	?>
</p>
<p><?php echo form_submit('', 'Register'); ?></p>
<?php echo form_close(); ?>