	
<?php
# Access session.
session_start() ;
# Redirect if not logged in.
if ( !isset( $_SESSION[ 'user_id' ] ) ) { require ( 'login_tools.php' ) ; load() ; } 


# Set page title and display header section.
$page_title = 'Shows' ;

if (  $_SESSION[ 'user_id' ] == 1)
{include('admin.html');
	
	echo '<hr> <div class="container text-center">
 <div class ="row" >
	<div class="col align-self-center">
	<div class = "col-xl"  >
	<div class="card-header">
	<div class="text-center">';
	
	
	include ('genre_admin.php');
echo '<div class = "container">
<h4>Movies</h4>';
include('movie_body_admin.php');
	echo '<br><div class = "container"><h4>TV Shows</h4>';
	include('tv_body_admin.php');
echo'</div>
	</div>
	</div>
  </div>
</div>
	</div>';

}
else {
	
	
include('logout.html');
echo '<hr> <div class="container text-center">
 <div class ="row" >
	<div class="col align-self-center">
	<div class = "col-md-xl"  >
	<div class="card-header">
	<div class="text-center">';
include ('genre.php');

echo '</div></div></div></div></div>';
include('movie_body.php');

	include('tv_body.php');
	echo '</div>
	</div>
	</div>
  </div>
</div>
	</div>';
	
}
# Display footer section.
include ( 'footer.html' ) ;




?>

