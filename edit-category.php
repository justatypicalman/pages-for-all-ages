<?php  
session_start();

if (isset($_SESSION['user_id']) &&
    isset($_SESSION['user_email'])) {
    
	if (!isset($_GET['id'])) {
        header("Location: admin.php");
        exit;
	}

	$id = $_GET['id'];

	include "db_conn.php";

	include "php/func-category.php";
    $category = get_category($conn, $id);

    if ($category == 0) {
        header("Location: admin.php");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edit Category</title>
	<link rel="icon" type="image/x-icon" href="img/biggerlogowithborder.png">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
	<style>
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
		          <a class="nav-link" 
		             href="logout.php">Logout</a>
		        </li>
		      </ul>
		    </div>
		  </div>
		</nav>
		<div class="container">
		<div class="row">
				<div class="col-md-2"></div>
				<div class="col">
     <form action="php/edit-category.php"
           method="post" 
           class="shadow p-4 rounded mt-5"
           style="width: 100%; max-width: 50rem; background-color: white;">

     	<h1 class="text-center pb-5 display-4 fs-3">
     		Edit Category
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
		           	Category Name
		           </label>

		     <input type="text" 
		            value="<?=$category['id'] ?>" 
		            hidden
		            name="category_id">


		    <input type="text" 
		           class="form-control"
		           value="<?=$category['name'] ?>" 
		           name="category_name">
		</div>

	    <button type="submit" 
	            class="btn btn-primary">
	            Update</button>
     </form>
	</div>
	</div>
		</div>
	</div>
	<a href="#"  id="top" class="bottop" ><abbr title="Return to top"><img src="top.png" class="top"  style="position:fixed; right: 2rem; bottom: 2rem;"></abbr></a>
        
              <a href="#footer" id="bot" data-aos="flip-up" class="bottop"><abbr title="Go to bottom page"><img src="bot.png" id="bot" class="bot" style="position:fixed; right: 2rem; bottom: 2rem;"></abbr></a>
			  <footer class="page-footer font-small blue" style="background-color: #F68901; color: white; ">


<div class="footer-copyright text-center py-3">© 2022 Copyright:
   <a href="#" style="text-decoration: none; color: white;"> Pages for All Ages</a>
</div>


</footer>
			</body>
</html>

<?php }else{
  header("Location: login.php");
  exit;
} ?>