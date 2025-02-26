<?php
session_start();

# Redirect if not logged in.
if ( !isset( $_SESSION[ 'user_id' ] ) ) { require ( 'login_tools.php' ) ; load() ; }
# Open database connection.
require ( 'connect_db.php' ) ;
include ('logout.html');
$status="";
echo'<hr> <div class="container text-center">
 <div class ="row" >
	<div class="col align-self-center">
	<div class = "col-md-6 offset-md-3"  >
	<div class="card-header">
	<div class="text-center">
	<div class = "card-header">';
if (isset($_POST['code']) && $_POST['code']!=""){
$code = $_POST['code'];
$q = "SELECT * FROM `prices`  WHERE `id`='$code'";
$result = mysqli_query($link, $q);
$row = mysqli_fetch_assoc($result);

$name = $row['type'];
$code = $row['id'];
$price = $row['price'];
$image = $row['image'];


$cartArray = array(
	$code=>array(
	'name'=>$name,
	'code'=>$code,
	'price'=>$price,
	'image'=>$image,
	'quantity'=>1)
);


if(empty($_SESSION["shopping_cart"])) {
    $_SESSION["shopping_cart"] = $cartArray;
    $status = "<div class='box'>Product is added to your cart!</div>";
}

else{
    $array_keys = array_keys($_SESSION["shopping_cart"]);
    if(in_array($code,$array_keys)) {
	$status = "<div class='box' style='color:red;'>
	Product is already added to your cart!</div>";	
    } else {
    $_SESSION["shopping_cart"] = array_merge(
    $_SESSION["shopping_cart"],
    $cartArray
    );
    $status = "<div class='box'>Product is added to your cart!</div>";
	}

	}
}
?>

<?php
if(!empty($_SESSION["shopping_cart"])) {
$cart_count = count(array_keys($_SESSION["shopping_cart"]));
?>

<div class="cart_div">
<div class="text-center">
 <span class="badge"><a href="cart.php"><img src="img/cart.png" /><span class="badge">
<?php echo $cart_count; ?></span></a></span>
</div></div>
<?php
}
?>
<br>

<?php
$result = mysqli_query($link,"SELECT * FROM `prices`");
 
while($row = mysqli_fetch_assoc($result)){
    echo "<br>
	<div class = 'container'>
<div class='col align-self-center'>
    <form method='post' action=''>
    <input type='hidden' name='code' value=".$row['id']." />
	<hr>
    <div class='image'><img src='".$row['image']."' /></div>
	<hr>
    <div class='name'>".$row['type']." Account <br> Allow you to access all movies and tv shows on WEBFLIX!
	<br>Amazing value<br>
	Only now annual subscription:</div>
	<hr>
    <div class='price'>£".$row['price']."</div>
	<hr>
    <button type='submit' class='btn btn-dark'>Buy Now</button>
    </form></div></div></div>
    ";
        }
	include ( 'footer.html' );	
mysqli_close($link);

?>
</div>
</div>

<div style="clear:both;"></div>

<div class="message_box" style="margin:10px 0px;">
<?php echo $status; 
?>
</div>

