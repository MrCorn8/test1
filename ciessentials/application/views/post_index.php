<!--<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Posts</title>
</head>
<body>
	<div class="wrapper">
		<h1>My Blog</h1>
		<div class="container">-->
			<?php if ($this->session->userdata('userID')) {?>
				<p>You are logged in!!</p>
				<p><a href="<?=base_url() ?>users/logout">Logout</a></p>
			<?php } else { ?>
				<p><a href="<?=base_url() ?>users/login">Login</a></p>
			<? }
			 ?>
			<h1>Blog posts</h1>
			<?php
			if (!isset($posts)) {
			?>
			<p>There are currently no posts on my blog.</p>
			<?php 
			} else{
				foreach ($posts as $row) {
				?>
				<h2><a href="<?=base_url() ?>posts/post/<?=$row['postID'] ?>"> <?=$row['title'] ?> </a> - <a href="<?=base_url() ?>posts/editpost/<?=$row['postID'] ?> ">Edit</a> | <a href="<?=base_url() ?>posts/deletepost/<?=$row['postID'] ?> ">Delete</a> </h2> 
				<p> <?=substr(strip_tags($row['post']), 0,200).".." ?> </p>
				<p><a href=" <?=base_url() ?>posts/post/<?=$row['postID'] ?> ">Read more</a></p>
				<hr>
				<?php
				}
			}
			?>
			<br>
<!--			<?php echo 'This is the last count '.$last_count ?>
			<?php echo $comment ?>-->
			<?=$pages ?>
			<br><br>
<!--		</div>
	</div>

</body>
</html>-->