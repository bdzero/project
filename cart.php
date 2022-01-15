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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.0.0-beta.4/dist/css/bootstrap-material-design.min.css" integrity="sha384-R80DC0KVBO4GSTw+wZ5x2zn2pu4POSErBkf8/fSFhPXHxvHJydT0CSgAP2Yo2r4I" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css" />
        <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">
  </head>
  <body>
  <!--Navbar-->
  <nav class="navbar navbar-expand-lg navbar-dark indigo">
  
      <!-- Navbar brand -->
      <a class="navbar-brand" href="index.php">MotoService</a>
  
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
 <!-- Nukreipiamas į prisijungimo langą arba nutraukiama jau prisijungusio vartotojo sesija -->
              <li class="nav-item">
                  <a class="nav-link"><?php 
					if(!isset($_SESSION['customer_email'])){
					
					echo "<a href='checkout.php' style='padding:7px;color:white;size:6px;'>Prisijunkti</a>";
					
					}
					else {
					echo "<a href='logout.php' style='padding:7px;color:white;size:6px;'>Atsijunkti</a>";
					}
					
					
					
					?></a>
                  
              </li>
  
              <li class="nav-item">
              <a class="nav-link" href="customer/my_account.php">Mano paskyra</a>
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
  <table class="table table-hover">
  <thead>
    <tr>
      <th>Atšaukti</th>
      <th>Paslaugos</th>
      <th>Paslaugos kaina</th>
    </tr>
  </thead>
  <tbody>
  <?php 

    $total = 0;

    global $con;

    $ip = getIp();

    $sel_price = "select * from cart where ip_add='$ip'";

    $run_price = mysqli_query($con, $sel_price);

    while($p_price=mysqli_fetch_array($run_price)){

        $pro_id = $p_price['p_id'];

        $pro_price = "select * from paslaugos where paslaug_id='$pro_id'";

        $run_pro_price = mysqli_query($con, $pro_price);

        while($pp_price = mysqli_fetch_array($run_pro_price)){

            $paslaug_kaina = array($pp_price['paslaug_kaina']);

            $paslaug_pavad = $pp_price['paslaug_pavad'];

            //Rodoma vieno produkto kaina
            $single_price = $pp_price['paslaug_kaina'];

            $values = array_sum($paslaug_kaina);

            $total +=$values;
                    
                    ?>

    <tr>
                        <td><input type="checkbox" name="remove[]" value="<?php echo $pro_id;?>"/></td>
                        <td><?php echo $paslaug_pavad; ?></td>
                        <td><?php echo "€" . $single_price; ?></td>
    </tr>
    <?php } } ?>
    <tr align="right">
      <td><b>Iš viso:</b></td>
      <td><?php echo "€" . $total; ?></td>
      <td></td>
    </tr>
    <tr>
						<td><input type="submit" name="update_cart" value="Atnaujinti"/></td>
						<td></td>
						<td><button><a href="checkout.php" style="text-decoration:none; color:black;">Apmokėti</a></button></td>
					</tr>
  </tbody>
</table>
<?php 	

function updatecart(){
		
		$ip = getIp();
		
		if(isset($_POST['update_cart'])){
		
			foreach($_POST['remove'] as $remove_id){
			
			$delete_product = "delete from cart where p_id='$remove_id' AND ip_add='$ip'";
			
			$run_delete = mysqli_query($con, $delete_product); 
			
			if($run_delete){
			
			echo "<script>window.open('cart.php','_self')</script>";
			
			}
			
			}
		
		}
    }
	echo @$up_cart = updatecart();
	
	?>  
<!--Footer-->
<footer class="page-footer center-on-small-only stylish-color-dark">
    <!--/.Footer Links-->

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
<script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js" integrity="sha384-fA23ZRQ3G/J53mElWqVJEGJzU0sTs+SvzG8fXVWP+kJQ1lwFAOkcUOysnlKJC33U" crossorigin="anonymous"></script>
<script src="https://unpkg.com/bootstrap-material-design@4.0.0-beta.4/dist/js/bootstrap-material-design.js" integrity="sha384-3xciOSDAlaXneEmyOo0ME/2grfpqzhhTcM4cE32Ce9+8DW/04AGoTACzQpphYGYe" crossorigin="anonymous"></script>
<script>$(document).ready(function() { $('body').bootstrapMaterialDesign(); });</script>
  </body>
</html>