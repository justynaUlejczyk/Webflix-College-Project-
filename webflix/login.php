
<?php #DISPLAY COMPLETE LOGIN PAGE.
# Include HTML static file login.html
include ( 'login.html' ) ;

	
	#Display any error messages if present
	if(isset($errors) && !empty($errors))
	{
		echo'<div class ="alert alert-secondary" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		
		</button><h4 class="alert-heading">Oops! There was a problem:';
		foreach ($errors as $msg) {echo " - $msg<br>";}
		echo 'Please try again or <a class = "alert-link" href="register.php">Rgister</a></h4>
		</div>';
			
	}
	

	
	?>
	<!--Display body section.-->
<br>
<div class = "content">
<div class="container text-center">
 <div class="row"">

<div class = "col"  >
 <div class="alert" role="alert">
<button type="button" class="btn btn-dark btn-lg" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Log in
</button>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Log in </h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">


	<form action="login_action.php" METHOD = "POST">

  <div class = "form-group">
  
  <label for = "inputEmail">Email </label>
  <input type="text" class = "form-control" placeholder="e.g.aar@example.com" name = "email" required>  
  </div>
  <div class= "form-group">
  <label for="inputPassword">Password </label>
  <input type="password" class="form-control" placeholder = "Password" name= "pass" required>
  </div>
 <input type = "submit" class= "btn btn-dark btn-lg btn-block" value = "Login">


  </form>
  <div class="container text-center">
	<div class="col align-self-center">
	<div class = "col"  >
 <div class="alert" role="alert">
<a href="pass_for.php">	<button type="button" class="btn btn-dark" role="button" data-toggle="modal" data-target="#rev">Forgot your password? </button></a>
		</div>
		</div>
		</div>

	</div>
	</div>
	</div>
	</div>
	</div>
	 </div>
	
	
    
 

	<div class = "col"  >
 <div class="alert" role="alert">
<a href="register.php">	<button type="button" class="btn btn-dark btn-lg" role="button" data-toggle="modal" data-target="#rev">Register </button></a>
	</div>
	</div>
	</div>
	</div>
	</div>
	
	



<?php include ( 'footer.html' ) ; ?>
	