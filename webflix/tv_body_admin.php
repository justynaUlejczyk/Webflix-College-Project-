<?php
# Open database connection.
	require ( 'connect_db.php' ) ;

	# Retrieve movies from 'tv_show' database table.
	$q = "SELECT * FROM tv_show ORDER BY show_title" ;
	$r = mysqli_query( $link, $q ) ;
	if ( mysqli_num_rows( $r ) > 0 )
	{
		
# Display body section.




echo'
<br><div class="container">
<div class="row align-items">
 
  ';
	while ( $row = mysqli_fetch_array( $r, MYSQLI_ASSOC ))
	{
	
	echo '
	
	<div class="text-center">
	<div class="card" style="width: 9rem; background-color: #1F3140!important;">
	<img src="'. $row['img'].'"class="card-img-top"  alt="Movie">
	 <div class="card-body">
<p><a href="tv.php?id='.$row['id'].' "><span class="btn btn-dark"> '. $row['show_title'].' </h4></span></a></p><br>
				  <a  class="alert-link" class="btn btn-primary" href="delete_tv.php?id='.$row['id'].'"> <i class="fas fa-trash-alt"></i> 
				  Delete</a><br>
				 <a  class="alert-link" class="btn btn-dark btn-block" href="edit_show.php?id='.$row['id'].'">EDIT<i class="fas fa-trash-alt"></i> 
		
				</p>  
	</div></div></div>';
	
			}
	
	
	 
	}
# Or display message.
else { echo '<p>There are currently no movies showing.</p>' ; } 
	
	





