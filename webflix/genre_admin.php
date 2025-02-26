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
  ';
	while ( $row = mysqli_fetch_array( $r, MYSQLI_ASSOC ))
	{
	
	echo '<br><div class="text-center">
	<div class="card" style="width: 18rem; background-color: #1F3140!important;">
	 <div class="card-body">
<p><a href="filtr_genre.php?id='.$row['genre'].' "><span class="btn btn-dark"> '. $row['genre'].' </span></a></p><br>
		 <a  class="alert-link" class="btn btn-primary" href="delete_genre.php?id='.$row['g_id'].'"> <i class="fas fa-trash-alt"></i> Delete</a><br>		 
	</div></div></div>';
	
	}
	
	echo '<br>
	<div class="text-center">
	<div class="card" style="width: 18rem; background-color: #1F3140!important;">
	 <div class="card-body"> <p><button type="button" class="btn btn-dark btn-block" data-toggle="modal" data-target="#genre">
			ADD GENRE
			</button>  </span></p><br> </div></div></div>';
	echo'</div></div></div> </div>';
	# Close database connection.
	
	
	}
# Or display message.
else { echo '<p>There are currently no movies showing.</p>' ; } 
?>

	<!--  =============================
=====    Modal ADD GENRE   =======
	=================================== -->	 
	
<div class="modal fade" id="genre" tabindex="-1" role="dialog" aria-labelledby="genre" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">ADD GENRE</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p><form action="add-genre.php" method="post">
            
            <div class="form-group">
                <input type="text" 
				       name="genre" 
					   class="text" 
					   placeholder="New Genre"
					   value="<?php if (isset($_POST['genre'])) echo $_POST['genre']; ?>" required>

            </div><div class="modal-footer">
				  <div class="form-group">
					<input type="submit" name="btnChangePassword" class="btn btn-secondary btn-block" value="Save Changes"/>
				  </div>
				</div>
         </form>
      </div>
    </div>
  </div>
</div>

