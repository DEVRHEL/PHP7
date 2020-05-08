<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>View dau tien</title>
	<style>
		h3{
			text-align: center;
			font-family: 'segoe ui light';
			border-bottom: 1px solid gray;
			padding: 10px;
		}
	</style>
</head>
<body>
	<h3>Du lieu cac so</h3>
	<ul>
		<!-- <?php foreach ($ds as $key): ?>
			<li>
				<?php echo $key; ?>
			</li>
		<?php endforeach ?> -->
		<?php 
			foreach ($ds as $key)
			{
				?>
				<!-- echo "<li>".$key."</li>"; -->
			<li><?php echo $key; ?></li>
		<?php  }; ?>		
			
	</ul>
</body>
</html>