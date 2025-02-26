<?php 
# Access session.
session_start() ; 
# Redirect if not logged in.
if ( !isset( $_SESSION[ 'user_id' ] ) ) { require ( 'login_tools.php' ) ; load() ; }
include ('admin.html');
if ( isset( $_GET['id'] ) ) $id = $_GET['id'] ;


require ('connect_db.php');


# blocking account.

   $sql  = "INSERT INTO blocked( user_id, blocked_date ) VALUES ('$id', NOW() ) ";
   if ($link->query($sql) === TRUE) {
       
	   header("Location: home.php");
    }
	else {
        echo "Error deleting record: " . $link->error;
    }

  mysqli_close( $link ) ; 

include('footer.html');
?>
 
 