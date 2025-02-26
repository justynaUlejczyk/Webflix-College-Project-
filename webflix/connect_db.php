<?php # CONNECT TO MySQL DATABASE.
# Connect on 'localhost' for user to database 'site_db'
$link = mysqli_connect('localhost','HNDSOFTS2A6','9gw5LHHYkL',
'HNDSOFTS2A6'); 
if (!$link) { 
# Otherwise fail gracefully and explain the error. 
die('Could not connect to MySQL: ' . mysqli_error()); 
} 
#echo 'Connection OK'; 
?>