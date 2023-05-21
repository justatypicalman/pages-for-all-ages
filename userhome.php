<?php
session_start();
if (isset($_SESSION['users_id']) &&
    isset($_SESSION['users_email'])) {
        $user_id = $_SESSION['users_id'];

	include "db_conn.php";

include "php/func-book.php";
$books = get_active_books($conn);

include "php/func-author.php";
$authors = get_all_author($conn);

include "php/func-category.php";
$categories = get_all_categories($conn);

if (isset($_POST['add_to_cart'])) {

    $book_name = $_POST['book_name'];
    $book_price = $_POST['book_price'];
    $book_image = $_POST['book_image'];
    $book_quantity = $_POST['book_quantity'];
 
    $select_cart = mysqli_query($link, "SELECT * FROM `cart` WHERE name = '$book_name' AND user_id = '$user_id'") or die('query failed');
 
    if (mysqli_num_rows($select_cart) > 0) {
       $message[] = 'product already added to cart!';
    } else {
       mysqli_query($link, "INSERT INTO `cart`(user_id, name, price, image, quantity) VALUES('$user_id', '$book_name', '$book_price', '$book_image', '$book_quantity')") or die('query failed');
       $message[] = 'product added to cart!';
    }
 };
 
 if (isset($_POST['update_cart'])) {
    $update_quantity = $_POST['cart_quantity'];
    $update_id = $_POST['cart_id'];
    mysqli_query($link, "UPDATE `cart` SET quantity = '$update_quantity' WHERE id = '$update_id'") or die('query failed');
    $message[] = 'cart quantity updated successfully!';
 }
 
 if (isset($_GET['remove'])) {
    $remove_id = $_GET['remove'];
    mysqli_query($link, "DELETE FROM `cart` WHERE id = '$remove_id'") or die('query failed');
    header('location:index.php');
 }
 
 if (isset($_GET['delete_all'])) {
    mysqli_query($link, "DELETE FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
    header('location:index.php');
 }
 
 ?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Pages for all Ages</title>
	<link rel="icon" type="image/x-icon" href="img/biggerlogowithborder.png">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
	<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

	<link rel="stylesheet" href="css/style.css">
	<style>
		body {
			background: url("img/backgroundbookstore.png") no-repeat center center fixed;
			-webkit-background-size: cover;
			-moz-background-size: cover;
			-o-background-size: cover;
			background-size: cover;
		}
        
	</style>
</head>

<body>
	<div class="container-fluid">
		<nav style="border-radius: 0 0 20px 20px;" class="navbar navbar-expand-lg navbar-light bg-light sticky-top" style="width: 100%;">
			<div class="container-fluid" style="width: 100%;">
				<a class="navbar-brand" href="index.php"><img class="logo" style="width: 70px; padding-right: 10px;" src="img/biggerlogowithborder.png">Pages for all Ages</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav ms-auto mb-2 mb-lg-0">
						<li class="nav-item">
							<a class="nav-link active" aria-current="page" href="userhome.php">Books</a>
						</li>
                        <li class="nav-item">
							<a class="nav-link" href="usercart.php">My Cart</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="usercontact.php">Contact Us</a>
						</li>
                        
						<li class="nav-item">
							<a class="nav-link" href="userabout.php">About Us</a>
						</li>
                        
						<li class="nav-item">
							<?php if (isset($_SESSION['users_id'])) { ?>
                                
								<a class="nav-link" href="userlogout.php">Logout</a>
							<?php } else { ?>
								<a class="nav-link" href="userlogin.php">Login</a>
							<?php } ?>

						</li>
					</ul>
				</div>
			</div>
		</nav>
    <div class="container">
			<div data-aos="fade-down">
				<form action="search.php" method="get" style="width: 100%; max-width: 30rem">

					<div class="input-group my-5">
						<input type="text" class="form-control" name="key" placeholder="Search Book..." aria-label="Search Book..." aria-describedby="basic-addon2">

						<button class="input-group-text
		                 btn btn-primary" id="basic-addon2">
							<img src="img/search.png" width="20">

						</button>
					</div>
				</form>
			</div>

			<div class="d-flex pt-3">

				<?php if ($books == 0) { ?>
					<div class="alert alert-warning 
        	            text-center p-5" role="alert">
						<img src="img/empty.png" width="100">
						<br>
						There are currently no books.
					</div>
				<?php } else { ?>
					<div class="pdf-list d-flex flex-wrap" data-aos="fade-right" data-aos-duration="1500">
						<?php foreach ($books as $book) { ?>
							<div class="card m-1">
                            <form method="post" action="">
                            
                           
                           <input type="hidden" name="book_image" value="<?php echo $book['cover']; ?>">
                           <input type="hidden" name="book_name" value="<?php echo $book['title']; ?>">
                           <input type="hidden" name="book_price" value="<?php echo $book['price']; ?>">

								<img src="uploads/cover/<?= $book['cover'] ?>" class="card-img-top" style="height: 450px;">
								<div class="card-body">
									<h5 class="card-title">
										<?= $book['title'] ?>
									</h5>
									<p class="card-text">
										<i><b>By:
												<?php foreach ($authors as $author) {
													if ($author['id'] == $book['author_id']) {
														echo $author['name'];
														break;
													}
												?>

												<?php } ?>
												<br></b></i>
										<?= $book['description'] ?>
										<br><i><b>Category:
												<?php foreach ($categories as $category) {
													if ($category['id'] == $book['category_id']) {
														echo $category['name'];
														break;
													}
												?>

												<?php } ?>
												<br></b></i>
									</p>
									<?php if (isset($_SESSION['users_id'])) { ?>
                                        <div class="price">P<?php echo $book['price']; ?></div>
                                        <input type="number" min="1" value = "1" name="book_quantity">
										<input type="submit" value="Add to Cart" name="add_to_cart" class="btn btn-success">
                                    </form>
									
									<?php } ?>
								</div>




							</div>



                       
						<?php } ?>
					</div>
				<?php } ?>

				<div class="category">
					<div class="list-group" data-aos="fade-left" data-aos-duration="1800">
						<?php if ($categories == 0) {
						} else { ?>
							<a href="#" class="list-group-item list-group-item-action active">Category</a>
							<?php foreach ($categories as $category) { ?>

								<a href="category.php?id=<?= $category['id'] ?>" class="list-group-item list-group-item-action">
									<?= $category['name'] ?></a>
						<?php }
						} ?>
					</div>

					<div class="list-group mt-5" data-aos="fade-left" data-aos-duration="2000">
						<?php if ($authors == 0) {
						} else { ?>
							<a href="#" class="list-group-item list-group-item-action active">Author</a>
							<?php foreach ($authors as $author) { ?>

								<a href="author.php?id=<?= $author['id'] ?>" class="list-group-item list-group-item-action">
									<?= $author['name'] ?></a>
						<?php }
						} ?>
					</div>
				</div>
			</div>
		</div>
	</div>
    <footer class="page-footer font-small blue" style="background-color: #F68901; color: white; ">


      <div class="footer-copyright text-center py-3">© 2022 Copyright:
         <a href="#" style="text-decoration: none; color: white;"> Pages for All Ages</a>
      </div>


   </footer>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

	<script>
		AOS.init();
	</script>
</body>
</html>
        <?php }else{
  header("Location: userlogin.php");
  exit;
} ?>