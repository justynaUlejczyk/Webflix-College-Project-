<?php
# Access session.
session_start() ;
# Redirect if not logged in.
if ( !isset( $_SESSION[ 'user_id' ] ) ) { require ( 'login_tools.php' ) ; load() ; } 
 # Connect to the database.
  require ('connect_db.php'); 

# Set page title and display header section.
$page_title = 'Home' ;



#redirect if admin
if (  $_SESSION[ 'user_id' ] == 1)
{include('admin.php');}


#not admin show user page
else {
	
	$q2="SELECT * FROM blocked WHERE user_id = {$_SESSION[ 'user_id' ] }" ;
	$r2 = mysqli_query( $link, $q2 ) ;
	 if ( mysqli_num_rows( $r2 ) >0 )
	{
		include ('login.html');
		echo '<h1>Sorry, your account was blocked <br> 
			please conact us on webflix@mail.co.uk </h1>
			<a href = "http://webdev.edinburghcollege.ac.uk/~HNDSOFTS2A6/webflix/logout.php">LOGOUT</a>';
	}
	else {	
include ( 'logout.html' ) ;


$q1 = "SELECT * FROM users WHERE user_id = {$_SESSION[ 'user_id' ] }" ;
$r1 = mysqli_query( $link, $q1 ) ;
echo '<div class="container-fluid">';
while ( $row = mysqli_fetch_array($r1, MYSQLI_ASSOC))
	{
		echo'<hr> <div class="container text-center">
 <div class ="row" >
	<div class="col align-self-center">
	<div class = "col-md-6 offset-md-3"  >
	<div class="card-header">
	<div class="text-center">
	<div class = "card-header">

<hr><h2>WELCOME  '.$row['first_name'].'</h2>' ;

 # Retrieve movies from 'account type' database table.
	$q = "SELECT * FROM type_account WHERE user_id = {$_SESSION[ 'user_id' ] }" ;
	$r = mysqli_query( $link, $q ) ;
if ( mysqli_num_rows( $r ) > 0 )
{
	while ( $row = mysqli_fetch_array($r, MYSQLI_ASSOC))
	{
	echo '
	Account type : '.$row['type'].'</h2>';
	echo'<br> <h3>You can now stream all movies and shows !!!</h3>
	<br> <a href = "show.php"> WATCH NOW</a>
	<br> Your subscription ends: '.$row['end'].'<br><a href= "cart_index.php">Extend Subscription </a>
	</div>
	</div>
	</div>
  </div>
</div>
	</div>';}
	
	include ('movie_body.php');
	include ('tv_body.php');
	
	
	
}
else
{
	echo'<h2>Account type: basic</h2><br><p>to watch shows click here <a href="cart_index.php">PREMIUM</a></p></div>';
	
}
}

	# Close database connection.
	mysqli_close( $link) ; 
	}
}

# Display footer section.
include ( 'footer.html' ) ;
?>

    
   