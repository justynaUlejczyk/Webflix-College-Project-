<?php include('login.html'); ?>


<div class = "content">
<div class="row justify-content-md-center">

<form class="row g-3" action="password_action.php" METHOD = "POST">
<div class="grid text-center" style="--bs-columns: 3;">
 <div class="mb-3">

  
  <label for = "inputEmail">Security code </label>
  <input type="text" class = "form-control" placeholder="******" name = "code" required>  
  </div><br>
  <div class="mb-3">  
  <label for = "inputEmail">Email </label>
  <input type="text" class = "form-control" placeholder="e.g.aar@example.com" name = "email" required>  
  </div>
  <input type = "submit" class= "btn btn-dark " value = "reset password">
 </form>
 
 </div> </div></div>
 
 <?php include('footer.html'); ?>