<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>My blog</title>
</head>
<body>
	<div class="wrapper">
		<h1>My blog</h1>
		<div class="container">
			<?php if ($success==1) {?>
			<div>This post has been updated</div>
			<?php } ?>

			<form action="<?=base_url()?>posts/editpost/<?=$post['postID'] ?> " method="post" >
				<p>Title: <input type="text" name="title" value="<?=$post['title'] ?>"></p>
				<p>Description:<br><textarea name="post" id="" cols="30" rows="10"><?=$post['post'] ?></textarea></p>
				<p><input type="submit" value="Edit Post"></p>
			</form>
		</div>
	</div>
</div>
</body>
</html>