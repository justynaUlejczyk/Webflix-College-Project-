<?php
session_start();
# Redirect if not logged in.
if ( !isset( $_SESSION[ 'user_id' ] ) ) { require ( 'login_tools.php' ) ; load() ; }
# Open database connection.
require ( 'connect_db.php' ) ;
include ('logout.html');
$status="";
if (isset($_POST['action']) && $_POST['action']=="remove"){
if(!empty($_SESSION["shopping_cart"])) {
    foreach($_SESSION["shopping_cart"] as $key => $value) {
      if($_POST["code"] == $key){
      unset($_SESSION["shopping_cart"][$key]);
      $status = "<div class='box' style='color:red;'>
      Product is removed from your cart!</div>";
      }
      if(empty($_SESSION["shopping_cart"]))
      unset($_SESSION["shopping_cart"]);
      }		
}
}

if (isset($_POST['action']) && $_POST['action']=="change"){
  foreach($_SESSION["shopping_cart"] as &$value){
    if($value['code'] === $_POST["code"]){
        $value['quantity'] = $_POST["quantity"];
        break; // Stop the loop after we've found the product
    }
}
  	
}
?>
<div class="cart">
<?php
if(isset($_SESSION["shopping_cart"])){
    $total_price = 0;
?>	

<div class="container">
<div class="middlea">
<h1 class="display-4 text-muted">Your Cart</h1>
<hr class="bg-info">
<table class="table">
<tbody>
<tr>
</div><span style="color:white!important">
<div class="table-responsive">
<table class="table">
<thead class="thead-dark">
<tr>
<th scope="col">Package Name</th>
<th scope="col">Price</th>
<th scope="col">Total</th>
</tr>
</thead >
</span>
<tbody>


<tr>
<?php		
foreach ($_SESSION["shopping_cart"] as $product){
?>

<td>
<?php echo $product["name"]; ?><br />

<form method='post' action=''>
<input type='hidden' name='code' value="<?php echo $product["code"]; ?>" />
<input type='hidden' name='action' value="remove" />
<button type='submit' class='btn btn-dark'>Remove Item</button>
</form>
</td>

<form method='post' action='' >
<input type='hidden' name='code' value="<?php echo $product["code"]; ?>" />
<input type='hidden' name='action' value="change" />
</form>
<td><?php echo "£".$product["price"]; ?></td>
<td><?php echo "£".$product["price"]*$product["quantity"]; ?></td>
</tr>
</div></div>
<?php
$total_price += ($product["price"]*$product["quantity"]);

}


?>
<tr>
<td colspan="5" align="right">
<strong>TOTAL: <?php echo "£".$total_price; ?></strong>
</td>
</tr>
</tbody>
</table>	
	
 


<div id="paypal-button-container"></div>
<script src="https://www.paypalobjects.com/api/checkout.js"></script>
<script>
// Render the PayPal button
paypal.Button.render({
// Set your environment
env: 'sandbox', // sandbox | production

// Specify the style of the button
style: {
layout: 'vertical', // horizontal | vertical
size: 'medium', // medium | large | responsive
shape: 'rect', // pill | rect
color: 'gold' // gold | blue | silver | white | black
},

funding: {
allowed: [
paypal.FUNDING.CARD,
paypal.FUNDING.CREDIT
],
disallowed: []
},

// Enable Pay Now checkout flow (optional)
commit: true,

// PayPal Client IDs - replace with your own

client: {
sandbox: 'AeClmmvlaMBi5VLuTM5qkVY6C9s8fUf5lK_Py4Pa4kfaD9SL4blXrKgBPlSsqa5nKtIRoVh3CyZt8CeX',
production: '<insert production client id>'
},

payment: function (data, actions) {
return actions.payment.create({
payment: {
transactions: [
{
amount: {
total: '99.99',
currency: 'GBP'
}
}
]
}
});
},

onAuthorize: function (data, actions) {
return actions.payment.execute()
.then(function () {
window.alert('Payment Complete!');window.location.href = "checkout.php";
});
}
}, '#paypal-button-container');
</script>

<!--John-->
<!--First name:-->
<!--Doe-->
<!--Last name:-->
<!---->
<!--sb-bt64g25763684@business.example.com-->
<!--Email ID:-->
<!---->
<!--S{<2kK}j-->
<!--password-->
 
 <?php
}else{
	echo'<hr> <div class="container text-center">
 <div class ="row" >
	<div class="col align-self-center">
	<div class = "col-md-6 offset-md-3"  >
	<div class="card-header">
	<div class="text-center">
	<div class = "card-header">
	<h3>Your cart is empty!</h3>
	<br><a href = "cart_index.php"> CHECK OUR OFFER</a>';

	}
?>
</div></div></div></div></div></div></div>

<div style="clear:both;"></div>

<div class="message_box" style="margin:10px 0px;">



<?php echo $status; 
include ( 'footer.html' ) ;
?>
</div>
