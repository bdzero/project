<!doctype html>
<?php
session_start();
include("functions/functions.php");
include("includes/db.php"); 

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
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
     <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons">
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
      <a class="navbar-brand" href="index.php">MotoService</a>
  
      <!-- Shopping cart button -->
      <a href="cart.php"><i class="fa fa-shopping-cart fa-lg" aria-hidden="true"></i></a>
      <?php cart(); ?>
       <!-- Collapse button -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
          aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
  
      <!-- Collapsible content -->
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
  
          <!-- Links -->
          <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                  <a class="nav-link" href="all_products.php">Visos paslaugos <span class="sr-only">(current)</span></a>
              </li>
              <div class="dropdown">
              <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Serviso paslaugos
              <span class="caret"></span></button>
              <ul class="dropdown-menu">
              <?php getCats(); ?>
            
              </ul>
            </div>
  
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
	      <input  type="submit" name="search" value="Paieška"> 
        </form>
      </div>
      <!-- Collapsible content -->
  </nav>
  <form class="form-horizontal" action="customer_register.php" method="post">
  <fieldset>
    <div id="legend">
      <legend class="">Naujos paskyros registracija</legend>
    </div>
    <div class="control-group">
      <!-- Username -->
      <label class="control-label"  for="c_name">Naudotojo vardas</label>
      <div class="controls">
        <input type="text" id="c_name" name="c_name" placeholder="Name" class="input-small" required>
        <p class="help-block"></p>
      </div>
    </div>
 
    <div class="control-group">
      <!-- E-mail -->
      <label class="control-label" for="c_email">El. Paštas</label>
      <div class="controls">
        <input type="email" id="c_email" name="c_email" placeholder="Email" class="input-small" required>
        <p class="help-block"></p>
      </div>
    </div>
 
    <div class="control-group">
      <!-- Password-->
      <label class="control-label" for="c_pass">Slaptažodis</label>
      <div class="controls">
        <input type="password" id="c_pass" name="c_pass" placeholder="Password" class="input-small" required>
        <p class="help-block"></p>
      </div>
    </div>
 
    <div class="control-group">
      <!-- Password -->
      <label class="control-label"  for="c_city">Miestas</label>
      <div class="controls">
        <input type="text" id="c_city" name="c_city" placeholder="City" class="input-small" required>
        <p class="help-block"></p>
      </div>
    </div>

    <div class="control-group">
      <!-- Password-->
      <label class="control-label" for="c_contact">Tel. numeris</label>
      <div class="controls">
        <input type="number" id="c_contact" name="c_contact" placeholder="Phone number" class="input-small" required>
        <p class="help-block"></p>
      </div>
    </div>
 
    <div class="control-group">
      <!-- Button -->
      <div class="controls">
        <button class="btn btn-success" name="register">Registruotis</button>
      </div>
    </div>
  </fieldset>
</form>
<!--Footer-->
<footer class="page-footer center-on-small-only stylish-color-dark">
    <!--/.Footer Links-->

    <hr>

    <!--Call to action-->
    <div class="call-to-action">
        <ul>
            <li>
            </li>
            <li><a href="customer_register.php" class="btn btn-danger btn-rounded">Registracija!</a></li>
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
            © 2017 Copyright: <a href="https://www.MDBootstrap.com"> Andrius Sudvajus </a>

        </div>
    </div>
    <!--/.Copyright-->

</footer>
<!--/.Footer-->
</div>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js" integrity="sha384-fA23ZRQ3G/J53mElWqVJEGJzU0sTs+SvzG8fXVWP+kJQ1lwFAOkcUOysnlKJC33U" crossorigin="anonymous"></script>
<script src="https://unpkg.com/bootstrap-material-design@4.0.0-beta.4/dist/js/bootstrap-material-design.js" integrity="sha384-3xciOSDAlaXneEmyOo0ME/2grfpqzhhTcM4cE32Ce9+8DW/04AGoTACzQpphYGYe" crossorigin="anonymous"></script>
<script>$(document).ready(function() { $('body').bootstrapMaterialDesign(); });</script>
  </body>
</html>

<?php 
	if(isset($_POST['register'])){
	
		
		$ip = getIp();
		
		$c_name = $_POST['c_name'];
		$c_email = $_POST['c_email'];
		$c_pass = $_POST['c_pass'];
		$c_city = $_POST['c_city'];
		$c_contact = $_POST['c_contact'];
		//$c_address = $_POST['c_address'];
	
		
		//move_uploaded_file($c_image_tmp,"customer/customer_images/$c_image");
		
        $insert_c = "insert into customers (customer_ip,customer_name,customer_email,customer_pass,customer_city,customer_contact) values ('$ip','$c_name','$c_email','$c_pass','$c_city','$c_contact')";
        
	
		$run_c = mysqli_query($con, $insert_c); 
		
		$sel_cart = "select * from cart where ip_add='$ip'";
		
		$run_cart = mysqli_query($con, $sel_cart); 
		
		$check_cart = mysqli_num_rows($run_cart); 
		
		if($check_cart==0){
		
		$_SESSION['customer_email']=$c_email; 
		
		echo "<script>alert('Account has been created successfully, Thanks!')</script>";
		echo "<script>window.open('customer/my_account.php','_self')</script>";
		
		}
		else {
		
		$_SESSION['customer_email']=$c_email; 
		
		echo "<script>alert('Account has been created successfully, Thanks!')</script>";
		
	    echo "<script>window.open('checkout.php','_self')</script>";
		
		
		}
	}





?>