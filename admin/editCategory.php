<?php
include_once('includes/conn.php');
include_once('includes/loginChecker.php');
if (isset($_GET['id'])) {
	$id = $_GET['id'];

	if ($_SERVER['REQUEST_METHOD'] === "POST") {
		try {
			$tag_name = $_POST['tag_name'];
			$sql = "UPDATE `tags` SET `tag_name`=? WHERE `id`= ?";
			$stmt1 = $conn->prepare($sql);
			$stmt1->execute([$tag_name, $id]);
			header('location: categories.php');
			die;
		} catch (PDOException $e) {
			echo $e->getMessage();

		}
	}

	try {
		$sql = 'SELECT * FROM `tags` WHERE `id` =?';
		$stmt2 = $conn->prepare($sql);
		$stmt2->execute([$id]);
		$result3 = $stmt2->fetch();
		$tag_name = $result3['tag_name'];
	} catch (PDOException $e) {
		echo $e->getMessage();

	}

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<?php
	$header = "Edit Tag";
	$title = "Images Admin | Edit Tag";
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
					include_once("includes/header.php")
						?>
					<div class="clearfix"></div>
					<div class="row">
						<div class="col-md-12 col-sm-12 ">
							<div class="x_panel">
								<?php
								$title = "Edit Tag";
								include_once("includes/xTitle.php");
								?>
								<div class="x_content">
									<br />
									<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"
										action="" method="post">

										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align"
												for="add-category">Edit Tag <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" id="add-category" required="required"
													class="form-control " name="tag_name"
													value="<?php echo $tag_name; ?>">
											</div>
										</div>

										<div class="ln_solid"></div>
										<div class="item form-group">
											<div class="col-md-6 col-sm-6 offset-md-3">
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