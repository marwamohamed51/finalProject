<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $current_page = basename($_SERVER['PHP_SELF']);
    $title = "Catalog-Z Videos";
    $header = "Latest Photos";
    include_once("includes/head.php");
    ?>

</head>

<body>
    <?php
    include_once("includes/loader.php");
    include_once("includes/navbar.php");
    include_once("includes/search.php");
    include_once("includes/video.php");
    include_once("includes/rowContainer.php");
    include_once("includes/footer.php");
    include_once("includes/jsFooter.php");
    ?>
</body>

</html>