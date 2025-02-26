
<?php
# Open database connection.
	require ( 'connect_db.php' ) ;

	# Retrieve movies from 'movie' database table.
	$q = "SELECT * FROM movie ORDER BY movie_title" ;
	$r = mysqli_query( $link, $q ) ;
	if ( mysqli_num_rows( $r ) > 0 )
	{
		
# Display body section.




echo'
<br><div class="container">
<div class="row align-items">
 <div class="row row-cols-8">
  ';

	while ( $row = mysqli_fetch_array( $r, MYSQLI_ASSOC ))
	{
	
	echo '<br>
	 
	<div class="text-center">
	<div class="card" style="width: 9rem; background-color: #1F3140!important;"">
	<img src="'. $row['img'].'"class="card-img-top"  alt="Movie">
	 <div class="card-body">
<p><a href="movie.php?id='.$row['id'].' "><span class="btn btn-dark"> '. $row['movie_title'].' </span></a></p><br>
				  <a  class="alert-link" class="btn btn-primary" href="delete_movie.php?id='.$row['id'].'"> 
				  <i class="fas fa-trash-alt"></i> Delete</a><br>
				  <a  class="alert-link" class="btn btn-dark btn-block" 
				  href="edit_movie.php?id='.$row['id'].'"><i class="fas fa-trash-alt">EDIT</i></a> 
		</p>  
	</div></div></div>';
	
	}
	
	echo'</div></div></div> </div>';
	# Close database connection.
	mysqli_close( $link) ; 
	}
# Or display message.
else { echo '<p>There are currently no movies showing.</p>' ; } 

?>

