<?php # DISPLAY COMPLETE LOGGED IN PAGE.
# Access session.
session_start() ; 

# Redirect if not logged in.
if ( !isset( $_SESSION[ 'user_id' ] ) ) { require ( 'login_tools.php' ) ; load() ; }

include('logout.html');

# Get passed product genre and assign it to a variable.
if ( isset( $_GET['id'] ) ) $id = $_GET['id'] ;
include ('genre.php');
# Open database connection.
require ( 'connect_db.php' ) ;
echo '<div class="container">
<div class="row">
  <div class="col">';
 
# Retrieve selective item data from 'movie' database table. 
$q = "SELECT * FROM movie Where Genre LIKE '%{$_GET[id]}%' order by movie_title" ;
$r = mysqli_query( $link, $q ) ;
	if ( mysqli_num_rows( $r ) > 0 )
	{
		
# Display body section.

echo '<h1> MOVIES</h1>';


echo'<br><div class="container">
<div class="row">
 <div class="row row-cols-2">
<div class="col-6">
 
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
	else {echo '<h3>There is no movie in this category, try again...</h3>';}
echo '</div></div></div></div></div>
 
<div class="col-6">';


# Retrieve selective item data from 'tv' database table. 
$q = "SELECT * FROM tv_show Where genre LIKE '%{$_GET[id]}%' order by show_title" ;
$r = mysqli_query( $link, $q ) ;
	if ( mysqli_num_rows( $r ) > 0 )
	{
		echo '<h1> TV SHOWS</h1>';
# Display body section.

echo'<br><div class="container">
<div class="row">
 <div class="row row-cols-2">
  <div class="col-6 col-md-4">
  ';
	while ( $row = mysqli_fetch_array( $r, MYSQLI_ASSOC ))
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
	else {echo '<h3>There is no  tv show in this category, try again...</h3>';}
echo '</div></div></div></div></div></div>';


# Close database connection.
mysqli_close($link);


# Display footer section.
include ( 'footer.html' ) ;
?>