<?php
include_once('includes/loginChecker.php');
if (isset($_GET['id']) and $_GET['id'] > 0) {
    include_once('includes/conn.php');
    try {
        $id = $_GET['id'];
        $sql = 'SELECT * FROM `catalog` WHERE `tag_id` = ?';
        $stmt = $conn->prepare($sql);
        $stmt->execute([$id]);
        $result = $stmt->fetch();
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

    try {
        if (isset($result['tag_id'])) {
            $msg = "Selected Tag can not be removed :(";
            $alert = "alert-warning";
        } else {
            $id = $_GET['id'];
            $sql = 'DELETE FROM `tags` WHERE `id` = ?';
            $stmt = $conn->prepare($sql);
            $stmt->execute([$id]);
            $msg = "Deleted Successfuly :)";
            $alert = "alert-success";
        }
    } catch (PDOException $e) {
        $msg = "Error: " . $e->getMessage();
    }
} ?>
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

                            <div class="x_content">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="card-box table-responsive">
                                            <div class="x_panel">
                                                <?php
                                                $title = "Delete Tag";
                                                include_once("includes/xTitle.php")
                                                    ?>
                                                <div class='alert <?php echo $alert ?>'>
                                                    <?php echo $msg ?>
                                                </div>

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