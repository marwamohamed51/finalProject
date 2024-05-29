<?php
include_once('includes/conn.php');
include_once('includes/loginChecker.php');
if (isset($_GET['id'])) {
	$id = $_GET['id'];

	if ($_SERVER['REQUEST_METHOD'] === "POST") {
		try {
			$name = $_POST['name'];
			$username = $_POST['username'];
			$email = $_POST['email'];
			if (empty($_POST['password'])) {
				$password = $_POST['oldPassword'];
			} else {
				$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
			}
			$active = isset($_POST['active']);

			$sql = "UPDATE `users` SET `name`=?,`username`=?,`email`=?,`password`=?,`active`=? WHERE `id` =?";
			$stmt = $conn->prepare($sql);
			$stmt->execute([$name, $username, $email, $password, $active, $id]);
			header('location: users.php');
			die;
		} catch (PDOException $e) {
			echo $e->getMessage();

		}
	}

	try {
		$sql = 'SELECT * FROM `users` WHERE `id` = ?';
		$stmt = $conn->prepare($sql);
		$stmt->execute([$id]);
		$result = $stmt->fetch();
		$name = $result['name'];
		$username = $result['username'];
		$password = $result['password'];
		$email = $result['email'];
		$active = $result['active'] ? "checked" : "";
	} catch (PDOException $e) {
		echo $e->getMessage();
	}
}
?>
<!DOCTYPE html>
<php lang="en">

	<head>
		<?php
		$header = "Manage Users";
		$title = "Images Admin | Edit User";
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
									$title = "Edit User";
									include_once("includes/xTitle.php");
									?>
									<div class="x_content">
										<br />
										<form id="demo-form2" data-parsley-validate
											class="form-horizontal form-label-left" action="" method="post">

											<div class="item form-group">
												<label class="col-form-label col-md-3 col-sm-3 label-align"
													for="first-name">Full Name <span class="required">*</span>
												</label>
												<div class="col-md-6 col-sm-6 ">
													<input type="text" id="first-name" required="required"
														class="form-control " name="name" value="<?php echo $name; ?>">
												</div>
											</div>
											<div class="item form-group">
												<label class="col-form-label col-md-3 col-sm-3 label-align"
													for="user-name">Username <span class="required">*</span>
												</label>
												<div class="col-md-6 col-sm-6 ">
													<input type="text" id="user-name" name="username"
														required="required" class="form-control"
														value="<?php echo $username; ?>">
												</div>
											</div>
											<div class="item form-group">
												<label for="email"
													class="col-form-label col-md-3 col-sm-3 label-align">Email <span
														class="required">*</span></label>
												<div class="col-md-6 col-sm-6 ">
													<input id="email" class="form-control" type="email" name="email"
														required="required" value="<?php echo $email; ?>">
												</div>
											</div>
											<div class="item form-group">
												<label
													class="col-form-label col-md-3 col-sm-3 label-align">Active</label>
												<div class="checkbox">
													<label>
														<input type="checkbox" class="flat" id="active" name="active"
															<?php echo $active; ?>>
													</label>
												</div>
											</div>
											<div class="item form-group">
												<label class="col-form-label col-md-3 col-sm-3 label-align"
													for="password">Password <span class="required">*</span>
												</label>
												<div class="col-md-6 col-sm-6 ">
													<input type="password" id="password" name="password"
														 class="form-control">
												</div>
											</div>
											<div class="ln_solid"></div>
											<div class="item form-group">
												<div class="col-md-6 col-sm-6 offset-md-3">
													<input type="hidden" name="oldPassword"
														value="<?php echo $password; ?>">
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
				<?php
				include_once("includes/footer.php")
					?>
			</div>
		</div>
		<?php
		include_once("includes/jsFooter.php")
			?>

	</body>
</php>