



<div class= container>
<div class="col align-self-center">
<div class="container text-center">
  <div class="row justify-content-md-center">
	
	<h2>MOVIES</h2></div></div>
<!-- Flickity HTML init -->
<div class="gallery js-flickity"
  data-flickity-options='{ "wrapAround": true }'>
  
  <?php
  # Open database connection.
	require ( 'connect_db.php' ) ;

	# Retrieve movies from 'movie' database table.
	$q = "SELECT * FROM movie" ;
	$r = mysqli_query( $link, $q ) ;
	if ( mysqli_num_rows( $r ) > 0 )
	{
			while ( $row = mysqli_fetch_array( $r, MYSQLI_ASSOC ))
	{
		
		echo '  <div class="gallery-cell">
		
		<a href="movie.php?id='.$row['id'].' "><img src="'. $row['img'].'"class="card-img-top" "style =height: 300px"  alt="Movie"></a>
		
		</div>';
		
		
	}}
	echo '</div></div></div><br><hr>';
  
  ?>
  