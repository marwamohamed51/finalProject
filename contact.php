<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $current_page = basename($_SERVER['PHP_SELF']);
    $title = "Catalog-Z Contact page";
    include_once("includes/head.php");
    ?>
</head>

<body>
    <?php
    include_once("includes/loader.php");
    include_once("includes/navbar.php");
    include_once("includes/header2.php");
    include_once("includes/contactContent.php");
    include_once("includes/footer.php");
    include_once("includes/jsFooter.php");
    ?>
</body>

</html>