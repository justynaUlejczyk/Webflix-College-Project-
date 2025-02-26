

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
  if ( empty( $_POST[ 'show_title' ] ) )
  { $errors[] = 'Enter title.' ; }
  else
  { $mt = mysqli_real_escape_string( $link, trim( $_POST[ 'show_title' ] ) ) ; }

  # Check for description.
  if (empty( $_POST[ 'info' ] ) )
  { $errors[] = 'Enter description.' ; }
  else
  { $fi = mysqli_real_escape_string( $link, trim( $_POST[ 'info' ] ) ) ; }

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
  if (empty( $_POST[ 'genre' ] ) )
  { $errors[] = 'Enter genre.' ; }
  else
  { $g = mysqli_real_escape_string( $link, trim( $_POST[ 'genre' ] ) ) ; }

# Check for year
  if (empty( $_POST[ 'year' ] ) )
  { $errors[] = 'Enter year.' ; }
  else
  { $y = mysqli_real_escape_string( $link, trim( $_POST[ 'year' ] ) ) ; }

# Check for language
  if (empty( $_POST[ 'language' ] ) )
  { $errors[] = 'Enter language.' ; }
  else
  { $l = mysqli_real_escape_string( $link, trim( $_POST[ 'language' ] ) ) ; }

# Check for duration.
  if (empty( $_POST[ 'duration' ] ) )
  { $errors[] = 'Enter duration.' ; }
  else
  { $d = mysqli_real_escape_string( $link, trim( $_POST[ 'duration' ] ) ) ; }

# Check for trailer link.
  if (empty( $_POST[ 'play' ] ) )
  { $errors[] = 'Enter trailer link.' ; }
  else
  { $play = mysqli_real_escape_string( $link, trim( $_POST[ 'play' ] ) ) ; }

# Check for episode 1.
  if (empty( $_POST[ 'play_1' ] ) )
  { $errors[] = 'Enter link to episode 1.' ; }
  else
  { $e1 = mysqli_real_escape_string( $link, trim( $_POST[ 'play_1' ] ) ) ; }
# Check for episode 2.
  if (empty( $_POST[ 'play_2' ] ) )
  { $errors[] = 'Enter link to episode 2.' ; }
  else
  { $e2 = mysqli_real_escape_string( $link, trim( $_POST[ 'play_2' ] ) ) ; }

