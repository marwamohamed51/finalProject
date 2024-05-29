<!DOCTYPE php>
<php lang="en">

  <head>
    <?php
    // include_once('includes/conn.php');
    $title = "Images Admin | Login/Register";
    include_once("includes/headlogin.php");
    ?>
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <?php
        include_once('includes/login.php');
        include_once('includes/register.php');
        ?>


      </div>
    </div>
  </body>
</php>