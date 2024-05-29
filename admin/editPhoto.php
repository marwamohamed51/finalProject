<?php
include_once('includes/loginChecker.php');
if (isset($_GET['id']) and $_GET['id'] > 0) {
	include_once('includes/conn.php');
	$id = $_GET['id'];

	// insert car into DB
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		try {
			$title = $_POST['title'];
			$license = $_POST['license'];
			$dimension = $_POST['dimension'];
			$format = $_POST['format'];
			$active = isset($_POST['active']);
			$tag_id = $_POST['tag_id'];
			$date = $_POST['date'];
			if ($_FILES['image']['error'] === UPLOAD_ERR_OK) {
				include_once('includes/upload.php');
				$tagImage = $image_name;
			} else {
				$tagImage = $_POST['oldImage'];
			}

			$sql = 'UPDATE `catalog` SET `title`=?,`license`=?,`dimension`=?,`format`=?,`active`=?,`image`=?,`tag_id`=?,`date`=? WHERE `id`=?';
			$stmt = $conn->prepare($sql);
			$stmt->execute([$title, $license, $dimension, $format, $active, $tagImage, $tag_id, $date, $id]);
			header('location: photos.php');
			die();
			// echo "Your data inserted successfuly :)";
		} catch (PDOException $e) {
			echo $e->getMessage();

		}

	}

	//get current photo detail
	try {
		$sql = 'SELECT * FROM `catalog` WHERE id =?';
		$photo_stmt = $conn->prepare($sql);
		$photo_stmt->execute([$id]);
		$photo_result = $photo_stmt->fetch();
	} catch (PDOException $e) {
		echo $e->getMessage();
	}

		// show Tags in select tag
	try {
		$sql = 'SELECT * FROM `tags`';
		$stmt = $conn->prepare($sql);
		$stmt->execute();
		$result5 = $stmt->fetchAll();
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
	$title = "Images Admin | Edit Photo";
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
								$title = "Edit Photo";
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
													class="form-control " name="date"
													value="<?php echo $photo_result['date'] ?>">
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align"
												for="title">Title <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" id="title" required="required" class="form-control "
													name="title" value="<?php echo $photo_result['title'] ?>">
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align"
												for="license">License <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<textarea id="content" name="license" required="required"
													class="form-control"><?php echo $photo_result['license'] ?></textarea>
											</div>
										</div>
										<div class="item form-group">
											<label for="dimension"
												class="col-form-label col-md-3 col-sm-3 label-align">Dimension <span
													class="required">*</span></label>
											<div class="col-md-6 col-sm-6 ">
												<input id="dimension" class="form-control" type="text" name="dimension"
													required="required"
													value="<?php echo $photo_result['dimension'] ?>">
											</div>
										</div>
										<div class="item form-group">
											<label for="format"
												class="col-form-label col-md-3 col-sm-3 label-align">Format <span
													class="required">*</span></label>
											<div class="col-md-6 col-sm-6 ">
												<input id="format" class="form-control" type="text" name="format"
													required="required" value="<?php echo $photo_result['format'] ?>">
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align">Active</label>
											<div class="checkbox">
												<label>
													<input type="checkbox" class="flat" name="active" <?php echo $photo_result['active'] ? "checked" : "" ?>>
												</label>
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align"
												for="image">Image <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="file" id="image" name="image"
													class="form-control">
												<br>
												<img src="images/<?php echo $photo_result['image'] ?>"
													alt="<?php echo $photo_result['title'] ?>" style="width: 300px;">
											</div>
										</div>

										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="tag_id">Tag
												<span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
											<select class="form-control" name="tag_id" id="">
													<!-- <option value=" ">Select Tag</option> -->
													<?php
													foreach ($result5 as $tag) {
														?>
														<option value="<?php echo $tag['id'] ?> " 
														<?php echo $photo_result['tag_id'] == $tag['id'] ? "selected" : "" ?>>
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
												<input type="hidden" name="oldImage"
													value="<?php echo $photo_result['image'] ?>">
												<button class="btn btn-primary" type="button">Cancel</button>
												<button type="submit" class="btn btn-success">Update</button>
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