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
			  <form id="contact" action="Cslide/add" method="post" enctype="multipart/form-data">
			  	<div id="contact">
			    <h3 class="text-xs-center">Thêm mới nội dung</h3>
			    <h4 class="text-xs-center">Form nhập nội dung</h4>
			    <fieldset>
			      <input placeholder="Title" type="text" name="title" id="title" tabindex="1" required autofocus>
			    </fieldset>
			    <fieldset>
			      <input placeholder="Description" name="description" id="description" type="text" tabindex="2" required>
			    </fieldset>
			    <fieldset>
			      <input placeholder="Link" name="button_link" id="button_link" type="text" tabindex="3" required>
			    </fieldset>
			    <fieldset>
			      <input placeholder="Content of Link" type="text" name="button_text" id="button_text" tabindex="4" required autofocus>
			    </fieldset>
			    <fieldset>
			    	<label for="Image" class="col-sm-4 form-control-label">Upload</label>
			    	<div class="col-sm-10">
			    		<input type="file" name="slide_image" placeholder="Upload avatar" id="slide_image">
			    	</div>
			    </fieldset>
			    <fieldset>
			      <button type="submit" class="btn btn-outline-success">Thêm mới</button>
			      <button type="reset" class="btn btn-outline-danger">Nhập lại</button>
			    </fieldset>
			  </form>
			  <a href="<?php echo base_url()."Cslide/edit"?>" title="">Edit</a>
			</div>

		</div>
	</div>

</body>
</html>