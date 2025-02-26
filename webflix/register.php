<?php # DISPLAY COMPLETE REGISTRATION PAGE.
# Include HTML static file login.html
include ( 'login.html' ) ;


if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' )
{
  # Connect to the database.
  require ('connect_db.php'); 
  
  # Initialize an error array.
  $errors = array();

  # Check for a first name.
  if ( empty( $_POST[ 'first_name' ] ) )
  { $errors[] = 'Enter your first name.' ; }
  else
  { $fn = mysqli_real_escape_string( $link, trim( $_POST[ 'first_name' ] ) ) ; }

  # Check for a last name.
  if (empty( $_POST[ 'last_name' ] ) )
  { $errors[] = 'Enter your last name.' ; }
  else
  { $ln = mysqli_real_escape_string( $link, trim( $_POST[ 'last_name' ] ) ) ; }

  # Check for an email address:
  if ( empty( $_POST[ 'email' ] ) )
  { $errors[] = 'Enter your email address.'; }
  else
  { $e = mysqli_real_escape_string( $link, trim( $_POST[ 'email' ] ) ) ; }

  # Check for a password and matching input passwords.
  if ( !empty($_POST[ 'pass1' ] ) )
  {
    if ( $_POST[ 'pass1' ] != $_POST[ 'pass2' ] )
    { $errors[] = 'Passwords do not match.' ; }
    else
    { $p = mysqli_real_escape_string( $link, trim( $_POST[ 'pass1' ] ) ) ; }
  }
  else { $errors[] = 'Enter your password.' ; }
  
  # Check if email address already registered.
  if ( empty( $errors ) )
  {
    $q = "SELECT user_id FROM users WHERE email='$e'" ;
    $r = @mysqli_query ( $link, $q ) ;
    if ( mysqli_num_rows( $r ) != 0 ) 
	$errors[] = 'Email address already registered. <a class="alert-link" href="login.php">Sign In Now</a>' ;
  }
  

if (empty( $_POST[ 'DOB' ] ) )
  { $errors[] = 'Enter your Date of Birth.' ; }
  else
  { $dob = mysqli_real_escape_string( $link, trim( $_POST[ 'DOB' ] ) ) ; }

if (empty( $_POST[ 'phone' ] ) )
  { $errors[] = 'Enter your phone.' ; }
  else
  { $phone = mysqli_real_escape_string( $link, trim( $_POST[ 'phone' ] ) ) ; }

if (empty( $_POST[ 'country' ] ) )
  { $errors[] = 'Enter your country.' ; }
  else
  { $country = mysqli_real_escape_string( $link, trim( $_POST[ 'country' ] ) ) ; }


  # On success register user inserting into 'users' database table.
  if ( empty( $errors ) ) 
  {
    $q = "INSERT INTO users (first_name, last_name, email, pass, card_number, exp_month, exp_year, cvv, reg_date, DOB, phone, country) 
	VALUES ('$fn', '$ln', '$e', SHA2('$p',256), '$card_number', '$exp_m', '$exp_y', '$cvv', NOW(), '$dob', '$phone', '$country'  )";
    $r = @mysqli_query ( $link, $q ) ;
    if ($r)
    { echo '<div class="alert alert-light" role="alert">
		<h4 class="alert-heading"Registered!</h4>
		<p>You are now registered.</p>
		<a class="alert-link" href="home.php">Login</a>'; }
  
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

<!DOCTYPE html>
<html>
<head>
 <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Register</title>
 
</head>

<body>
	<div class= "container"><div class="text-right"><p><h4><br> Type your details here!</h4></p></div></div>
	<hr>
	
<form action="" method="POST">
<div class="container">
<br>
<h1>Create Account</h1>
<br>
<div class="form-row">
<div class="form-group col-md-6">
<input type="text"
class="form-control"
placeholder="First name"
name="first_name"
required size="20"
value="<?php if (isset($_POST['first_name'])) echo $_POST['first_name']; ?>">
</div>
<br>
<hr>
<div class="form-group col-md-6">
<input type="text"
class="form-control"
placeholder="Last name"
name="last_name"
required size="20"
value="<?php if (isset($_POST['last_name'])) echo $_POST['last_name']; ?>">
</div>
</div>
<div class="form-row">
  <div class="form-group col-md-6">
  <label for="email">Email:</label><br>
  <input type="email" class="form-control" placeholder="Email" id="email" name="email" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>" required><br>
</div> 
<br>
<hr>
<div class="form-group col-md-6">
 <label for="lname">PASSWORD:</label><br>
  <input type="text" class="form-control" placeholder="*******" id="Password" name="pass1" value="<?php if (isset($_POST['pass1'])) echo $_POST['pass1']; ?>" required><br>
  </div></div>
  <div class="form-row">
<div class="form-group col-md-6">
  <label for="lname">Confirm Password</label><br>
  <input type="text" class="form-control" placeholder="*******" id="pass2" name="pass2" value="<?php if (isset($_POST['pass2'])) echo $_POST['pass2']; ?>" required><br> 
  </div>
  <br><hr>
  
  <div class="form-group col-md-6">
  <label for="dob">Date of Birth:</label><br>
  <input type="date" class="form-control" placeholder="XXXX-XX-XX" id="dob" name="DOB" value="<?php if (isset($_POST['DOB'])) echo $_POST['DOB']; ?>" required><br>
</div></div>
<div class="form-row">
<div class="form-group col-md-6">
   <label for="email">phone:</label><br>
  <input type="tel" class="form-control" placeholder="00000000000" id="phone" name="phone" value="<?php if (isset($_POST['phone'])) echo $_POST['phone']; ?>" required><br>
    </div>
	<br><hr>
	<div class="form-group col-md-6">
	<label for="country">country:</label><br>
  <input type="text" class="form-control" placeholder="Country" id="country" name="country" value="<?php if (isset($_POST['country'])) echo $_POST['country']; ?>" required><br>
</div></div>
  <br><input type = "submit" class= "btn btn-dark btn-lg btn-block" value = "Submit">
  
  </div></div>
  <?php
include ( 'footer.html' ) ;
?>

</form></div></div></div></div></div>

