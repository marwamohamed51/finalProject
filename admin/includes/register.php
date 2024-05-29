<?php
include_once('conn.php');
if (!empty($_POST['register'])) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        try {
            $name = $_POST['name'];
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $sql = 'INSERT INTO `users`(`name`, `username`, `email`, `password`) VALUES (?, ?, ?, ?)';
            $stmt = $conn->prepare($sql);
            $stmt->execute([$name, $username, $email, $password]);
            // echo "Inserted successfuly :)";
            header('location: users.php');
            die();

        } catch (PDOException $e) {
            echo $e->getMessage();

        }
    }
}
// echo "Inserted successfuly :)";
?>



<div id="register" class="animate form registration_form">
    <section class="login_content">
        <form action="" method="post" name="register">
            <h1>Create Account</h1>
            <div>
                <input type="text" class="form-control" placeholder="Fullname" required="" name="name" />
            </div>
            <div>
                <input type="text" class="form-control" placeholder="Username" required="" name="username" />
            </div>
            <div>
                <input type="email" class="form-control" placeholder="Email" required="" name="email" />
            </div>
            <div>
                <input type="password" class="form-control" placeholder="Password" required="" name="password" />
            </div>
            <div>
                <!-- <a class="btn btn-default submit" href="" name ="submit" value= "submit">Submit</a> -->
                <input type="submit" name="register" value="Submit" class="btn btn-defult py-8 fs-4 mb-2 rounded-2"
                    style="width: 100%; justify-content: flex-end; margin-left: -1px; font-size: 12px;">

            </div>

            <div class="clearfix"></div>

            <div class="separator">
                <p class="change_link">Already a member ?
                    <a href="#signin" class="to_register"> Log in </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                    <h1><i class="fa fa-file-image-o"></i></i> Images Admin</h1>
                    <p>©2016 All Rights Reserved. Images Admin is a Bootstrap 4 template. Privacy and Terms</p>
                </div>
            </div>
        </form>
    </section>
</div>