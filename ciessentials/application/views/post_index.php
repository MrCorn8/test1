			<?php if ($this->session->userdata('userID')) {?>
				<p>You are logged in!!</p>
				<p><a href="<?=base_url() ?>users/logout">Logout</a></p>
				<p>User Type: <?=$this->session->userdata('user_type'); ?></p>
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
			<?=$pages ?>
			<br><br>
