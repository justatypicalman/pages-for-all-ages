<?php  
session_start();

if (isset($_SESSION['user_id']) &&
    isset($_SESSION['user_email'])) {


	include "db_conn.php";

	include "php/func-book.php";
    $books = get_all_books($conn);

	include "php/func-author.php";
    $authors = get_all_author($conn);


	include "php/func-category.php";
    $categories = get_all_categories($conn);

	include "php/func-user.php";
	$users = get_all_user($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Pages for all Ages | Admin</title>
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
}
h4{
color: white;
}
#basic-addon2{
	background-color: #F68901;
	border: 1px solid #F68901;
}
#basic-addon2:hover{
	background-color: #a65b00;
	border: 1px solid #a65b00;
}
a{
	text-decoration:none;
}

.smallimg{
	display:block;
	margin-left:auto;
	margin-right:auto;
}
</style>
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
		<div class="container">
       <form action="search.php"
             method="get" 
             style="width: 100%; max-width: 30rem">

       	<div class="input-group my-5">
		  <input type="text" 
		         class="form-control"
		         name="key" 
		         placeholder="Search Book..." 
		         aria-label="Search Book..." 
		         aria-describedby="basic-addon2">

		  <button class="input-group-text
		                 btn btn-primary" 
		          id="basic-addon2">
		          <img src="img/search.png"
		               width="20">

		  </button>
		</div>
       </form>
       <div class="mt-5"></div>
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


        <?php  if ($books == 0) { ?>
        	<div class="alert alert-warning 
        	            text-center p-5" 
        	     role="alert">
        	     <img src="img/empty.png" 
        	          width="100">
        	     <br>
			  There is no book in the database
		  </div>
        <?php }else {?>


		<h4 style="color: white;">All Books</h4>
		<table class="table table-bordered shadow" style="background-color: white;">
			<thead>
				<tr>
					<th>#</th>
					<th>Title</th>
					<th>Author</th>
					<th>Description</th>
					<th>Category</th>
					<th>Quantity</th>
					<th>Price</th>
					<th>Action</th>
					<th>Status</th>
				</tr>
			</thead>
			<tbody>
			  <?php 
			  $i = 0;
			  foreach ($books as $book) {
			    $i++;
				if($book['book_status'] == 1){
			  ?>
			  <tr>
				<td><?=$i?></td>
				<td>
					<img width="100" class="smallimg"
					     src="uploads/cover/<?=$book['cover']?>" >
					<a  class="link-dark d-block
					           text-center"
					    href="uploads/files/<?=$book['file']?>">
					   <?=$book['title']?>	
					</a>
						
				</td>
				<td style="font-weight:bold">
					
					<?php if ($authors == 0) {
						echo "Undefined";}else{ 

					    foreach ($authors as $author) {
					    	if ($author['id'] == $book['author_id']) {
					    		echo $author['name'];
					    	}
					    }
					}
					?>

				</td>
				<td><?=$book['description']?></td>
				<td>
					<?php if ($categories == 0) {
						echo "Undefined";}else{ 

					    foreach ($categories as $category) {
					    	if ($category['id'] == $book['category_id']) {
					    		echo $category['name'];
					    	}
					    }
					}
				
					?>
				</td>
				<td><?=$book['quantity']?></td>
				<td><?=$book['price']?></td>
				<td>
					<a style="padding: .375rem 21px;width: 100px;" href="edit-book.php?id=<?=$book['id']?>" 
					   class="btn btn-warning">
					   Edit</a>
					<div style="height: 10px;"></div>
					<a style="width: 100px;"href="php/delete-book.php?id=<?=$book['id']?>" 
					   class="btn btn-danger">
				       Archive</a>
				</td>
				<td style="font-weight: bold;"> Active </td>
			  </tr>
			  <?php }else if($book['book_status'] == 0){	?>
				<tr style="color: gray">
				  <td><?=$i?></td>
				  <td>
					  <img width="100" class="smallimg"
						   src="uploads/cover/<?=$book['cover']?>" >
					  <a  class="link-dark d-block
								 text-center"
						  href="uploads/files/<?=$book['file']?>">
						 <?=$book['title']?>	
					  </a>
						  
				  </td>
				  <td>
					  <?php if ($authors == 0) {
						  echo "Undefined";}else{ 
  
						  foreach ($authors as $author) {
							  if ($author['id'] == $book['author_id']) {
								  echo $author['name'];
							  }
						  }
					  }
					  ?>
  
				  </td>
				  <td><?=$book['description']?></td>
				  <td>
					  <?php if ($categories == 0) {
						  echo "Undefined";}else{ 
  
						  foreach ($categories as $category) {
							  if ($category['id'] == $book['category_id']) {
								  echo $category['name'];
							  }
						  }
					  }
				  
					  ?>
				  </td>
				  <td><?=$book['quantity']?></td>
				  <td><?=$book['price']?></td>
				  <td>
					  <a style="padding: .375rem 21px; width: 100px;" href="edit-book.php?id=<?=$book['id']?>" 
						 class="btn btn-warning">
						 Edit</a>
					  <div style="height: 10px;"></div>
					  <a style="background-color: green; color: white; width: 100px;" href="php/active-book.php?id=<?=$book['id']?>" 
						 class="btn">
						 Activate</a>
				  </td>
				  <td> Inactive </td>
				</tr>
			  <?php } }  ?>
			</tbody>
		</table>
	   <?php } ?>

        <?php  if ($categories == 0) { ?>
        	<div class="alert alert-warning 
        	            text-center p-5" 
        	     role="alert">
        	     <img src="img/empty.png" 
        	          width="100">
        	     <br>
			  There is no category in the database
		    </div>
        <?php }else {?>
		<h4 class="mt-5">All Categories</h4>
		<table class="table table-bordered shadow" style="background-color: white;">
			<thead>
				<tr>
					<th>#</th>
					<th>Category Name</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				$j = 0;
				foreach ($categories as $category ) {
				$j++;	
				?>
				<tr>
					<td><?=$j?></td>
					<td><?=$category['name']?></td>
					<td>
						<a href="edit-category.php?id=<?=$category['id']?>" 
						   class="btn btn-warning">
						   Edit</a>

						<a href="php/delete-category.php?id=<?=$category['id']?>" 
						   class="btn btn-danger">
					       Delete</a>
					</td>
				</tr>
			    <?php } ?>
			</tbody>
		</table>
	    <?php } ?>

	    <?php  if ($authors == 0) { ?>
        	<div class="alert alert-warning 
        	            text-center p-5" 
        	     role="alert">
        	     <img src="img/empty.png" 
        	          width="100">
        	     <br>
			  There is no author in the database
		    </div>
        <?php }else {?>
		<h4 class="mt-5">All Authors</h4>
         <table class="table table-bordered shadow" style="background-color: white;">
			<thead>
				<tr>
					<th>#</th>
					<th>Author Name</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				$k = 0;
				foreach ($authors as $author ) {
				$k++;	
				?>
				<tr>
					<td><?=$k?></td>
					<td><?=$author['name']?></td>
					<td>
						<a href="edit-author.php?id=<?=$author['id']?>" 
						   class="btn btn-warning">
						   Edit</a>

						<a href="php/delete-author.php?id=<?=$author['id']?>" 
						   class="btn btn-danger">
					       Delete</a>
					</td>
				</tr>
			    <?php } ?>
			</tbody>

			
		</table> 
		<?php } ?>

		<?php  if ($users == 0) { ?>
        	<div class="alert alert-warning 
        	            text-center p-5" 
        	     role="alert">
        	     <img src="img/empty.png" 
        	          width="100">
        	     <br>
			  There is no user in the database
		    </div>
        <?php }else {?>
		<h4 class="mt-5">All Users</h4>
         <table class="table table-bordered shadow" style="background-color: white;">
			<thead>
				<tr>
					<th>#</th>
					<th>User Name</th>
					<th>Action</th>
					<th>Status</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				$k = 0;
				
				foreach ($users as $user ) {
					$fullname = $user['fname'] . ' ' . $user['lname'];
				$k++;	

				 if($user['user_role'] == 1){ ?>

				<tr>
					<td><?=$k?></td>
					
					<td style="font-weight: bold"><?=$fullname?></td>
					<td>
						<a href="edit-user.php?id=<?=$user['id']?>" 
						   class="btn btn-warning">
						   Edit</a>

						<a href="php/delete-user.php?id=<?=$user['id']?>" 
						   class="btn btn-danger">
					       Deactivate</a>
					</td>
					<td style="font-weight: bold;">
						Active
					</td>

				</tr>




				<?php }else if($user['user_role'] == 0){ ?>

					<tr style="color: gray">
					<td><?=$k?></td>
					
					<td><?=$fullname?></td>
					<td>
						<a href="edit-user.php?id=<?=$user['id']?>" 
						   class="btn btn-warning">
						   Edit</a>

						<a style="background-color: green; color: white;border-color: green; width: 100px" href="php/active-user.php?id=<?=$user['id']?>" 
						   class="btn">
					       Activate</a>
					</td>
					<td>
						Inactive
					</td>
				</tr>

				<?php } } ?>
	
			</tbody>

			
		</table> 
		<?php } ?>
		
	</div>
	</div>
	<a href="#" id="top" class="bottop" ><abbr title="Return to top"><img src="img/top.png" class="top"  style="width: 60px;position:fixed; right: 2rem; bottom: 2rem;"></abbr></a>
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