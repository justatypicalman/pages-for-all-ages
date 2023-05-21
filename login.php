<?php  
session_start();

if (!isset($_SESSION['user_id']) &&
    !isset($_SESSION['user_email'])) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Log In</title>
	<link rel="icon" type="image/x-icon" href="img/biggerlogowithborder.png">
	<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
	<script src="https://kit.fontawesome.com/d876f86ab9.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
	<style>
		body{
			background: url("img/MainFormBackground.png") no-repeat center center fixed;
			-webkit-background-size: cover;
        	-moz-background-size: cover;
        	-o-background-size: cover;
       		background-size: cover;
		}
		a{
			text-decoration: none;
			color: white;
		}
		a:hover{
			color: white;
		}
		.btn{
		background-color: #F68901;
		border: 1px solid #F68901;
		}
		.btn-primary{
			background-color: #F68901;
		border: 1px solid #F68901;
		}
		.btn:hover{
			background-color: #a65b00;
			border: 1px solid #a65b00;
	}
	</style>
</head>
<body>
	<div class="d-flex justify-content-center align-items-center"
	     style="min-height: 100vh; background-color: rgba(0,0,0,0.5); border-radius: 15px;" >
		<form class="p-5 rounded shadow"
		      style="max-width: 30rem; width: 100%; background-color: white;"
		      method="POST"
		      action="php/auth.php" data-aos="flip-up" data-aos-duration="1800">
			  <a href="userlogin.php"><input type="button" value="Login as User" class="btn" style="color: white; position: absolute; top:10px; right: 10px;"></a>
	<div style="display: inline">
		  <h1 class="text-center display-4 pb-5"><i style="color: #F68901;font-size: 50px;" class="fa-solid fa-user-lock"></i> Admin Login</h1></div>
		  <?php if (isset($_GET['error'])) { ?>
          <div class="alert alert-danger" role="alert">
			  <?=htmlspecialchars($_GET['error']); ?>
		  </div>
		  <?php } ?>
			
		  <div class="mb-3">
		    <label for="exampleInputEmail1" 
		           class="form-label">Email address</label>
		    <input type="email" 
		           class="form-control" 
		           name="email" 
		           id="exampleInputEmail1" 
		           aria-describedby="emailHelp">
		  </div>

		  <div class="mb-3">
		    <label for="exampleInputPassword1" 
		           class="form-label">Password</label>
		    <input type="password" 
		           class="form-control" 
		           name="password" 
		           id="exampleInputPassword1">
		  </div>
		  <button type="submit" 
		          class="btn btn-primary">
		          Login</button>
				  &nbsp;&nbsp;
				  <a href="index.php"><button type="button" class="btn btn-primary">View As Guest</button></a>
				  
		</form>
	</div>
	
	<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
      <script>
  AOS.init();
</script>
</body>
</html>

<?php 
}else{
  header("Location: admin.php");
  exit;
} 
?>