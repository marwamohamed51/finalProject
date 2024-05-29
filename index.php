<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $current_page = basename($_SERVER['PHP_SELF']);
    $title = "Catalog-Z Home page";
    include_once("includes/head.php");
    ?>

</head>

<body>
    <?php
    include_once("includes/loader.php");
    include_once("includes/navbar.php");
    include_once("includes/search.php");
    include_once("includes/header.php");
    include_once("includes/container.php");
    include_once("includes/rowContainer.php");
    include_once("includes/footer.php");
    include_once("includes/jsFooter.php");
    ?>
</body>

</html>