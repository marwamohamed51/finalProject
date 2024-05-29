<?php
include_once('conn.php');
session_start();
if (isset($_SESSION['login']) and $_SESSION['login'] == true) {
  header('location: users.php');
  die();
}
if (!empty($_POST['login'])) {
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
      $username = $_POST['username'];
      $password = $_POST['password'];
      $active = 1;
      $sql = 'SELECT `name`, `password` FROM `users` WHERE `username`=? AND`active`=?';
      $stmt = $conn->prepare($sql);
      $stmt->execute([$username, $active]);
      if ($stmt->rowCount()) {
        $result = $stmt->fetch();
        $verify = password_verify($password, $result['password']);
        $name = $result['name'];

        // Print the result depending if they match 
        if ($verify) {
          $_SESSION['login'] = true;
          $_SESSION['name'] = $name;
          $_SESSION['id'] = $id;

          header('location: users.php');
          die();
          // echo 'Password Verified :)';
        } else {
          echo 'Incorrect Password!';
        }
      } else {
        echo "Username incorrect or email not active :(";
      }

    } catch (PDOException $e) {
      echo $e->getMessage();

    }
  }
}
?>
<div class="animate form login_form">
  <section class="login_content">
    <form action="" method="POST" name="login">
      <h1>Login Form</h1>
      <div>
        <input type="text" class="form-control" placeholder="Username" required="" name="username" />
      </div>
      <div>
        <input type="password" class="form-control" placeholder="Password" required="" name="password" />
      </div>
      <div>
        <!-- <a class="btn btn-default submit" href="">Log in</a> -->
        <input type="submit" name="login" value="Log in" class="btn btn-defult py-8 fs-4 mb-2 rounded-2"
          style=" justify-content: flex-end; font-size: 12px;">
        <a class="reset_pass" href="#">Lost your password?</a>
      </div>

      <div class="clearfix"></div>

      <div class="separator">
        <p class="change_link">New to site?
          <a href="#signup" class="to_register"> Create Account </a>
        </p>

        <div class="clearfix"></div>
        <br />

        <div>
          <h1><i class="fa fa-file-image-o"></i></i>Images Admin</h1>
          <p>©2016 All Rights Reserved. Images Admin is a Bootstrap 4 template. Privacy and Terms</p>
        </div>
      </div>
    </form>
  </section>
</div>