<?php
include_once('includes/conn.php');
include_once('includes/loginChecker.php');
try {
  $sql = 'SELECT catalog.id, catalog.date, catalog.title, catalog.active, tags.tag_name FROM catalog INNER JOIN tags on tags.id = catalog.tag_id';
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $catalog_result = $stmt->fetchAll();
} catch (PDOException $e) {
  echo $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  $header = "Manage Photos";
  $title = "Photos";
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
          include_once("includes/header.php");
          ?>

          <div class="clearfix"></div>

          <div class="cta$catalog">
            <div class="col-md-12 col-sm-12 ">
              <div class="x_panel">
                <?php
                $title = "List of Photos";
                include_once("includes/xTitle.php");
                ?>
                <div class="x_content">
                  <div class="cta$catalog">
                    <div class="col-sm-12">
                      <div class="card-box table-responsive">
                        <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                          <thead>
                            <tr>
                              <th>Photo Date</th>
                              <th>Title</th>
                              <th>Active</th>
                              <th>Edit</th>
                              <th>Delete</th>
                            </tr>
                          </thead>

                          <tbody>
                            <?php
                            foreach ($catalog_result as $catalog) {
                              $id = $catalog['id'];
                              $date = date("d M Y", strtotime($catalog['date']));
                              $title = $catalog['title'];
                              if ($catalog['active'] == 1) {
                                $active = "Yes";
                              } else {
                                $active = "No";
                              }

                              ?>
                              <tr>
                                <td>
                                  <?php echo $date ?>
                                </td>
                                <td>
                                  <?php echo $title ?>
                                </td>
                                <td>
                                  <?php echo $active ?>
                                </td>
                                <td><a href="editPhoto.php?id=<?php echo $id; ?>"><img src="./images/edit.png" alt="Edit">
                                <td><a href="deletePhoto.php?id=<?php echo $id; ?>" onclick="return confirm('Are you sure you want to delete?')"><img src="./images/delete.png" alt="Delete"></td>
                              </tr>

                            <?php
                            }
                            ?>
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