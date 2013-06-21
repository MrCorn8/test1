<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Posts</title>
</head>
<body>
	<div class="wrapper">
		<h1>My Blog</h1>
		<div class="container">
			<h1>Blog posts</h1>
			<?php
			if (!isset($posts)) {
			?>
			<p>There are currently no posts on my blog.</p>
			<?php 
			} else{
				foreach ($posts as $row) {
				?>
				<h2><a href="<?=base_url() ?>posts/post/<?=$row['postID'] ?>"> <?=$row['title'] ?> </a></h2>
				<p> <?=substr(strip_tags($row['post']), 0,200).".." ?> </p>
				<p><a href=" <?=base_url() ?>posts/post/<?=$row['postID'] ?> ">Read more</a></p>
				<hr>
				<?php
				}
			}
			?>
		</div>
	</div>

</body>
</html>

