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
 		<div class="text-xs-center">
 			<h3 class="display-3">Danh sách nhân sự</h3>
 			<hr>
 		</div>
 	</div>
 	<div class="container">
 		<div class="row">
 			<div class="card-deck-wrapper">
 				<div class="card-deck">

				<?php foreach ($datans as $value): ?>
 				<div class="card">
 					<img class="card-img-top img-fluid" src="<?php echo $value['anhavatar']; ?>" width=400px alt="Card image cap">
 						<div class="card-block">
 							<h4 class="card-title ten">
 								<?php echo $value['ten'];?>
 							</h4>
 							<p class="card-text tuoi">Tuoi: <?php echo $value['tuoi'];?></p>
 							<p class="card-text sdt">Tel: <?php echo $value['sdt'];?></p>
 							<p class="card-text sodonhang">So don hoan thanh: <?php echo $value['sodonhang'];?></p>
 							<p class="card-text linkfb"><small><a href="<?php echo $value['linkfb'];?>" class="btn btn-outline-info">Facebook <i class="fa fa-chevron-right"></i></a></small></p>
 							<p class="card-text editns"><small><a href="<?php echo base_url()."index.php/Cns/editns/".$value['id'];?>" class="btn btn-outline-warning">Sửa nội dung <i class="fa fa-pencil"></i></a></small></p>
 							<p class="card-text deletens"><small><a href="<?php echo base_url()."index.php/Cns/deletens/".$value['id'];?>" class="btn btn-outline-danger">Xóa nhân sự <i class="fa fa-remove"></i></a></small></p>

 						</div>
 				</div>
				<?php endforeach ?>
				</div>
 			</div>
 		</div>
 		<hr>
 		<div class="row">
 			<div class="container col-sm-6">  
			  <!-- <form id="contact" action="<?php echo base_url()."index.php/";?>Cns/addns" method="post" enctype="multipart/form-data"> -->
			  	<div id="contact">
			  		
			  	
			    <h3 class="text-xs-center">Thêm mới nhân sự</h3>
			    <h4 class="text-xs-center">Form nhập dữ liệu nhân viên</h4>
			    <!-- <?php 
					if(isset($kq))
					{
						echo "<div class=\"alert alert-info\" role=\"alert\">".$kq."</div>";	
					}
			     ?> -->
			    <fieldset>
			      <input placeholder="Ten nhan vien" type="text" name="ten" id="ten" tabindex="1" required autofocus>
			    </fieldset>
			    <fieldset>
			      <input placeholder="Tuoi" name="tuoi" id="tuoi" type="number" tabindex="2" required>
			    </fieldset>
			    <fieldset>
			      <input placeholder="Phone Number" name="sdt" id="sdt" type="text" tabindex="3" required>
			    </fieldset>
			    <fieldset>
			      <input placeholder="Link fb" type="text" name="linkfb" id="linkfb" tabindex="4" required autofocus>
			    </fieldset>
			    <fieldset>
			      <input placeholder="So don hang" name="sodonhang" id="sodonhang" type="number" tabindex="5" required>
			    </fieldset>
			    <fieldset>
			    	<label for="anh" class="col-sm-4 form-control-label">Ảnh đại diện</label>
			    	<div class="col-sm-10">
			    		<input type="file" name="files[]" placeholder="Upload avatar" id="anhavatar">
			    	</div>
			    </fieldset>
			    <!-- <?php
					if(isset($imgerr1))
					{
						echo "<div class=\"alert alert-danger\" role=\"alert\">".$imgerr1."</div>";	
					}
					if(isset($imgerr2))
					{
						echo "<div class=\"alert alert-danger\" role=\"alert\">".$imgerr2."</div>";	
					}
					if(isset($imgerr3))
					{
						echo "<div class=\"alert alert-danger\" role=\"alert\">".$imgerr3."</div>";	
					}
					if(isset($imgerr4))
					{
						echo "<div class=\"alert alert-danger\" role=\"alert\">".$imgerr4."</div>";	
					}
			    ?> -->
			    <fieldset>
			      <button type="button" class="btn btn-outline-success btnaddajax">Thêm mới</button>
			      <button type="reset" class="btn btn-outline-danger">Nhập lại</button>
			    </fieldset>
			  <!-- </form> -->
			  </div>
			</div>
			<script>

		duongdan='<?php echo base_url();?>';
		$('#anhavatar').fileupload({
			url: duongdan + 'index.php/Cns/uploadfile',
			dataType: 'json',
			done: function(e,data){
				$.each(data.result.files,function(index,file){
					tenfile = file.url;
				});
			}
		})

 		$('.btnaddajax').click(function(event)
 		{
 			$.ajax({
 			url: 'Cns/ajax_add',
 			type: 'POST',
 			dataType: 'json',
 			data: {
 				ten: $('#ten').val(),
 				tuoi: $('#tuoi').val(),
 				sdt: $('#sdt').val(),
 				anhavatar: tenfile,
 				linkfb: $('#linkfb').val(),
 				sodonhang: $('#sodonhang').val(),
	 		},
	 		})
	 		.done(function() {
	 			console.log("success");
	 		})
	 		.fail(function() {
	 			console.log("error");
	 		})
	 		.always(function() {
	 			console.log("complete");
	 			noidung ='<div class="card">';
 				noidung+='	<img class="card-img-top img-fluid" src="'+tenfile+'" width=400px alt="Card image cap">';
 				noidung+='	<div class="card-block">';
 				noidung+='			<h4 class="card-title ten">'+$('#ten').val()+'</h4>';		
 				noidung+='			<p class="card-text tuoi">Tuoi: '+$('#tuoi').val()+'</p>';
 				noidung+='			<p class="card-text sdt">Tel: '+$('#sdt').val()+'</p>';
 				noidung+='			<p class="card-text sodonhang">So don hoan thanh: '+$('#sodonhang').val()+'</p>';
 				noidung+='			<p class="card-text linkfb"><small><a href="'+$('#linkfb').val()+'" class="btn btn-outline-info">Facebook <i class="fa fa-chevron-right"></i></a></small></p>';
 				noidung+='			<p class="card-text editns"><small><a href="<?php echo base_url()."index.php/Cns/editns/".$value['id'];?>" class="btn btn-outline-warning">Sửa nội dung <i class="fa fa-pencil"></i></a></small></p>';
 				noidung+='			<p class="card-text deletens"><small><a href="<?php echo base_url()."index.php/Cns/deletens/".$value['id'];?>" class="btn btn-outline-danger">Xóa nhân sự <i class="fa fa-remove"></i></a></small></p>';
 				noidung+='		</div>';
 				noidung+='</div>';
 				if(($('#ten').val() !='') && ($('#tuoi').val()!='') && ($('#sdt').val()!='') && ($('#sodonhang').val()!='') && ($('#linkfb').val()!=''))
	 			{$('.card-deck').append(noidung);}
	 			else
	 			{
	 				alert('Bạn hãy nhập đầy đủ dữ liệu');
	 			};
	 			// reset dat lai gia tri o form sau khi them moi
	 			$('#ten').val('');
 				$('#tuoi').val('');
 				$('#sdt').val('');
 				// anhavatar: $('#anhavatar').val();
 				$('#linkfb').val('');
 				$('#sodonhang').val('');
	 		});
 		});
 		
 		
 	</script>
 		</div>
 	</div>
 	
</body>
</html>