<?php
	$sql = "SELECT * FROM showcase";
	$query = mysqli_query($con,$sql);
	$totalrows = mysqli_num_rows($query);
	// echo "$totalrows";
?>

<div class="container banner">
	<hr>
	<div class="row">
		<div  class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
			<h3>All Showcase (<?php echo $totalrows ?>)</h3>
		</div>
		<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
			<a style="float: right;" href="main.php?page_layout=add-showcase">
				<button type="button" class="btn btn-info add">
					<span class="glyphicon glyphicon-plus-sign"></span> Thêm
				</button>
			</a>
		</div>
	</div>
	<hr>
	<?php
		while ($rows = mysqli_fetch_array($query)) {
		?>
	<div class="row">
		
			<div class="col-xs-12 col-sm-5 col-md-3 col-lg-3">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<img src="../image/<?php echo $rows['anh'] ?>" width=100% height=auto>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 flex-container">					
						<a href="main.php?page_layout=edit-showcase&id=<?php echo $rows['id']?>" ><button type="button" class="btn btn-info edit flex-item">Sửa</button></a>
						<?php
							if ($totalrows > 6) {									
							?>
								<a onclick="return confirm('Bạn muốn xóa Banner này ?')" href="main.php?page_layout=del-showcase&id=<?php echo $rows['id']?>" ><button type="button" class="btn btn-danger remove flex-item">Xóa</button></a>
							<?php
							}else{
								?>
								<a onclick="return alert('Bạn không thể xóa Banner này ?')" href="" ><button type="button" class="btn btn-danger remove flex-item" disabled>Xóa</button></a>
								<?php
							}
						?>
					</div>
				</div>
			</div>
			
			<div class="col-xs-12 col-sm-7 col-md-9 col-lg-9">
				<table class="table table-striped table-hover">
					<tbody>
							<tr>
								<td class="title text-center" colspan="2">
									Thông tin Project <?php echo $rows['id']?>
								</td>
							</tr>
							<tr>
								<td class="title">ID</td>
								<td><?php echo $rows['id'] ?></td>
							</tr>

							<tr>
								<td class="title">Project name</td>
								<td><?php echo $rows['name_project'] ?></td>
							</tr>

							<tr>
								<td class="title">Description</td>
								<td><?php echo $rows['description'] ?></td>
							</tr>

							<tr>
								<td class="title">Project link</td>
								<td><a href="<?php echo $rows['link_project'] ?>"><?php echo $rows['link_project'] ?></a></td>
							</tr>

							<tr>
								<td class="title">Date</td>
								<td><?php echo $rows['date_add'] ?></td>
							</tr>

		
					</tbody>
				</table>
			</div>
	</div>
	<hr>
	<?php
		}
	?>
	
	
</div>