<?php
// include_once('conn.php');
// // session_start();
// include_once('loginChecker.php');
// // $_SESSION['login'] = false;
// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
// if(isset($_SESSION['name'])){
// 	$user_check = $_SESSION['name'];
// 	$sql = 'SELECT `name` FROM `users` WHERE `id` = ?';
// 	$stmt = $conn->prepare($sql);
// 	$stmt->execute([$id]);
// 	$result = $stmt->fetch();
// 	$login_user = $result['name'];
// 	// if(!empty($login_user)){
// 	// 	$_SESSION['login'] = true;
// // }
// 	}
// }

?>
<div class="col-md-3 left_col">
	<div class="left_col scroll-view">
		<div class="navbar nav_title" style="border: 0;">
			<a href="index.php" class="site_title"><i class="fa fa-file-image-o"></i>
				<span>Images Admin</span></a>
		</div>

		<div class="clearfix"></div>

		<!-- menu profile quick info -->
		<div class="profile clearfix">
			<div class="profile_pic">
				<img src="images/img.jpg" alt="..." class="img-circle profile_img">
			</div>
			<div class="profile_info">
				<span>Welcome,</span>
				<h2><?php echo $_SESSION['name'] ?></h2>
				<!-- <h2>username</h2> -->
			</div>
		</div>
		<!-- /menu profile quick info -->

		<br />

		<!-- sidebar menu -->
		<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
			<div class="menu_section">
				<h3>General</h3>
				<ul class="nav side-menu">
					<li><a><i class="fa fa-users"></i> Users <span class="fa fa-chevron-down"></span></a>
						<ul class="nav child_menu">
							<li><a href="users.php">Users List</a></li>
							<li><a href="addUser.php">Add User</a></li>
						</ul>
					</li>
					<li><a><i class="fa fa-edit"></i> Tags <span class="fa fa-chevron-down"></span></a>
						<ul class="nav child_menu">
							<li><a href="addCategory.php">Add Tag</a></li>
							<li><a href="categories.php">Tags List</a></li>
						</ul>
					</li>
					<li><a><i class="fa fa-desktop"></i> Photos <span class="fa fa-chevron-down"></span></a>
						<ul class="nav child_menu">
							<li><a href="addPhoto.php">Add Photo</a></li>
							<li><a href="photos.php">Photos List</a></li>
						</ul>
					</li>
				</ul>
			</div>

		</div>
		<!-- /sidebar menu -->

		<!-- /menu footer buttons -->
		<div class="sidebar-footer hidden-small">
			<a data-toggle="tooltip" data-placement="top" title="Settings">
				<span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
			</a>
			<a data-toggle="tooltip" data-placement="top" title="FullScreen">
				<span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
			</a>
			<a data-toggle="tooltip" data-placement="top" title="Lock">
				<span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
			</a>
			<a data-toggle="tooltip" data-placement="top" title="Logout" href="login.php">
				<span class="glyphicon glyphicon-off" aria-hidden="true"></span>
			</a>
		</div>
		<!-- /menu footer buttons -->
	</div>
</div>
