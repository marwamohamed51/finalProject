<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  $header = "Manage Meetings";
  $title = "Meetings";
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
                $title = "List of Meetings";
                include_once("includes/xTitle.php")
                  ?>
                <div class="x_content">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="card-box table-responsive">
                        <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                          <thead>
                            <tr>
                              <th>Meeting Date</th>
                              <th>Title</th>
                              <th>Active</th>
                              <th>Edit</th>
                              <th>Delete</th>
                            </tr>
                          </thead>


                          <tbody>
                            <tr>
                              <td>1 Jan 2023</td>
                              <td>Title</td>
                              <td>Yes</td>
                              <td><img src="./images/edit.png" alt="Edit"></td>
                              <td><img src="./images/delete.png" alt="Delete"></td>
                            </tr>
                            <tr>
                              <td>1 Jan 2023</td>
                              <td>Title</td>
                              <td>Yes</td>
                              <td><img src="./images/edit.png" alt="Edit"></td>
                              <td><img src="./images/delete.png" alt="Delete"></td>
                            </tr>
                            <tr>
                              <td>1 Jan 2023</td>
                              <td>Title</td>
                              <td>Yes</td>
                              <td><img src="./images/edit.png" alt="Edit"></td>
                              <td><img src="./images/delete.png" alt="Delete"></td>
                            </tr>

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