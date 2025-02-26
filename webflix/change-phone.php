<?php
# Access session.
session_start() ;

include('admin.html'); 

# Set page title and display header section.
$page_title = 'Change name' ;

if ( isset( $_GET['id'] ) ) $id = $_GET['id'] ;
# Check form submitted.
if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' )
{

  # Connect to the database.
  require ('connect_db.php'); 
  
  
  # Initialize an error array.
  $errors = array();
  # Check for an email address:
  
   if ( empty( $_POST[ 'phone' ] ) )
  { $errors[] = 'Enter phone of edited user'; }
  else
  { $ph = mysqli_real_escape_string( $link, trim( $_POST[ 'phone' ] ) ) ; }
  
  
    
  # On success new password into 'users' database table.
  if ( empty( $errors ) ) 
  {
    $q = "UPDATE users SET phone='$ph' WHERE user_id= $id";
    $r = @mysqli_query ( $link, $q ) ;
    if ($r)
    {
       header("Location:home.php");
    } else {
        echo "Error deleting record: " . $link->error;
    }
  
    # Close database connection.
    
	mysqli_close($link); 
    exit();
  }
  # Or report errors.
  else 
  {  
    echo ' 
	<script type ="text/JavaScript">
	alert("' ;
    foreach ( $errors as $msg )
    { echo " - $msg " ; }
    echo 'Please try again.")</script>';
    # Close database connection.
    mysqli_close( $link );
  } 
# Continue to display login page on failure.
include ( 'home.php' ) ;  

}

?>