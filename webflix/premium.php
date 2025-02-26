<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<!-- Load icon library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<title>WEBFLIX</title>

  </head>
  <style>
  
body {
  background-image: url("img/premium.jpg");

}
</style>
<body>

<?php
# Access session.
session_start() ; 
include('logout.html'); 
# Redirect if not logged in.
if ( !isset( $_SESSION[ 'user_id' ] ) ) { require ( 'login_tools.php' ) ; load() ; }
# Open database connection.
if ( isset( $_GET['id'] ) ) $id = $_GET['id'] ;
require ( 'connect_db.php' ) ;

$q1 = "SELECT * FROM users WHERE user_id = {$_SESSION[ 'user_id' ] }" ;
$r1 = mysqli_query( $link, $q1 ) ;
echo '<div class="container">
  <div class="row">
      <div class="col-sm">
	<div class="card bg-light mb-3" style="background-color:#1F3140!important";>
	    <div class="card-header"> ';
while ( $row = mysqli_fetch_array($r1, MYSQLI_ASSOC))
	{

echo '<hr><h2>WELCOME  '.$row['first_name'].'</h2>' ;

	}
	
	
# Retrieve movies from 'account type' database table. Check if the user has prime access. 

	$q = "SELECT * FROM type_account WHERE user_id = {$_SESSION[ 'user_id' ] }" ;
	$r = mysqli_query( $link, $q ) ;
if ( mysqli_num_rows( $r ) > 0  )
{
$q2 = "SELECT * FROM prices WHERE id = 2" ;
$r2 = mysqli_query( $link, $q2 ) ;

  $row = mysqli_fetch_array( $r2, MYSQLI_ASSOC );
	  
	  echo'<h2><hr><div class="row">
			<div class="col-sm-12 col-md-4">
			Account type : premium</h2>
	<br> <h3>You can now stream all movies and shows !!!</h3>
	<br> <a href = "show.php"> WATCH NOW</a>
	<br> <a href = "cart_index.php"> BUY NOW</a>
		</div>';

		
  }
 
	

else
{
	echo'<h2><hr><div class="row">
			<div class="col-sm-12 col-md-4">
			BUY PREMIUM</h2>
	<br> <h3>You can stream all movies and shows with premium access !!!</h3>';
	
	
$q3 = "SELECT * FROM prices WHERE id = 2" ;
$r3 = mysqli_query( $link, $q3 ) ;
if ( mysqli_num_rows( $r3 ) == 1 )
{
  $row = mysqli_fetch_array( $r, MYSQLI_ASSOC );

 echo '<div class="container">
  <div class="row">
      <div class="col-sm">
	<div class="card bg-light mb-3" style="background-color:#1F3140!important";>
	    <div class="card-header"> 
	          <h5 class="card-title">PREMIUM</h5>
			  <h4>'.$row['type'].'  £ '.$row['price'].' </h4>
			  <br> <a href = "cart_index.php"> BUY NOW</a>
		</div>
			
		</div>
		</div>';
}	
		

  }

    # Close database connection.
    mysqli_close( $link );
 

# Display footer section.
include ( 'footer.html' ) ;
?>


