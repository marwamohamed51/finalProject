<?php
include_once('includes/conn.php');
include_once('includes/loginChecker.php');
try {
  $sql = 'SELECT * FROM `tags`';
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $result2 = $stmt->fetchAll();
} catch (PDOException $e) {
  echo $e->getMessage();
}

// if user insert duplicated tag
if (isset($_SESSION['error_message'])) {
    echo '<div class="alert alert-danger">' . $_SESSION['error_message'] . '</div>';
    unset($_SESSION['error_message']); // Clear the error message from session
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  $header = "Manage Tags";
  $title = "Tags";
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
                $title = "List of Tags";
                include_once("includes/xTitle.php")
                  ?>
                <div class="x_content">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="card-box table-responsive">
                        <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                          <thead>
                            <tr>
                              <th>Tag Name</th>
                              <th>Edit</th>
                              <th>Delete</th>
                            </tr>
                          </thead>


                          <tbody>
                          <?php
                            foreach ($result2 as $row) {
                              $id = $row['id'];
                              $tag_name = $row['tag_name'];
                              ?>
                            <tr>
                              <td><?php echo $tag_name ?></td>
                            
                              <td><a href="editCategory.php?id=<?php echo $id; ?>"><img src="./images/edit.png" alt="Edit"></td>
                              <td><a href="deleteCategory.php?id=<?php echo $id; ?>" onclick="return confirm('Are you sure you want to delete?')"><img src="./images/delete.png" alt="Delete"></td>
                            </tr>
                            <?php
                            }
                            ?>
                            <!-- <tr>
                              <td>Category</td>
                              <td><img src="./images/edit.png" alt="Edit"></td>
                              <td><img src="./images/delete.png" alt="Delete"></td>
                            </tr> -->

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

    </div>
  </div>

  <?php
  include_once("includes/jsFooter2.php")
    ?>

</body>

</html>