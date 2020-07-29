<?php
session_start();
if (isset($_SESSION['id'])) {
}
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <!--jQuery library-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

  <!--Latest compiled and minified JavaScript-->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>E-Commerce</title>
  <link href="style.css" rel="stylesheet">
  <link rel="stylesheet" href="shopping-cart.css">
</head>
<body>
  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a href="index.php" class="navbar-brand" style="font-family: 'Lobster', cursive;" href="#">E-Commerce</a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
          <?php if (isset($_SESSION['id'])) {
            if (isset($_SESSION['cart'])) {
              $count  = count($_SESSION['cart']);

              echo  '<li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Cart (' . $count . ') </a></li>';
            } else {
              echo  '<li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Cart
                 
                 </a></li>';
            }
          } else {
            echo ' <li><a href="#" data-toggle="modal" data-target="#modalLoginForm"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>';
            echo '<li><a href="signup.php"><span class="glyphicon glyphicon-user"></span> Signup</a></li>';
          } ?>

          <li><a href="about.php"><span class="glyphicon glyphicon-tasks"></span> About</a></li>
          <li><a href="contact.php"><span class="glyphicon glyphicon-phone"></span> Contact</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- ----LOGIN FORM --------------- -->
  <div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header text-center">
          <h4 class="modal-title w-100 font-weight-bold">Login</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" action="login.php">
          <div class="modal-body mx-3">
            <div class="md-form mb-5">
              <label data-error="wrong" data-success="right" for="defaultForm-email">Your email</label>
              <input type="email" id="defaultForm-email" class="form-control validate" name="email" require>
            </div>
            <div class="md-form mb-4">
              <label data-error="wrong" data-success="right" for="defaultForm-pass">Your password</label>
              <input type="password" id="defaultForm-pass" class="form-control validate" name="pass" require>
            </div>
          </div>
          <div class="modal-footer d-flex justify-content-center">
            <button type="submit" class="btn btn-primary buttonbuy">Login</button>
          </div>
        </form>
        <a href="forget.php" style="color:red;padding:15px;">Forget Password</a>
      </div>
    </div>
  </div>