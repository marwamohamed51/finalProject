<?php
include_once('includes/conn.php');
include_once('includes/loginChecker.php');
try {
  $sql = 'SELECT * FROM users';
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $result = $stmt->fetchAll();
} catch (PDOException $e) {
  echo $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  $header = "Manage Users";
  $title = "Users";
  include_once("includes/head2.php")
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
                $title = "List of Users";
                include_once("includes/xTitle.php")
                  ?>
                <div class="x_content">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="card-box table-responsive">
                        <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                          <thead>
                            <tr>
                              <th>Registration Date</th>
                              <th>Name</th>
                              <th>Username</th>
                              <th>Email</th>
                              <th>Active</th>
                              <th>Edit</th>
                            </tr>
                          </thead>

                          <tbody>
                            <?php
                            foreach ($result as $row) {
                              $id = $row['id'];
                              $name = $row['name'];
                              $username = $row['username'];
                              $email = $row['email'];
                              $created_at = date("d M Y", strtotime($row['created_at']));
                              if ($row['active'] == 1) {
                                $active = "Yes";
                              } else {
                                $active = "No";
                              }
                              ?>
                              <tr>
                                <td>
                                  <?php echo $created_at; ?>
                                </td>
                                <td>
                                  <?php echo $name; ?>
                                </td>
                                <td>
                                  <?php echo $username; ?>
                                </td>
                                <td>
                                  <?php echo $email; ?>
                                </td>
                                <td>
                                  <?php echo $active; ?>
                                </td>
                                <td><a href="editUser.php?id=<?php echo $id; ?>"><img src="./images/edit.png" alt="Edit">
                                </td>
                              </tr>
                            <?php } ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
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
      ?>
    </div>
  </div>

  <?php
  include_once("includes/jsFooter2.php")
    ?>

</body>

</html>