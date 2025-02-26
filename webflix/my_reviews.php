<?php # DISPLAY COMPLETE LOGGED IN PAGE.
# Access session.
session_start() ; 

# Redirect if not logged in.
if ( !isset( $_SESSION[ 'user_id' ] ) ) { require ( 'login_tools.php' ) ; load() ; }

include('logout.html');


# Open database connection.
require ( 'connect_db.php' ) ;




# Retrieve items from 'bookings' database table.
$q = "SELECT * FROM mov_rev WHERE id={$_SESSION[user_id]}
ORDER BY post_date DESC" ;

$r = mysqli_query( $link, $q ) ;
if ( mysqli_num_rows( $r ) > 0 )
{
echo '<br><div class="container">
';
while ( $row = mysqli_fetch_array( $r, MYSQLI_ASSOC ))
  {
echo '<br><div class="conatiner" >
<div class="card" >
            <h4 class="alert-heading">' . $row['movie_title'] . '  </h4>
<p>Rating:  ' . $row['rate'] . ' &#9734</p>
<p>' . $row['message'] . '</p>
<hr>
<footer class="blockquote-footer">
<span>' . $row['first_name'] .' '. $row['last_name'] . '</span> 
<cite title="Source Title"> '. $row['post_date'].'</cite>
<br>
<div class="alert" role="alert" >
<a  class="alert-link" class="btn btn-primary" href="delete_post.php?post_id='.$row['post_id'].'"> <i class="fas fa-trash-alt"></i> Delete Post</a><br>
</footer>
</div>

			
';  
  }
  
  }
  
else { echo '<div class="container">
<br>
<div class="alert alert-secondary" role="alert">
<p>You have no movie reviews</p>
</div>
<div> ' ; }


	mysqli_close( $link ) ;		
include('footer.html');


?>
