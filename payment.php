<div>
<?php 
		include("includes/db.php"); 
		
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
        
        //Suskaičiuoja paslaugų krepšelio sumą
                    $paslaug_kaina = array($pp_price['paslaug_kaina']);
        
                    $paslaug_pavad = $pp_price['paslaug_pavad'];
        
                    //Rodoma vieno produkto kaina
        
                    $values = array_sum($paslaug_kaina);
        
                    $total +=$values;
  }
 }

?>
<h2 align="center" style="padding:2px;">Apmokėjimas:</h2>

<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" >

<!-- Identify your business so that you can collect the payments. -->
<input type="hidden" name="business" value="mototest@gmail.com">

<!-- Specify a Buy Now button. -->
<input type="hidden" name="cmd" value="_xclick">

<!-- Specify details about the item that buyers will purchase. -->
<input type="hidden" name="item_name" value="<?php echo $paslaug_pavad; ?>">
<input type="hidden" name="item_number" value="<?php echo $pro_id; ?>">
<input type="hidden" name="amount" value="<?php echo $total; ?>">
<input type="hidden" name="currency_code" value="EUR">

<input type="hidden" name="return" value="http://www.motoserviceweb.com/paypal_success.php"/>
<input type="hidden" name="cancel_return" value="http://www.motoserviceweb.com/paypal_cancel.php"/>

<!-- Display the payment button. -->
<input type="image" name="submit" style="padding-left:75px;" border="0"
src="paypal_button.png" width="300px" height="55px"
alt="PayPal - The safer, easier way to pay online">

</form>

</div>