<?php
include_once('includes/loginChecker.php');
include_once('includes/conn.php');

// insert tag into DB
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	try {
		$tag_name = $_POST['tag_name'];
		$sql = 'INSERT INTO `tags`(`tag_name`) VALUES (?)';
		$stmt = $conn->prepare($sql);
		$stmt->execute([$tag_name]);
		header('Location: categories.php');
		exit; // Add this line to prevent further execution after redirection
	} catch (PDOException $e) {
		if ($e->getCode() == '23000') { // Check if it's a duplicate entry error
			// You can set a session variable to display the error message on the redirected page
			$_SESSION['error_message'] = "This category is already exists.";
			header('Location: categories.php');
			exit;
		} else {
			// Handle other types of errors
			echo "An error occurred: " . $e->getMessage();
		}
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<?php
	$header = "Manage Tags";
	$title = "Images Admin | Add Tag";
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
								$title = "Add Tag";
								include_once("includes/xTitle.php");
								?>
								<div class="x_content">
									<br />
									<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"
										action="" method="post">

										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align"
												for="add-category">Add Tag <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" id="add-category" required="required"
													class="form-control" name="tag_name">
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
			<?php
			include_once("includes/footer.php")
				?>
		</div>
	</div>

	<?php
	include_once("includes/jsFooter.php")
		?>
</body>

</html>