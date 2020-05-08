<!DOCTYPE html>
<html lang="en"><head>
	<title> Giao diện chỉnh sửa nhân sự </title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">  
	<script type="text/javascript" src="<?php echo base_url();?>vendor/bootstrap.js"></script>
 	<script type="text/javascript" src="1.js"></script>
	<link rel="stylesheet" href="<?php echo base_url();?>vendor/bootstrap.css">
	<link rel="stylesheet" href="<?php echo base_url();?>vendor/font-awesome.css">
 	<link rel="stylesheet" href="<?php echo base_url();?>1.css">
</head>
<body >
 	<div class="container">
 		<div class="text-xs-center">
 			<h3 class="display-3">Chỉnh sửa nhân sự</h3>
 		</div>
 	</div>
 	<div class="container">
 		<div class="row">
 			<div class="container col-sm-6"> 
 			<?php foreach ($data as $value): ?>
			  <form id="contact" action="<?php echo base_url()."index.php/";?>Cns/updatens/<?php echo $value['id'];?>" method="post" enctype="multipart/form-data">
			    <h3 class="text-xs-center">Nhân sự</h3>
			    <h4 class="text-xs-center">Form chỉnh sửa nhân sự</h4>
			    <?php 
					if(isset($kq))
					{
						echo "<div class=\"alert alert-info\" role=\"alert\">".$kq."</div>";	
					}
			     ?>
			     
			     	<fieldset>
			      	<input value="<?php echo $value['ten'];?>" type="text" name="ten" id="ten" tabindex="1" required autofocus>
				    </fieldset>
				    <fieldset>
				      <input value="<?php echo $value['tuoi'];?>" name="tuoi" id="tuoi" type="number" tabindex="2" required>
				    </fieldset>
				    <fieldset>
				      <input value="<?php echo $value['sdt'];?>" name="sdt" id="sdt" type="text" tabindex="3" required>
				    </fieldset>
				    <fieldset>
				      <input value="<?php echo $value['linkfb'];?>" type="text" name="linkfb" id="linkfb" tabindex="4" required autofocus>
				    </fieldset>
				    <fieldset>
				      <input value="<?php echo $value['sodonhang'];?>" name="sodonhang" id="sodonhang" type="number" tabindex="5" required>
				    </fieldset>
				    <fieldset>
				    	<label for="anh" class="col-sm-4 form-control-label">Anh dai dien</label>
				    	<img class="card-img-top img-fluid" src="<?php echo $value['anhavatar']; ?>" width=600px alt="Card image cap">
				    	<div style="padding: 2px">	
				    	</div>
				    	<div class="col-sm-1">
				    		<input type="hidden" name="ava" value="<?php echo $value['anhavatar'];?>">
				    		<input type="file" name="anhavatar" placeholder="Upload avatar" id="anhavatar">
				    	</div>
				    </fieldset>
			     <?php endforeach ?>
			    <fieldset>
			      <button type="submit" class="btn btn-outline-success">Lưu</button>
			      <a class="btn btn-outline-info" href="<?php echo base_url()."index.php/Cns"?>" title="Back">Trở về</a>
			    </fieldset>
			  </form>
			</div>
 		</div>
 	</div>
</body>
</html>