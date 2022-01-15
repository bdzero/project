<!doctype html>
<?php

include("functions/functions.php");

?>
<html lang="en">
  <head>
    <title>MotoService</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scaleable=no" />

    <!-- Bootstrap CSS -->
     <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.0.0-beta.4/dist/css/bootstrap-material-design.min.css" integrity="sha384-R80DC0KVBO4GSTw+wZ5x2zn2pu4POSErBkf8/fSFhPXHxvHJydT0CSgAP2Yo2r4I" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css" />
        <!-- Material Design Bootstrap -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link href="css/mdb.min.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
  </head>
  <body>
  <!--Navbar-->
  <nav class="navbar navbar-expand-lg navbar-dark indigo">
  
      <!-- Navbar brand -->
      <a class="navbar-brand" href="./">MotoService</a>
  
      <!-- Shopping cart button -->
      <a href="cart.php"><i class="fa fa-shopping-cart fa-lg" aria-hidden="true"></i></a>
       <!-- Collapse button -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
          aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
  
      <!-- Collapsible content -->
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
  
          <!-- Links -->
          <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                  <a class="nav-link" href="index.php">Pagrindinis <span class="sr-only">(current)</span></a>
              </li>
              <div class="dropdown">
              <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Serviso paslaugos
              <span class="caret"></span></button>
              <ul class="dropdown-menu">
                <?php getCats(); ?>
              </ul>
            </div>
              <li class="nav-item">
                  <a class="nav-link" href="customer/my_account.php">Mano paskyra</a>
              </li>
  
              <!-- Dropdown -->
            <!-- Nukreipiamas į prisijungimo langą arba nutraukiama jau prisijungusio vartotojo sesija -->
            <li class="nav-item">
            <a class="nav-link">
                <?php 
              if(!isset($_SESSION['customer_email'])){
              
              echo "<a href='checkout.php' style='padding:7px;color:white;size:6px;'>PRISIJUNKTI</a>";
              
              }
              else {
              echo "<a href='logout.php' style='padding:7px;color:white;size:6px;'>ATSIJUNKI</a>";
              }
              
              
              
              ?></a>
            
        </li>
          </ul>
          <!-- Links -->
  
          <!-- Search form -->
          <form  method="get" action="results.php"  id="searchform"> 
          <input  type="text" name="user_query"> 
	      <input  type="submit" name="search" value="Search"> 
	    </form>
      </div>
      <!-- Collapsible content -->
  </nav>
  <?php 
      if(isset($_GET['pro_id'])){

       $product_id = $_GET['pro_id'];
        
      $get_pro = "select * from paslaugos where paslaug_id='$product_id'";
  
      $run_pro = mysqli_query($con, $get_pro);
  
      while($row_pro=mysqli_fetch_array($run_pro)){
  
          $pro_id = $row_pro['paslaug_id'];
          $pro_pavad = $row_pro['paslaug_pavad'];
          $pro_kaina = $row_pro['paslaug_kaina'];
          $pro_apr = $row_pro['paslaug_apr'];
          $pro_pav = $row_pro['paslaug_pav'];
  
          //Produkto kortelės atvaizdavimo komanda
          echo "
          
          <div class='card card-cascade narrower'>
          
              <div class='view overlay hm-white-slight'>
                  <img src='admin_area/product_images/$pro_pav' class='img-fluid' alt=''>
                  <a>
                      <div class='mask'></div>
                  </a>
              </div>
              
                  <!--Card content-->
                  <div class='card-body'>
  
                  <h4>$pro_pavad</a></h4>
  
                      <h6 class='card-title'>$pro_kaina €</h6>
                      <i class='fa fa-motorcycle fa-lg'></i>
                      <p class='card-text'>$pro_apr</p>
                      <a href='index.php?pro_id=$pro_id'class='btn btn-unique'>Užsisakyti</a>
                  </div>
          
          ";
  
  
      }
    }
  
  ?>
<!--Footer-->
<footer class="page-footer center-on-small-only stylish-color-dark">
    <!--/.Footer Links-->

    <hr>

    <!--Call to action-->
    <div class="call-to-action">
        <ul>
            <li>
                <h5 class="mb-1">Register for free</h5>
            </li>
            <li><a href="" class="btn btn-danger btn-rounded">Sign up!</a></li>
        </ul>
    </div>
    <!--/.Call to action-->

    <hr>

    <!--Social buttons-->
    <div class="social-section text-center">
        <ul>

        <li><a href="https://facebook.com" class="btn-floating btn-sm btn-fb"><i class="fa fa-facebook"> </i></a></li>
        <li><a href="https://twitter.com" class="btn-floating btn-sm btn-tw"><i class="fa fa-twitter"> </i></a></li>
        <li><a href="https://plus.google.com" class="btn-floating btn-sm btn-gplus"><i class="fa fa-google-plus"> </i></a></li>

        </ul>
    </div>
    <!--/.Social buttons-->

    <!--Copyright-->
    <div class="footer-copyright">
        <div class="container-fluid">
            © 2017 Copyright:  Andrius Sudvajus 

        </div>
    </div>
    <!--/.Copyright-->

</footer>
<!--/.Footer-->
</div>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js" integrity="sha384-fA23ZRQ3G/J53mElWqVJEGJzU0sTs+SvzG8fXVWP+kJQ1lwFAOkcUOysnlKJC33U" crossorigin="anonymous"></script>
<script src="https://unpkg.com/bootstrap-material-design@4.0.0-beta.4/dist/js/bootstrap-material-design.js" integrity="sha384-3xciOSDAlaXneEmyOo0ME/2grfpqzhhTcM4cE32Ce9+8DW/04AGoTACzQpphYGYe" crossorigin="anonymous"></script>
<script>$(document).ready(function() { $('body').bootstrapMaterialDesign(); });</script>
  </body>
</html>