<?php
include("includes/db.php");

?>

<form method="post" action="">
  <div class="form-group">
    <label for="exampleInputEmail1">Prisijunkite norėdami užsisakyti paslaugas</label>
    <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Email" required>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1"></label>
    <input type="password" class="form-control" name="pass" placeholder="Password" required>
  </div>
  <div class="form-check">
  </div>
  <button type="submit" class="btn btn-primary" name="login">Prisijunkti</button>
  </form>
  <?php 
	if(isset($_POST['login'])){
	
		$c_email = $_POST['email'];
		$c_pass = $_POST['pass'];
		
		$sel_c = "select * from customers where customer_pass='$c_pass' AND customer_email='$c_email'";
		
		$run_c = mysqli_query($con, $sel_c);
		
    $check_customer = mysqli_num_rows($run_c); 
    
		//Tikrina ar toks vartotojas egzistuoja db
		if($check_customer==0){
		
		echo "<script>alert('Neteisingi vartotojo duomenys')</script>";
		exit();
		}
		$ip = getIp(); 
		
		$sel_cart = "select * from cart where ip_add='$ip'";
		
		$run_cart = mysqli_query($con, $sel_cart); 
		
		$check_cart = mysqli_num_rows($run_cart); 
		
		if($check_customer>0 AND $check_cart==0){
		
		$_SESSION['customer_email']=$c_email; 
		
		echo "<script>alert('Sveiki atvykę!')</script>";
		echo "<script>window.open('customer/my_account.php','_self')</script>";
		
		}
		else {
		$_SESSION['customer_email']=$c_email; 
		
		echo "<script>alert('Sveiki atvykę!')</script>";
		echo "<script>window.open('checkout.php','_self')</script>";
		
		
		}
	}
	
	
  ?>