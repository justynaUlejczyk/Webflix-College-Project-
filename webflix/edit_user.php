<?php # DISPLAY COMPLETE LOGGED IN PAGE.
# Access session.
session_start() ; 
include('admin.html'); 
# Get passed product id and assign it to a variable.
$id = $_GET['id'] ;

# Open database connection.
require ( 'connect_db.php' ) ;

# Retrieve selective item data from 'user' database table. 
$q = "SELECT * FROM users WHERE user_id=$id" ;
$r = mysqli_query( $link, $q ) ;
if ( mysqli_num_rows( $r ) == 1 )
{
	echo'<div class= cointainer"><table class="table" style=" color:#888c81!important;>
  <thead>
    <tr>
	<th scope="col">EDIT USER <br></th>
	<th scope="col">ID</th>
	<th scope="col">Name</th>
	<th scope="col">Surname</th>
	<th scope="col">Date of Birth</th>
	<th scope="col">Email</th>
	<th scope="col">Phone</th>
	<th scope="col">Country</th>
	<th scope="col">Registration date</th>
	<th scope = "col"> BLOCKED </th>';
	echo' </thead>
  <tbody>';
  $row = mysqli_fetch_array( $r, MYSQLI_ASSOC );
	
		echo '<h5> <th>'. $row['user_id'].' </th>
		<th><button type="button" class="btn btn-light btn-block"
		data-toggle="modal" data-target="#name">'.$row['first_name'].'</button></th>

		<th> <button type="button" class="btn btn-dark btn-block" data-toggle="modal"
		data-target="#surname">'.$row['last_name'].'</button></th>
		
		<th><button type="button" class="btn btn-dark btn-block" data-toggle="modal"
		data-target="#dob">'. $row['DOB'].' </button></th><th>'.$row['email'].'</th>
		
		<th> <button type="button"class="btn btn-dark btn-block" data-toggle="modal" 
		data-target="#phone">'.$row['phone'].' </button></th>
		
		<th><button type="button" class="btn btn-dark btn-block" data-toggle="modal" 
		data-target="#country">'. $row['country'].'</button></th>
		<th> '.$row['reg_date'].'</th>';

$q = "SELECT * FROM blocked WHERE user_id=$id" ;
$r = mysqli_query( $link, $q ) ;
if ( mysqli_num_rows( $r ) == 1 )
{
	echo'<th><button type="button" class="btn btn-dark btn-block" data-toggle="modal"
	data-target="#blocked">  <a href="active.php?id='.$row['user_id'].'">BLOCKED ACCOUNT/Remove
		</button></th>';
	
}
else{
	echo'<th><button type="button" class="btn btn-dark btn-block" data-toggle="modal"
	data-target="#blocked">  <a href="blocked.php?id='.$row['user_id'].'">BLOCKED ACCOUNT/Remove
		</button></th>';
	
}
echo'</tbody>
</table></div>';
}


# Display MODALS.


#NAME CHANGE
	
	echo '<div class="modal fade" id="name" tabindex="-1" role="dialog" aria-labelledby="name" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">CHANGE USER NAME</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p> <form action ="change-name.php?id='.$row['user_id'].' "  method="post">
		         <div class="form-group">
                 <input type="text" id="fname" name="first_name" value="';
				 if (isset($_POST['first_name'])) echo $_POST['first_name']; echo '" required><br> 

             </div><div class="modal-footer">
				  <div class="form-group">
					<input type="submit" name="ChangeName" class="btn btn-secondary btn-block" value="Save Changes"/>
				  </div>
				</div>
         </form>
      </div>
    </div>
  </div>
</div>

</div>';

#FAMILY NAME CHANGE
	
	echo '<div class="modal fade" id="surname" tabindex="-1" role="dialog" aria-labelledby="surname" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">CHANGE USER SURNAME</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p> <form action ="change-surname.php?id='.$row['user_id'].' "  method="post">
		         <div class="form-group">
                 <input type="text" id="lname" name="last_name" value="';
				 if (isset($_POST['last_name'])) echo $_POST['last_name']; echo '" required><br> 

             </div><div class="modal-footer">
				  <div class="form-group">
					<input type="submit" name="ChangeSurname" class="btn btn-secondary btn-block" value="Save Changes"/>
				  </div>
				</div>
         </form>
      </div>
    </div>
  </div>
</div>

</div>';


#DOB  CHANGE
	
	echo '<div class="modal fade" id="dob" tabindex="-1" role="dialog" aria-labelledby="dob" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">CHANGE USER SURNAME</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p> <form action ="change-dob.php?id='.$row['user_id'].' "  method="post">
		         <div class="form-group">
                 <input type="date" id="DOB" name="DOB" value="';
				 if (isset($_POST['DOB'])) echo $_POST['DOB']; echo '" required><br> 

             </div><div class="modal-footer">
				  <div class="form-group">
					<input type="submit" name="ChangeDOB" class="btn btn-secondary btn-block" value="Save Changes"/>
				  </div>
				</div>
         </form>
      </div>
    </div>
  </div>
</div>

</div>';	

#phone  CHANGE
	
	echo '<div class="modal fade" id="phone" tabindex="-1" role="dialog" aria-labelledby="phone" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">CHANGE USER SURNAME</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p> <form action ="change-phone.php?id='.$row['user_id'].' "  method="post">
		         <div class="form-group">
                 <input type="text" id="ph" name="phone" value="';
				 if (isset($_POST['phone'])) echo $_POST['phone']; echo '" required><br> 

             </div><div class="modal-footer">
				  <div class="form-group">
					<input type="submit" name="ChangeDOB" class="btn btn-secondary btn-block" value="Save Changes"/>
				  </div>
				</div>
         </form>
      </div>
    </div>
  </div>
</div>

</div>';	

#Country CHANGE
	
	echo '<div class="modal fade" id="country" tabindex="-1" role="dialog" aria-labelledby="country" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">CHANGE USER SURNAME</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p> <form action ="change-country.php?id='.$row['user_id'].' "  method="post">
		         <div class="form-group">
                 <input type="text" id="ph" name="country" value="';
				 if (isset($_POST['country'])) echo $_POST['country']; echo '" required><br> 

             </div><div class="modal-footer">
				  <div class="form-group">
					<input type="submit" name="ChangeDOB" class="btn btn-secondary btn-block" value="Save Changes"/>
				  </div>
				</div>
         </form>
      </div>
    </div>
  </div>
</div>

</div>';	
	
	
	
	include ( 'footer.html' ) ;
	?>
	