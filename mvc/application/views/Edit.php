<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Phone Numbers</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">  
	<script type="text/javascript" src="<?php echo base_url() ?>vendor/bootstrap.js"></script>
 	<script type="text/javascript" src="1.js"></script>
	<link rel="stylesheet" href="<?php echo base_url() ?>vendor/bootstrap.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>vendor/font-awesome.css">
 	<link rel="stylesheet" href="1.css">
</head>
<body>
	<?php require_once('header.php'); ?>
	<div class="container">
		<h2 class="text-xs-center">Sua so dien thoai</h2>
	</div>
	<hr>
	<div class="container">
		<div class="row">
			<div class="col-sm-8 push-sm-2">
				<form action="../update/<?php foreach($data as $key => $value)
						{
							echo $value['id'];
						}
						?>" method="post" enctype="multidata/form-data">
					<div class="card">
						<?php foreach($data as $key => $value)
						{

						?>
						<div class="card-block">
							<!-- <fieldset class="form-group">
								<label for="formGroupExampleInput">ID</label>
								<input type="hidden" name="id" class="form-control" value="<?php echo $value['id']?>" id="formGroupExampleInput" placeholder="<?php echo $value['id']?>"> <!-- khong nen de disabled vi id no k gui duoc -->
							</fieldset> -->
							<fieldset class="form-group">
								<label for="formGroupExampleInput">So Sim</label>
								<input type="text" name="so" class="form-control" id="formGroupExampleInput" placeholder="<?php echo $value['so']?>">
							</fieldset>
							<fieldset class="form-group">
								<label for="formGroupExampleInput">Gia ban</label>
								<input type="text" name="gia" class="form-control" id="formGroupExampleInput" placeholder="<?php echo $value['gia']?>">
							</fieldset>
							<input type="submit" class="btn btn-success btn-block" value="OK">
						</div>
						<?php 
						}
						?>
					</div>
				</form>

				<!-- <form action="Cmvc/show" method="post" enctype="multidata/form-data">
					<div class="card">
						<div class="card-block">
							<input type="submit" class="btn btn-success btn-block" value="Xem so sim">
						</div>
					</div>
				</form> -->
			</div>
		</div>
	</div>
</body>
</html>