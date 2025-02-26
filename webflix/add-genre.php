<?php # DISPLAY COMPLETE ADD Movie PAGE
# Include HTML static file login.html
include ( 'admin.html' ) ;


if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' )
{
  # Connect to the database.
  require ('connect_db.php'); 
  
  # Initialize an error array.
  $errors = array();



  # Check for a movie title.
  if ( empty( $_POST[ 'genre' ] ) )
  { $errors[] = 'Enter genre.' ; }
  else
  { $g = mysqli_real_escape_string( $link, trim( $_POST[ 'genre' ] ) ) ; }


if ( empty( $errors ) ) 
  {
    $q = "INSERT INTO genre ( genre) VALUES ( '$g')";
    $r = @mysqli_query ( $link, $q ) ;
    if ($r)
    { 
 header("Location: show.php"); }
  
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