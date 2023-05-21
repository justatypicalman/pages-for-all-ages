<?php  
session_start();
include "db_conn.php";
if (isset($_SESSION['user_id']) &&
    isset($_SESSION['user_email'])) {
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Add Author</title>
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
		          <a class="nav-link active" aria-current="page" 
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
<div class="shopping-cart">
<center>
<h1 class="heading" style="color: white">Transaction History</h1>
</center>
<table class="table table-bordered shadow" style="background-color: white;">
    <thead>
        <th>ID</th>
        <th>Name</th>
        <th>Orders</th>
        <th>Total Price</th>
        <th>Date and Time</th>
    </thead>
    
    <tbody>
        <?php
        $trans_query = mysqli_query($link, "SELECT * FROM `trans`") or die('Query Failed');
        if (mysqli_num_rows($trans_query) > 0) {
            while ($fetch_cart = mysqli_fetch_assoc($trans_query)) {
                $id = $fetch_cart['user_id'];
                $user_query=mysqli_query($link, "SELECT * FROM `users` WHERE id = '$id' LIMIT 1");
                if (mysqli_num_rows($user_query) > 0) {
                    while ($fetch_user = mysqli_fetch_assoc($user_query)) {
                        $name = $fetch_user['fname'] . " " . $fetch_user['lname']; 
        ?>      
                <tr>
                    <td><?php echo $fetch_cart['id']; ?></td>
                    <td><?php echo $name; ?></td>
                    <td><?php echo $fetch_cart['allorders']; ?></td>
                    <td>P<?php echo $fetch_cart['totalprice']; ?></td>
                    <td><?php echo $fetch_cart['dateCheckedOut']; ?></td>                 
                </tr>
        <?php
                }
                }
            }
        } else {
            echo '<tr><td style="padding:20px; text-transform:capitalize;" colspan="6">No List added</td></tr>';
        }
        ?>
    </tbody>
</table>



</div>
<div class="shopping-cart">
<center>
    <h1 class="heading" style="color: white">Inventory of Books</h1>
</center>
<table class="table table-bordered shadow" style="background-color: white;">
    <thead>
        <th>Book Title</th>
        <th>Author</th>
        <th>Genre</th>
        <th>Quantity</th>
        <th>Price</th>
    </thead>
    
    <tbody>
        <?php
        $book_query = mysqli_query($link, "SELECT * FROM `books` WHERE quantity != 0") or die('Query Failed');
        if (mysqli_num_rows($book_query) > 0) {
            while ($fetch_cart = mysqli_fetch_assoc($book_query)) {
                $categoryid = $fetch_cart['category_id'];
                $authorid = $fetch_cart['author_id'];
                $author_query=mysqli_query($link, "SELECT * FROM `authors` WHERE id = '$authorid'");
                if (mysqli_num_rows($author_query) > 0) {
                    while ($fetch_auth = mysqli_fetch_assoc($author_query)) {
                        $cat_query = mysqli_query($link, "SELECT * FROM `categories` WHERE id = '$categoryid'") or die('Query Failed');
                        if (mysqli_num_rows($cat_query) > 0) {
                            while ($fetch_cat = mysqli_fetch_assoc($cat_query)) {
        ?>      
                <tr>
                    <td><?php echo $fetch_cart['title']; ?></td>
                    <td><?php echo $fetch_auth['name']; ?></td>
                    <td><?php echo $fetch_cat['name']; ?></td>
                    <td><?php echo $fetch_cart['quantity']; ?> pcs</td>
                    <td>P<?php echo $fetch_cart['price']; ?></td>                 
                </tr>
        <?php
                            }
                            }
                }
                }
            }
        } else {
            echo '<tr><td style="padding:20px; text-transform:capitalize;" colspan="6">No List added</td></tr>';
        }
        ?>
    </tbody>
</table>




</div>




</div>
<a href="#"  id="top" class="bottop" ><abbr title="Return to top"><img src="img/top.png" class="top"  style="width: 60px;position:fixed; right: 2rem; bottom: 2rem;"></abbr></a>



			</body>
</html>

<?php }else{
  header("Location: login.php");
  exit;
} ?>