<?php
include_once('includes/conn.php');
include_once('includes/loginChecker.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	try {
		$name = $_POST['name'];
		$username = $_POST['username'];
		$email = $_POST['email'];
		$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
		if (isset($_POST['active'])) {
			$active = $_POST['active'];
			$active = 1;
		} else {
			$active = 0;
		}
		$sql = 'INSERT INTO `users`(`name`, `username`, `email`, `password`, `active`) VALUES (?,?,?,?,?)';
		$stmt = $conn->prepare($sql);
		$stmt->execute([$name, $username, $email, $password, $active]);
		echo "Your data inserted successfuly :)";
		header('location: users.php');
	} catch (PDOException $e) {
		echo $e->getMessage();

	}
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
	<?php
	$header = "Manage Users";
	$title = "Images Admin | Add User";
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
								$title = "Add User";
								include_once("includes/xTitle.php");
								?>
								<div class="x_content">
									<br />
									<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"
										action="" method="post">

										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align"
												for="first-name">Full Name <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" id="first-name" required="required"
													class="form-control " name="name">
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align"
												for="user-name">Username <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" id="user-name" required="required"
													class="form-control" name="username">
											</div>
										</div>
										<div class="item form-group">
											<label for="email"
												class="col-form-label col-md-3 col-sm-3 label-align">Email <span
													class="required">*</span></label>
											<div class="col-md-6 col-sm-6 ">
												<input id="email" class="form-control" type="email" name="email"
													required="required">
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align">Active</label>
											<div class="checkbox">
												<label>
													<input type="checkbox" class="flat" id="active" name="active">
												</label>
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align"
												for="password">Password <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="password" id="password" name="password" required="required"
													class="form-control">
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