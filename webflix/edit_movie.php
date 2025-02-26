

<?php 

include ('admin.html');
if ( isset( $_GET['id'] ) ) $id = $_GET['id'] ;
if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' )
{
  # Connect to the database.
  require ('connect_db.php'); 
  
  # Initialize an error array.
  $errors = array();

 # Check for a id.
  if ( isset( $_GET['id'] ) ) $id = $_GET['id'] ;

  # Check for a movie title.
  if ( empty( $_POST[ 'movie_title' ] ) )
  { $errors[] = 'Enter title.' ; }
  else
  { $mt = mysqli_real_escape_string( $link, trim( $_POST[ 'movie_title' ] ) ) ; }

  # Check for description.
  if (empty( $_POST[ 'further_info' ] ) )
  { $errors[] = 'Enter description.' ; }
  else
  { $fi = mysqli_real_escape_string( $link, trim( $_POST[ 'further_info' ] ) ) ; }

  # Check for img.
  if (empty( $_POST[ 'img' ] ) )
  { $errors[] = 'Enter image url.' ; }
  else
  { $i = mysqli_real_escape_string( $link, trim( $_POST[ 'img' ] ) ) ; }

# Check for preview.
  if (empty( $_POST[ 'preview' ] ) )
  { $errors[] = 'Enter preview.' ; }
  else
  { $p = mysqli_real_escape_string( $link, trim( $_POST[ 'preview' ] ) ) ; }

# Check for genre.
  if (empty( $_POST[ 'Genre' ] ) )
  { $errors[] = 'Enter genre.' ; }
  else
  { $g = mysqli_real_escape_string( $link, trim( $_POST[ 'Genre' ] ) ) ; }

# Check for year
  if (empty( $_POST[ 'Year' ] ) )
  { $errors[] = 'Enter year.' ; }
  else
  { $y = mysqli_real_escape_string( $link, trim( $_POST[ 'Year' ] ) ) ; }

# Check for language
  if (empty( $_POST[ 'Language' ] ) )
  { $errors[] = 'Enter language.' ; }
  else
  { $l = mysqli_real_escape_string( $link, trim( $_POST[ 'Language' ] ) ) ; }

# Check for duration.
  if (empty( $_POST[ 'Duration' ] ) )
  { $errors[] = 'Enter duration.' ; }
  else
  { $d = mysqli_real_escape_string( $link, trim( $_POST[ 'Duration' ] ) ) ; }

# Check for full movie link
  if (empty( $_POST[ 'watch' ] ) )
  { $errors[] = 'Enter trailer link.' ; }
  else
  { $play = mysqli_real_escape_string( $link, trim( $_POST[ 'watch' ] ) ) ; }

#

  # On success update 'tv_show' database table.
  if ( empty( $errors ) ) 
  {
    $q = "UPDATE movie SET movie_title ='$mt', further_info ='$fi' , img = '$i', preview ='$p' , Genre ='$g' , 
	Year = '$y', Language = '$l' , Duration = '$d', watch = '$play' WHERE id= $id"; 
    $r = @mysqli_query ( $link, $q ) ;
    if ($r)
		
    { echo '<h2>Show edited!</h2>';
	header("Location: show.php");
		 }
  
    # Close database connection.
    mysqli_close($link); 

    exit();
  }
  # Or report errors.
  else 
  {
    echo '
			<p>The following error(s) occurred:</h4>' ;
    foreach ( $errors as $msg )
    { echo " - $msg<br>" ; }
    echo '<p>or please try again.</p></div>';
    # Close database connection.
    mysqli_close( $link );
  }  
}

?>
<div class= "container"><div class="text-center"><p><h4><br> Edit MOVIE HERE</h4></p></div></div>
	<div class = "container">
	<div class ="row" >
	<div class="col-sm align-self-center">
	<div class = "col-md">
	<div class="card-header">
	 <div class="container" style="background-color:#F2EFRB!important; opacity: 0.7; color:#f2efeb!important;" >
	<div class="text-center">
        <p> <form action =""  method="post">
		

		 <label for="mt">Movie title:</label><br>
		 
  <input type="text" id="mt" name="movie_title" value="
    <?php
  	require ( 'connect_db.php' ) ;
	
  $q = "SELECT * FROM movie where id = $id" ;
	$r = mysqli_query( $link, $q ) ;
	if ( mysqli_num_rows( $r ) > 0 )
	{ 
while ( $row = mysqli_fetch_array( $r, MYSQLI_ASSOC ))
	{
		echo ' '.$row['movie_title'].'';
		
	}}
mysqli_close( $link) ; 
   
 ?>
  <?php if (isset($_POST['movie_title'])) echo $_POST['movie_title']; ?>" required><br>     
 
  
  <label for="fi">Description:</label><br>
  <input type="text" id="fi" name="further_info" value="    <?php
  	require ( 'connect_db.php' ) ;
	
  $q = "SELECT * FROM movie where id = $id" ;
	$r = mysqli_query( $link, $q ) ;
	if ( mysqli_num_rows( $r ) > 0 )
	{ 
while ( $row = mysqli_fetch_array( $r, MYSQLI_ASSOC ))
	{
		echo ' '.$row['further_info'].'';
		
	}}
