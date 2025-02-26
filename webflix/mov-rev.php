<?php # DISPLAY COMPLETE LOGGED IN PAGE.
# Access session.
session_start() ; 

# Redirect if not logged in.
#if ( !isset( $_SESSION[ 'user_id' ] ) ) { require ( 'login_tools.php' ) ; load() ; }
# Set page title and display header section.
$page_title = 'My reviews' ;
include ( 'logout.html' ) ;

if ( isset( $_GET['movie_title'] ) ) $movie_title = $_GET['movie_title'] ;

# Retrieve items from 'mov_rev' database table.
# Open database connection.
require ( 'connect_db.php' ) ;
$q = "SELECT * FROM mov_rev WHERE movie_title LIKE '%{$_GET[movie_title]}%'" ;
$r = mysqli_query( $link, $q ) ;
if ( mysqli_num_rows( $r ) > 0 )
{
echo '<div class="container">';
  while ( $row = mysqli_fetch_array( $r, MYSQLI_ASSOC ))
  {
   echo '<div class="alert alert-dark" role="alert" style="background-color:#d9c9ba!important; color:#888c81!important;">
	<h4 class="alert-heading">' . $row['movie_title'] . '  </h4>
	<p>Rating:  ' . $row['rate'] . ' &#9734</p>
	<p>' . $row['message'] . '</p>
	<hr>
	<footer class="blockquote-footer">
	<span>' . $row['first_name'] .' '. $row['last_name'] . '</span> 
	<cite title="Source Title"> '. $row['post_date'].'</cite>
	</footer>
	</div>
';  
  }
  }
else { 
echo '<div class="container">
<br>
<div class="alert alert-secondary" role="alert">
	<p>There are currently no reviews for this movie.</p>
<br>	<button type="button" class="btn btn-secondary" role="button" data-toggle="modal" data-target="#rev">Add Movie Review</button><br>
</div>
<div>  ' ; }

# Close database connection.
mysqli_close($link);

# Display footer section.
include ( 'footer.html' ) ;
?><!-- Optional JavaScript; choose one of the two! -->

    