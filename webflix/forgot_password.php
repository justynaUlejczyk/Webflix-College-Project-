<?php # DISPLAY COMPLETE REGISTRATION PAGE.
# Access session.
session_start() ;
# Redirect if not logged in.
if ( !isset( $_SESSION[ 'user_id' ] ) ) { require ( 'login_tools.php' ) ; load() ; }
include('login.html');

$page_title = 'User Area ' ;


# Open database connection.
require ( 'connect_db.php' ) ;


# Retrieve items from 'users' database table.
	$q = "SELECT * FROM users WHERE user_id={$_SESSION[user_id]}" ;
	$r = mysqli_query( $link, $q ) ;
	if ( mysqli_num_rows( $r ) > 0 )
	{
	
  echo '
	<div class="container">
	  <div class="row">
  ';

  while ( $row = mysqli_fetch_array( $r, MYSQLI_ASSOC ))
  {
	
    echo '
	<div class="col-sm">
			<div class="container text-center">
	<div class="col align-self-center">
	<div class = "col-md-6 offset-md-3"  >
 <div class="alert" style="background-color:#6b98bf!important; color:#617C8c!important;" role="alert">
	  <div role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		  <span aria-hidden="true">&times;</span>
		</button>	
	  <h1>'  . $row['first_name'] . ' '  . $row['last_name'] . '<strong>  </h1> 
	   User ID : EC2021/'  . $row['user_id'] . ' 
	   <hr>
	   Email :  ' . $row['email'] . '
	  <hr>
	  Registration Date : ' . $row['reg_date'] .  '  
	  <hr>
	  <!-- Button trigger modal -->
	<button type="button" class="btn btn-light btn-block" data-toggle="modal" data-target="#password">
		  Change Password
	</button>
	 </div>
    </div></div>
    </div>
    
	
    
	';
  }
	
  # Close database connection.
  #mysqli_close( $link ) ; 
}
else { echo '<h3>No user details.</h3>

' ; }
		
		
	




		?>
		
		
		
		
		
		
	<!--  =============================
=====    Modal Change Password   =======
	=================================== -->	 

	
<div class="modal fade" id="password" tabindex="-1" role="dialog" aria-labelledby="password" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Change Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <form action="change-password.php" method="post">
            
            <div class="form-group">
                <input type="password" 
				       name="pass1" 
					   class="form-control" 
					   placeholder="New Password"
					   value="<?php if (isset($_POST['pass1'])) echo $_POST['pass1']; ?>" required>

            </div>
            <div class="form-group">
                <input type="password" 
					   name="pass2" 
					   class="form-control" 
					   placeholder="Confirm New Password"
					   value="<?php if (isset($_POST['pass2'])) echo $_POST['pass2']; ?>" required>

            </div>
				<div class="modal-footer">
				  <div class="form-group">
					<input type="submit" name="btnChangePassword" class="btn btn-secondary btn-block" value="Save Changes"/>
				  </div>
				</div>
         </form>
      </div>
    </div>
  </div>
</div>

	

<?php


# Display footer section.
		
		
		include ( 'footer.html' ) ; 
		?>