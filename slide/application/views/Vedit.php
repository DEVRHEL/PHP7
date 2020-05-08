<!DOCTYPE html>
<html lang="en"><head>
	<title> Giao diện hiển thị danh sách nhân sự </title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">  
	<script type="text/javascript" src="<?php echo base_url();?>vendor/bootstrap.js"></script>
 	<script type="text/javascript" src="1.js"></script>
	<link rel="stylesheet" href="<?php echo base_url();?>vendor/bootstrap.css">
	<link rel="stylesheet" href="<?php echo base_url();?>vendor/font-awesome.css">
 	<link rel="stylesheet" href="<?php echo base_url();?>1.css">
	<!-- jquert file upload -->
	<script type="text/javascript" src="<?php echo base_url();?>jqueryupload/js/vendor/jquery.ui.widget.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>jqueryupload/js/jquery.fileupload.js"></script>
	
</head>
</head>
<body >
 	<div class="container">
 		<div class="row">
 			<div class="col-sm-7 push-sm-3">
			  <form id="contact" action="update" method="post" enctype="multipart/form-data">
			  	<div id="contact">
			    <h3 class="text-xs-center">Sửa nội dung</h3>
			    <h4 class="text-xs-center">Form sửa nội dung</h4>
			    <?php foreach ($mangdl as $key => $value): ?>
			    	
					<hr>
				    <fieldset>
				      <input value="<?= $value['title']?>" type="text" name="title[]" id="title" tabindex="1" required autofocus>
				    </fieldset>
				    <fieldset>
				      <input value="<?= $value['description']?>" name="description[]" id="description" type="text" tabindex="2" required>
				    </fieldset>
				    <fieldset>
				      <input value="<?= $value['button_link']?>" name="button_link[]" id="button_link" type="text" tabindex="3" required>
				    </fieldset>
				    <fieldset>
				      <input value="<?= $value['button_text']?>" type="text" name="button_text[]" id="button_text" tabindex="4" required autofocus>
				    </fieldset>
				    <fieldset>
				    	<label for="Image" class="col-sm-4 form-control-label">Upload</label>
				    	<div class="col-sm-10">
				    		<img src="<?= $value['slide_image']?>" alt="" width="40%">
				    		<input value="<?= $value['slide_image']?>" type="text" name="slide_image_old[]" id="button_text">
				    		<input type="file" name="slide_image[]" id="slide_image">
				    	</div>
				    </fieldset>

			    <?php endforeach ?>
			    <fieldset>
			      <button type="submit" class="btn btn-outline-success">Sửa</button>
			      <button type="reset" class="btn btn-outline-danger">Nhập lại</button>
			    </fieldset>
			  </form>
			</div>
		</div>
	</div>
</body>
</html>