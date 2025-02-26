<?php 
# Access session.
session_start() ; 
# Redirect if not logged in.
if ( !isset( $_SESSION[ 'user_id' ] ) ) { require ( 'login_tools.php' ) ; load() ; }
include ('logout.html');
if ( isset( $_GET['id'] ) ) $id = $_GET['id'] ;
echo'<hr> <div class="container text-center">
 <div class ="row" >
	<div class="col align-self-center">
	<div class = "col-md-6 offset-md-3"  >
	<div class="card-header">
	<div class="text-center">
	<div class = "card-header">

<hr><h2>Thank you  '.$row['first_name'].'</h2>

<br> <h3>You can now stream all movies and shows !!!</h3>
	<br> <a href = "show.php"> WATCH NOW</a>
	</div>
	</div>
	</div>
  </div>
</div>
	</div>';



require ('connect_db.php');

$date=date_create(date("Y-m-d"));
date_modify($date,"+1 year");
$nextyear =  date_format($date,"Y-m-d");
$p ='premium';


# Check if email address already registered.
    $q = "SELECT * FROM type_account WHERE user_id={$_SESSION['user_id']}" ;
    $r = @mysqli_query ( $link, $q ) ;
    if ( mysqli_num_rows( $r ) != 0 ) 
	{$q = "UPDATE  type_account SET end ='$nextyear' WHERE user_id={$_SESSION['user_id']}" ; ;
$r = @mysqli_query ( $link, $q ) ;}



else
{ 
 # buying premium account.
    $q = "INSERT INTO type_account(user_id, type, date, end) 
VALUES (". $_SESSION['user_id'].",'$p', Now(), '$nextyear') ";
$r = @mysqli_query ( $link, $q ) ;

}

    # Remove booking items.  
  $_SESSION['shopping_cart'] = NULL ;

  mysqli_close( $link ) ; 

include('footer.html');
?>
 