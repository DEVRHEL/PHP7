<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/brand.php';?>
<?php include '../classes/category.php';?>
<?php include '../classes/product.php';?>
<?php include_once '../helpers/format.php';?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Post List</h2>
        <div class="block">  
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>ID</th>
					<th>Product Name</th>
					<th>Price</th>
					<th>Product Image</th>
					<th>Category</th>
					<th>Brand</th>
					<th>Description</th>
					<th>Type</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$pd=new product();
				$fm=new Format();
				$pdlist=$pd->show_product();
				if($pdlist)
				{
					$i=0;
					while($result=$pdlist->fetch_assoc())
					{
						$i++;
				?>
				<tr class="odd gradeX">
					<td><?php echo $i?></td>
					<td><?php echo $result['productName']?></td>
					<td><?php echo $result['price']?></td>
					<td><img src="uploads/<?php echo $result['image']?>" width="80"></td>
					<td><?php echo $result['catId']?></td>
					<td><?php echo $result['brandId']?></td>
					<td>
						<?php
							$text=$fm->textShorten($result['product_desc'],30);
							echo $text;
						?>
					</td>
					<td class="center">
						<?php
							if($result['type']==0)
								{echo 'Feathered';}
							else
								{echo 'Non feathered';}
						?>
					</td>
					<td><a href="">Edit</a> || <a href="">Delete</a></td>
				</tr>
				
				<?php
					}
				}
				?>

			</tbody>
		</table>

       </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();
        $('.datatable').dataTable();
		setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php';?>
