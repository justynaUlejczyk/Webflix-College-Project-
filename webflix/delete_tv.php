<?php
# Access session.
session_start() ;
header("Location: show.php");
# Redirect if not logged in.
if ( !isset( $_SESSION[ 'user_id' ] ) ) { require ( 'login_tools.php' ) ; load() ; }
include('logout.html');
# Open database connection.
require ( 'connect_db.php' ) ;

if ( isset( $_GET['id'] ) ) $id = $_GET['id'] ;

$sql = "DELETE FROM tv_show WHERE id= $id";
 if ($link->query($sql) === TRUE) {
       header("Location: show.php");
    } else {
        echo "Error deleting record: " . $link->error;
    }
# Close database connection.
mysqli_close($link);


?>