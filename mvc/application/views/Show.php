<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Xem du lieu</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">  
	<script type="text/javascript" src="<?php echo base_url() ?>vendor/bootstrap.js"></script>
 	<script type="text/javascript" src="1.js"></script>
	<link rel="stylesheet" href="<?php echo base_url() ?>vendor/bootstrap.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>vendor/font-awesome.css">
 	<link rel="stylesheet" href="1.css">
</head>
<body>
	<?php require_once('header.php'); ?>
	<div class="container">	<div class="text-xs-center">Cac sim va gia hien co</div>
	<hr>
	</div>
	<div class="contrainer">
		<?php foreach ($data as $key => $value)
				{
		?>
		<div class="row">
			<div class="col-sm-4 push-sm-4">
				<div class="card card-block">
					<h3 class="card-title"><?php echo "So sim: ".$value['so']?></h3>
					<p class="card-text"><?php echo "Gia: ".$value['gia']?></p>
					<a href="delete/<?php echo $value['id']?>" class="btn btn-danger xoa"><i class="fa fa-trash" aria-hidden="true"></i></a>
					<a href="edit/<?php echo $value['id']?>" class="btn btn-warning xoa"><i class="fa fa-pencil" aria-hidden="true"></i></a>
				</div>
			</div>			
		</div>
		<?php
				}
		?>
	</div>
</body>
</html>