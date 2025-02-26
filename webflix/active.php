<?php
# Access session.
session_start() ;
header("Location: home.php");
# Redirect if not logged in.
if ( !isset( $_SESSION[ 'user_id' ] ) ) { require ( 'login_tools.php' ) ; load() ; }
include('admin.html');
# Open database connection.
require ( 'connect_db.php' ) ;

if ( isset( $_GET['id'] ) ) $id = $_GET['id'] ;

$sql = "DELETE FROM blocked WHERE user_id='$id'";
 if ($link->query($sql) === TRUE) {
       header("Location: home.php");
    } else {
        echo "Error deleting record: " . $link->error;
    }
# Close database connection.
mysqli_close($link);


?>