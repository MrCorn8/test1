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
			<?php if (!isset($post)) {?>
				<p>This page was accesed incorrectly</p>
			<?php } else{ ?>
			<h2><?=$post['title'] ?> </h2>
			<?=$post['post'] ?>
			<?php } ?>
		</div>
	</div>
</body>
</html>