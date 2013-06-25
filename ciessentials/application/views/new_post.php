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
			<form action="<?=base_url()?>posts/new_post " method="post" >
				<p>Title: <input type="text" name="title"></p>
				<p>Description:<br><textarea name="post" id="" cols="30" rows="10"></textarea></p>
				<p><input type="submit" value="Add Post"></p>
			</form>
		</div>
	</div>
</body>
</html>