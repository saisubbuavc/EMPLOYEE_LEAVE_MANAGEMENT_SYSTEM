<?php
require('db1.inc.php');
$msg="";
if(isset($_POST['email']) && isset($_POST['password'])){
	$email=mysqli_real_escape_string($con,$_POST['email']);
	$password=mysqli_real_escape_string($con,$_POST['password']);
	$res=mysqli_query($con,"select * from employee where email='$email' and password='$password'");
	$count=mysqli_num_rows($res);
	if($count>0){
		$row=mysqli_fetch_assoc($res);
		$_SESSION['ROLE']=$row['role'];
		$_SESSION['USER_ID']=$row['id'];
		$_SESSION['USER_NAME']=$row['name'];
		header('location:index1.php');
		die();
	}else{
		$msg="Please enter correct login details";
	}
}
?>
<!doctype html>
<html class="no-js" lang="">
   <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Login Page</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" type="text/css" href="./style1.css">
   </head>
   <body class="bg-dark">
      <div class="sufee-login d-flex align-content-center flex-wrap">
         <div class="container">
            <div class="login-content">
               <div class="login-form mt-150">
			   <h1 style="text-algin:center;text-transform:uppercase;margin:20px 20px;color:red">User Login Form</h1>
                  <form method="post">
                     <div class="form-group">
					 <br>
                        <label style="font-size:20px;margin:15px 0;color:red";>Email Address</label>
						<br>
						<br>
                        <input type="email" name="email" class="form-control" placeholder="Enter your Email" pattern=".+@gmail\.com" required>
                     </div>
					 <br>
					 
                     <div class="form-group">
                        <label style="font-size:20px;margin:15px 0;color:red";>Password</label>
						<br>
						<br>
                        <input type="password" name="password" class="form-control" placeholder="Enter your Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
                     </div>
                     <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30" style="background-color:green">Sign in</button>
					 <div class="result_msg" style="color:red"><?php echo $msg?></div>
					</form>
               </div>
            </div>
         </div>
      </div>
      <script src="assets/js/vendor/jquery-2.1.4.min.js" type="text/javascript"></script>
      <script src="assets/js/popper.min.js" type="text/javascript"></script>
      <script src="assets/js/plugins.js" type="text/javascript"></script>
      <script src="assets/js/main.js" type="text/javascript"></script>
   </body>
</html>