# Check for episode 3.
  if (empty( $_POST[ 'play_3' ] ) )
  { $errors[] = 'Enter link to episode 3.' ; }
  else
  { $e3 = mysqli_real_escape_string( $link, trim( $_POST[ 'play_3' ] ) ) ; }

  # On success update 'tv_show' database table.
  if ( empty( $errors ) ) 
  {
    $q = "UPDATE tv_show SET show_title ='$mt', info ='$fi' , img = '$i', preview ='$p' , genre ='$g' , 
	year = '$y', language = '$l' , duration = '$d', play = '$play', play_1 = '$e1',
	play_2 = '$e2', play_3 = '$e3' WHERE id= $id"; 
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
<div class= "container"><div class="text-center"><p><h4><br> Edit TV SHOW HERE</h4></p></div></div>
	<div class = "container">
	<div class ="row" >
	<div class="col-sm align-self-center">
	<div class = "col-md">
	<div class="card-header">
	 <div class="container" style="background-color:#F2EFRB!important; opacity: 0.7; color:#f2efeb!important;" >
	<div class="text-center">
        <p> <form action =""  method="post">
		

		 <label for="mt">Show title:</label><br>
  <input type="text" id="mt" name="show_title" value="
  <?php
  	require ( 'connect_db.php' ) ;
	
  $q = "SELECT * FROM tv_show where id = $id" ;
	$r = mysqli_query( $link, $q ) ;
	if ( mysqli_num_rows( $r ) > 0 )
	{ 
while ( $row = mysqli_fetch_array( $r, MYSQLI_ASSOC ))
	{
		echo ' '.$row['show_title'].'';
		
	}}
mysqli_close( $link) ; 
   
 ?>
  
  
  <?php if (isset($_POST['show_title'])) echo $_POST['show_title']; ?>" required><br>     
 
  
  <label for="fi">Description:</label><br>
  <input type="text" id="fi" name="info" value="
  <?php
  	require ( 'connect_db.php' ) ;
	
  $q = "SELECT * FROM tv_show where id = $id" ;
	$r = mysqli_query( $link, $q ) ;
	if ( mysqli_num_rows( $r ) > 0 )
	{ 
while ( $row = mysqli_fetch_array( $r, MYSQLI_ASSOC ))
	{
		echo ' '.$row['info'].'';
		
	}}
mysqli_close( $link) ; 
   
 ?>
  <?php if (isset($_POST['info'])) echo $_POST['info']; ?>" required><br>
  
  <label for="image">Image:</label><br>
  <input type="text" id="i" name="img" value="
  <?php
  	require ( 'connect_db.php' ) ;
	
  $q = "SELECT * FROM tv_show where id = $id" ;
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
	
  $q = "SELECT * FROM tv_show where id = $id" ;
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
  <select class="custom-select" id="g" name="genre" >
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
  <input type="text" id="y" name="year" value="
  <?php
  	require ( 'connect_db.php' ) ;
	
  $q = "SELECT * FROM tv_show where id = $id" ;
	$r = mysqli_query( $link, $q ) ;
	if ( mysqli_num_rows( $r ) > 0 )
	{ 
while ( $row = mysqli_fetch_array( $r, MYSQLI_ASSOC ))
	{
		echo ' '.$row['year'].'';
		
	}}
mysqli_close( $link) ; 
   
 ?>
  <?php if (isset($_POST['year'])) echo $_POST['year']; ?>" required><br>
  
  <label for="lang">Language:</label><br>
  <input type="text" id="l" name="language" value="
  <?php
  	require ( 'connect_db.php' ) ;
	
  $q = "SELECT * FROM tv_show where id = $id" ;
	$r = mysqli_query( $link, $q ) ;
	if ( mysqli_num_rows( $r ) > 0 )
	{ 
while ( $row = mysqli_fetch_array( $r, MYSQLI_ASSOC ))
	{
		echo ' '.$row['language'].'';
		
	}}
mysqli_close( $link) ; 
   
 ?>
  <?php if (isset($_POST['language'])) echo $_POST['language']; ?>" required><br>
  
  <label for="dur">Duration:</label><br>
  <input type="text" id="d" name="duration" value="
  <?php
  	require ( 'connect_db.php' ) ;
	
  $q = "SELECT * FROM tv_show where id = $id" ;
	$r = mysqli_query( $link, $q ) ;
	if ( mysqli_num_rows( $r ) > 0 )
	{ 
while ( $row = mysqli_fetch_array( $r, MYSQLI_ASSOC ))
	{
		echo ' '.$row['duration'].'';
		
	}}
mysqli_close( $link) ; 
   
 ?>
  ?php if (isset($_POST['duration'])) echo $_POST['duration']; ?>" required><br>
  
  <label for="dur">Number od seasons and episodes:</label><br>
  <input type="text" id="play" name="play" value="
  <?php
  	require ( 'connect_db.php' ) ;
	
  $q = "SELECT * FROM tv_show where id = $id" ;
	$r = mysqli_query( $link, $q ) ;
	if ( mysqli_num_rows( $r ) > 0 )
	{ 
while ( $row = mysqli_fetch_array( $r, MYSQLI_ASSOC ))
	{
		echo ' '.$row['play'].'';
		
	}}
mysqli_close( $link) ; 
   
 ?>
  <?php if (isset($_POST['play'])) echo $_POST['play']; ?>" required><br>
  
  <label for="dur">Episode 1:</label><br>
  <input type="text" id="e1" name="play_1" value="  <?php
  	require ( 'connect_db.php' ) ;
	
  $q = "SELECT * FROM tv_show where id = $id" ;
	$r = mysqli_query( $link, $q ) ;
	if ( mysqli_num_rows( $r ) > 0 )
	{ 
while ( $row = mysqli_fetch_array( $r, MYSQLI_ASSOC ))
	{
		echo ' '.$row['play_1'].'';
		
	}}
mysqli_close( $link) ; 
   
 ?>
 <?php if (isset($_POST['play_1'])) echo $_POST['play_1']; ?>" required><br>
  
   <label for="dur">Episode 2:</label><br>
  <input type="text" id="e2" name="play_2" value="  <?php
  	require ( 'connect_db.php' ) ;
	
  $q = "SELECT * FROM tv_show where id = $id" ;
	$r = mysqli_query( $link, $q ) ;
	if ( mysqli_num_rows( $r ) > 0 )
	{ 
while ( $row = mysqli_fetch_array( $r, MYSQLI_ASSOC ))
	{
		echo ' '.$row['play_2'].'';
		
	}}
mysqli_close( $link) ; 
   
 ?>
 <?php if (isset($_POST['play_2'])) echo $_POST['play_2']; ?>" required><br>
  
   <label for="dur">Episode 3:</label><br>
  <input type="text" id="e3" name="play_3" value="  <?php
  	require ( 'connect_db.php' ) ;
	
  $q = "SELECT * FROM tv_show where id = $id" ;
	$r = mysqli_query( $link, $q ) ;
	if ( mysqli_num_rows( $r ) > 0 )
	{ 
while ( $row = mysqli_fetch_array( $r, MYSQLI_ASSOC ))
	{
		echo ' '.$row['play_3'].'';
		
	}}
mysqli_close( $link) ; 
   
 ?>
 <?php if (isset($_POST['play_3'])) echo $_POST['play_3']; ?>" required><br>
  
  
  </div></div>

             </div><div class="modal-footer">
				  <div class="form-group">
					<input type="submit" name="ChangeTV" class="btn btn-secondary btn-block" value="Save Changes"/>
				  </div>
				</div>
     </form></div></div></div></div></div>


<?php include ('footer.html'); ?>



