<?php
# Access session.
session_start() ;
# Redirect if not logged in.
if ( !isset( $_SESSION[ 'user_id' ] ) ) { require ( 'login_tools.php' ) ; load() ; } 
 # Connect to the database.

  require ('connect_db.php'); 

# Set page title and display header section.
$page_title = 'Search' ;

# Get passed product id and assign it to a variable.
if ( isset( $_GET['search2'] ) ) $search2 = $_GET['search2'] ;

include ( 'logout.html' ) ;
 
  
	# Retrieve movies from 'movie' database table.
	$q = "SELECT * FROM movie WHERE movie_title LIKE '%{$_GET[search2]}%' " ;
	$r = mysqli_query( $link, $q ) ;
	if ( mysqli_num_rows( $r ) > 0 )
	{
		
# Display body section.
echo'<br><div class="container">
<div class="row align-items">
 <div class="row row-cols-4">
  ';
	while ( $row = mysqli_fetch_array( $r, MYSQLI_ASSOC ))
	{

echo '<br>
	<div class="text-center">
	<div class="card" style="width: 18rem; background-color: #1F3140!important;">
	<img src="'. $row['img'].'"class="card-img-top"  alt="Movie">
	 <div class="card-body">
<p><a href="movie.php?id='.$row['id'].' "><span class="btn btn-dark"> '. $row['movie_title'].' </span></a></p><br>
				 
	</div></div></div>';

	}
	}
	else {
	
	# Retrieve shows from 'tv shows' database table.
	$q1 = "SELECT * FROM tv_show WHERE show_title LIKE '%{$_GET[search2]}%' " ;
	$r1 = mysqli_query( $link, $q1 ) ;
	if ( mysqli_num_rows( $r1 ) > 0 )
	{
		
# Display body section.
echo'<br><div class="container">
<div class="row align-items">
 <div class="row row-cols-4">
  ';
	while ( $row = mysqli_fetch_array( $r1, MYSQLI_ASSOC ))
	{

echo '<br>
	<div class="text-center">
	<div class="card" style="width: 18rem; background-color: #1F3140!important;">
	<img src="'. $row['img'].'"class="card-img-top"  alt="Movie">
	 <div class="card-body">
<p><a href="tv.php?id='.$row['id'].' "><span class="btn btn-dark"> '. $row['show_title'].' </span></a></p><br>
				 
	</div></div></div>';

	}
	}
	
	
	else {echo 'Nothing here.... Try again';}
	}
	
	mysqli_close( $link) ; 


include('footer.html');
?>