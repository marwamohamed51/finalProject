<?php
include_once('includes/loginChecker.php');
include_once('includes/conn.php');
// Fetch tags from the database
try {
	$sql = 'SELECT * FROM  `tags`';
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	$result4 = $stmt->fetchAll();
} catch (PDOException $e) {
	echo $e->getMessage();
}

// Insert photo into the database (catalog)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	try {
		// Validate input data
		$title = $_POST['title'];
		$license = $_POST['license'];
		$dimension = $_POST['dimension'];
		$format = $_POST['format'];
		$active = isset($_POST['active']);
		$tag_id = $_POST['tag_id'];
		$date = $_POST['date'];

		// Include file upload handling
		include_once('includes/upload.php');
		$sql = 'INSERT INTO `catalog`(`title`, `license`, `dimension`, `format`, `active`, `image`, `tag_id`, `date`) 
		VALUES (?,?,?,?,?,?,?,?)';
		$stmt = $conn->prepare($sql);
		$stmt->execute([$title, $license, $dimension, $format, $active, $image_name, $tag_id, $date]);
		// echo "Your data inserted successfuly :)";
		
		// Redirect to the photos page after successful insertion
		header('location: photos.php');
	} catch (PDOException $e) {
		echo $e->getMessage();
	}
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
	<?php
	$header = "Manage Photos";
	$title = "Images Admin | Add Photo";
	include_once("includes/head.php")
		?>
</head>

<body class="nav-md">
	<div class="container body">
		<div class="main_container">
			<?php
			include_once("includes/navigation.php");
			include_once("includes/topNavigation.php")
				?>

			<!-- page content -->
			<div class="right_col" role="main">
				<div class="">
					<?php
					include_once("includes/header.php");
					?>
					<div class="clearfix"></div>
					<div class="row">
						<div class="col-md-12 col-sm-12 ">
							<div class="x_panel">
								<?php
								$title = "Add Photo";
								include_once("includes/xTitle.php");
								?>
								<div class="x_content">
									<br />
									<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"
										action="" method="POST" enctype="multipart/form-data">
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align"
												for="photo-date">Photo Date <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="date" id="photo-date" required="required"
													class="form-control " name="date">
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align"
												for="title">Title <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" id="title" required="required" class="form-control "
													name="title">
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align"
												for="license">License <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<textarea id="content" name="license" required="required"
													class="form-control">License</textarea>
											</div>
										</div>
										<div class="item form-group">
											<label for="dimension"
												class="col-form-label col-md-3 col-sm-3 label-align">Dimension <span
													class="required">*</span></label>
											<div class="col-md-6 col-sm-6 ">
												<input id="dimension" class="form-control" type="text" name="dimension"
													required="required">
											</div>
										</div>
										<div class="item form-group">
											<label for="format"
												class="col-form-label col-md-3 col-sm-3 label-align">Format <span
													class="required">*</span></label>
											<div class="col-md-6 col-sm-6 ">
												<input id="format" class="form-control" type="text" name="format"
													required="required">
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align">Active</label>
											<div class="checkbox">
												<label>
													<input type="checkbox" class="flat" name="active">
												</label>
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align"
												for="image">Image <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="file" id="image" name="image" required="required"
													class="form-control">
											</div>
										</div>

										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="tag_id">Tag
												<span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<select class="form-control" name="tag_id" id="">
													<option value=" ">Select Tag</option>
													<?php
													foreach ($result4 as $tag) {
														?>
														<option value="<?php echo $tag['id'] ?> ">
															<?php echo $tag['tag_name']; ?>
														</option>
														<?php
													}
													?>
													<!-- <option value="cat1">Category 1</option>
													<option value="cat2">Category 2</option> -->
												</select>
											</div>
										</div>
										<div class="ln_solid"></div>
										<div class="item form-group">
											<div class="col-md-6 col-sm-6 offset-md-3">
												<button class="btn btn-primary" type="button">Cancel</button>
												<button type="submit" class="btn btn-success">Add</button>
											</div>
										</div>

									</form>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
			<!-- /page content -->

			<!-- footer content -->
			<?php
			include_once("includes/footer.php")
				?>
			<!-- /footer content -->
		</div>
	</div>

	<?php
	include_once("includes/jsFooter.php")
		?>

</body>

</html>