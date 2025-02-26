<?php


# Open database connection.
	require ( 'connect_db.php' ) ;

	# Retrieve movies from 'movie' database table.
	$q = "SELECT * FROM genre" ;
	$r = mysqli_query( $link, $q ) ;
	if ( mysqli_num_rows( $r ) > 0 )
	{
		
# Display body section.
echo'<br><div class="container">
<div class="row align-items">
 <div class="row row-cols-8">
  
  <br><div class="text-center">
	<div class="card" style="background-color: #1F3140!important;">
	 <div class="card-body">
	
 <p><a class="btn btn-secondary btn-lg" href="show.php " role="button"> ALL SHOWS </span></a></p><br></div></div></div>
  ';
	while ( $row = mysqli_fetch_array( $r, MYSQLI_ASSOC ))
	{
	
	echo '<br><div class="text-center">
	<div class="card" style="background-color: #1F3140!important;">
	 <div class="card-body">
	
<p><a class="btn btn-secondary btn-lg" href="filtr_genre.php?id='.$row['genre'].' " role="button"> '. $row['genre'].' </a></p><br></div></div></div>';
	
	}
	
	echo'</div></div></div></div></div></div>';
	# Close database connection.
	
	}
# Or display message.
else { echo '<p>There are currently no movies showing.</p>' ; } 




?>