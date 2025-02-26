<?php
#open databse connection
require ('connect_db.php');

$q = "SELECT * FROM users";
$r = mysqli_query( $link, $q );
if (mysqli_num_rows ($r) >0 )
{
	
	echo'<table class="table" style=" color:#888c81!important;>
  <thead>
    <tr>
	<th scope="col">USERS DETAILS</th>
	<th scope="col">ID</th>
	<th scope="col">Name</th>
	<th scope="col">Surname</th>
	<th scope="col">Date of Birth</th>
	<th scope="col">Email</th>
	<th scope="col">Phone</th>
	<th scope="col">Country</th>
	<th scope="col">Registration date</th>
	<th scope="col">Edit</th>
	<th scope="col">Active?</th>
	<th scope="col">Premium?</th>
	';
	echo' </thead>
  <tbody>';
	while ( $row = mysqli_fetch_array($r, MYSQLI_ASSOC))
	{
		if ($row['user_id']>1)
		{
		$id = $row['user_id'];
		
		echo '<h5> <th>'. $row['user_id'].' </th><th>'.$row['first_name'].'</th> <th>'.$row['last_name'].'</th> 
		<th>'. $row['DOB'].' </th><th>'.$row['email'].'</th><th> '.$row['phone'].' </th>
		<th>'. $row['country'].'</th><th> '.$row['reg_date'].'</th>
		<th><p><a href="edit_user.php?id='.$row['user_id'].' ">
		
		<span class="btn btn-dark">Edit User</span></a></p></h5> ';

$q1 = "SELECT * FROM blocked where user_id =$id";
$r1 = mysqli_query( $link, $q1 );
echo '<th>';
if (mysqli_num_rows ($r1) >0 )
{
	echo 'Account Blocked </th>';
	
}
else {
	
	echo 'Account Active </th>';
	
}
$q2 = "SELECT * FROM type_account where user_id =$id";
$r2 = mysqli_query( $link, $q2 );
echo '<th>';
if (mysqli_num_rows ($r2) >0 )
{
	echo 'Subscriber</th>';
}
else
{
	echo 'Not paid </th>';
	
}
echo'</tr>';
	}}
	echo'</tbody>
</table>';
	#closing connection with database
	mysqli_close($link);
	
}
else {echo '<p> There are currently no users. </p>';}
?>