mysqli_close( $link) ; 
   
 ?>
 <?php if (isset($_POST['further_info'])) echo $_POST['futher_info']; ?>" required><br>
  
  <label for="image">Image:</label><br>
  <input type="text" id="i" name="img" value="
      <?php
  	require ( 'connect_db.php' ) ;
	
  $q = "SELECT * FROM movie where id = $id" ;
	$r = mysqli_query( $link, $q ) ;
	if ( mysqli_num_rows( $r ) > 0 )
	{ 
while ( $row = mysqli_fetch_array( $r, MYSQLI_ASSOC ))
	{
		echo ' '.$row['img'].'';
		
	}}
mysqli_close( $link) ; 
   
 ?>
  <?php if (isset($_POST['img'])) echo $_POST['img']; ?>" required><br>
  
  <label for="preview">Preview:</label><br>
  <input type="text" id="p" name="preview" value="
      <?php
  	require ( 'connect_db.php' ) ;
	
  $q = "SELECT * FROM movie where id = $id" ;
	$r = mysqli_query( $link, $q ) ;
	if ( mysqli_num_rows( $r ) > 0 )
	{ 
while ( $row = mysqli_fetch_array( $r, MYSQLI_ASSOC ))
	{
		echo ' '.$row['preview'].'';
		
	}}
mysqli_close( $link) ; 
   
 ?>
 <?php if (isset($_POST['preview'])) echo $_POST['preview']; ?>" required><br>
  
    <label for="genre">Genre:</label><br>
  <select class="custom-select" id="g" name="Genre" >
  <div class="col">
  <option selected">Genre</option>
  <?php
  	require ( 'connect_db.php' ) ;
	
  $q = "SELECT * FROM genre" ;
	$r = mysqli_query( $link, $q ) ;
	if ( mysqli_num_rows( $r ) > 0 )
	{ 
while ( $row = mysqli_fetch_array( $r, MYSQLI_ASSOC ))
	{
		echo ' <option value='.$row['genre'].'> '.$row['genre'].'</option>';
		
	}}
mysqli_close( $link) ; 
   
 ?>
</select><br>
 <label for="year">Year:</label><br>
  <input type="text" id="y" name="Year" value="    <?php
  	require ( 'connect_db.php' ) ;
	
  $q = "SELECT * FROM movie where id = $id" ;
	$r = mysqli_query( $link, $q ) ;
	if ( mysqli_num_rows( $r ) > 0 )
	{ 
while ( $row = mysqli_fetch_array( $r, MYSQLI_ASSOC ))
	{
		echo ' '.$row['Year'].'';
		
	}}
mysqli_close( $link) ; 
   
 ?>
 <?php if (isset($_POST['Year'])) echo $_POST['Year']; ?>" required><br>
  
  <label for="lang">Language:</label><br>
  <input type="text" id="l" name="Language" value="    <?php
  	require ( 'connect_db.php' ) ;
	
  $q = "SELECT * FROM movie where id = $id" ;
	$r = mysqli_query( $link, $q ) ;
	if ( mysqli_num_rows( $r ) > 0 )
	{ 
while ( $row = mysqli_fetch_array( $r, MYSQLI_ASSOC ))
	{
		echo ' '.$row['Language'].'';
		
	}}
mysqli_close( $link) ; 
   
 ?>
 <?php if (isset($_POST['Language'])) echo $_POST['Language']; ?>" required><br>
  
  <label for="dur">Duration:</label><br>
  <input type="text" id="d" name="Duration" value="    <?php
  	require ( 'connect_db.php' ) ;
	
  $q = "SELECT * FROM movie where id = $id" ;
	$r = mysqli_query( $link, $q ) ;
	if ( mysqli_num_rows( $r ) > 0 )
	{ 
while ( $row = mysqli_fetch_array( $r, MYSQLI_ASSOC ))
	{
		echo ' '.$row['Duration'].'';
		
	}}
mysqli_close( $link) ; 
   
 ?>
 <?php if (isset($_POST['Duration'])) echo $_POST['Duration']; ?>" required><br>
  
  <label for="dur">Link to full Movie:</label><br>
  <input type="text" id="play" name="watch" value="
      <?php
  	require ( 'connect_db.php' ) ;
	
  $q = "SELECT * FROM movie where id = $id" ;
	$r = mysqli_query( $link, $q ) ;
	if ( mysqli_num_rows( $r ) > 0 )
	{ 
while ( $row = mysqli_fetch_array( $r, MYSQLI_ASSOC ))
	{
		echo ' '.$row['watch'].'';
		
	}}
mysqli_close( $link) ; 
   
 ?>
  <?php if (isset($_POST['watch'])) echo $_POST['watch']; ?>" required><br>

  
  </div></div>

             </div><div class="modal-footer">
				  <div class="form-group">
					<input type="submit" name="ChangeMovie" class="btn btn-secondary btn-block" value="Save Changes"/>
				  </div>
				</div>
     </form></div></div></div></div></div>


<?php include ('footer.html'); ?>



