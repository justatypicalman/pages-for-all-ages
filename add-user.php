<?php  
session_start();

if (isset($_SESSION['user_id']) &&
    isset($_SESSION['user_email'])) {
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Add User</title>
	<link rel="icon" type="image/x-icon" href="img/biggerlogowithborder.png">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
	<style>
		.active{
	color: #F68901 !important;
}
body{
	background: url("img/backgroundbookstore.png") no-repeat center center fixed;
			-webkit-background-size: cover;
        	-moz-background-size: cover;
        	-o-background-size: cover;
       		background-size: cover;
}</style>
</head>
<body>
	<div class="container-fluid">
	<nav style="border-radius: 0 0 20px 20px;" class="navbar navbar-expand-lg navbar-light bg-light sticky-top" style="width: 100%;">
		  <div class="container-fluid" style="width: 100%;">
		    <a class="navbar-brand" href="admin.php"><img class="logo" style="width: 70px; padding-right: 10px;" src="img/biggerlogowithborder.png"> Admin | Pages for all Ages</a>
		    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		      <span class="navbar-toggler-icon"></span>
		    </button>
		    <div class="collapse navbar-collapse" 
		         id="navbarSupportedContent">
		      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
		        <li class="nav-item">
		          <a class="nav-link" 
		             aria-current="page" 
		             href="index.php">Store</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link" 
		             href="add-book.php">Add Book</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link" 
		             href="add-category.php">Add Category</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link" 
		             href="add-author.php">Add Author</a>
		        </li>
                <li class="nav-item">
                    <a class="nav-link active"
                    href="add-user.php">Add User</a>
                </li>
				<li class="nav-item">
		          <a class="nav-link" 
		             href="transaction.php">Logs</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link" 
		             href="logout.php">Logout</a>
		        </li>
		      </ul>
		    </div>
		  </div>
		</nav>
		<div class="container" >
			<div class="row">
			<div class="col-md-2"></div>
<div class="col">
     <form action="php/add-user.php"
           method="post" 
           class="shadow p-4 rounded mt-5"
           style="width: 100%; max-width: 50rem; background-color: white;">

     	<h1 class="text-center pb-5 display-4 fs-3">
     		Add New User
     	</h1>
     	<?php if (isset($_GET['error'])) { ?>
          <div class="alert alert-danger" role="alert">
			  <?=htmlspecialchars($_GET['error']); ?>
		  </div>
		<?php } ?>
		<?php if (isset($_GET['success'])) { ?>
          <div class="alert alert-success" role="alert">
			  <?=htmlspecialchars($_GET['success']); ?>
		  </div>
		<?php } ?>
     	<div class="mb-3">

		    <label class="form-label">
		           	First Name
		           </label>
		    <input type="text" 
		           class="form-control" 
		           name="f_name" required>

            <label class="form-label">
		           	Last Name
		           </label>
		    <input type="text" 
		           class="form-control" 
		           name="l_name" required>

            <label class="form-label">
		           	Username
		           </label>
		    <input type="text" 
		           class="form-control" 
		           name="username" required>
                   
            <label class="form-label">
		           	Email
		           </label>
		    <input type="email" 
		           class="form-control" 
		           name="email" required>

            <label class="form-label">
		           	Password
		           </label>
		    <input type="password" 
		           class="form-control" 
		           name="pass" required>

            <label class="form-label">
		           	Mobile
		           </label>
		    <input id="intTextBox"
		           class="form-control" 
		           name="mobile" required>

            <label class="form-label">
		           	Address
		           </label>
		    <input type="text" 
		           class="form-control" 
		           name="address" required>

            <label class="form-label">
		           	City
		           </label>
		    <input type="text" 
		           class="form-control" 
		           name="city" required>

                   <input type="text" 
		           class="form-control" 
		           name="status" value="1" hidden>

		</div>

	    <button type="submit" 
	            class="btn btn-primary" name = "register">
	            Add User</button>
     </form>
	</div>
	</div>
	</div>
	</div>
	<a href="#"  id="top" class="bottop" ><abbr title="Return to top"><img src="img/top.png" class="top"  style="width: 60px;position:fixed; right: 2rem; bottom: 2rem;"></abbr></a>

			 
<script type="text/javascript">
function setInputFilter(textbox, inputFilter, errMsg) {
  ["input", "keydown", "keyup", "mousedown", "mouseup", "select", "contextmenu", "drop", "focusout"].forEach(function(event) {
    textbox.addEventListener(event, function(e) {
      if (inputFilter(this.value)) {
        // Accepted value
        if (["keydown","mousedown","focusout"].indexOf(e.type) >= 0){
          this.classList.remove("input-error");
          this.setCustomValidity("");
        }
        this.oldValue = this.value;
        this.oldSelectionStart = this.selectionStart;
        this.oldSelectionEnd = this.selectionEnd;
      } else if (this.hasOwnProperty("oldValue")) {
        // Rejected value - restore the previous one
        this.classList.add("input-error");
        this.setCustomValidity(errMsg);
        this.reportValidity();
        this.value = this.oldValue;
        this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
      } else {
        // Rejected value - nothing to restore
        this.value = "";
      }
    });
  });
}

setInputFilter(document.getElementById("intTextBox"), function(value) {
  return /^-?\d*$/.test(value); }, "Must be an integer");
</script>
            </body>
</html>

<?php }else{
  header("Location: login.php");
  exit;
} ?>