<?php 
session_start();

# If not category ID is set
if (!isset($_GET['id'])) {
	header("Location: index.php");
	exit;
}

# Get category ID from GET request
$id = $_GET['id'];

# Database Connection File
include "db_conn.php";

# Book helper function
include "php/func-book.php";
$books = get_books_by_category($conn, $id);

# author helper function
include "php/func-author.php";
$authors = get_all_author($conn);

# Category helper function
include "php/func-category.php";
$categories = get_all_categories($conn);
$current_category = get_category($conn, $id);
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
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?=$current_category['name']?></title>
	<link rel="icon" type="image/x-icon" href="img/biggerlogowithborder.png">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
	<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="css/style.css">
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
	<?php if (isset($_SESSION['user_id'])) {?>
	<nav style="border-radius: 0 0 20px 20px;" class="navbar navbar-expand-lg navbar-light bg-light sticky-top" style="width: 100%;">
		  <div class="container-fluid" style="width: 100%;">
		    <a class="navbar-brand" href="index.php"><img class="logo" style="width: 70px; padding-right: 10px;" src="img/biggerlogowithborder.png">Pages for all Ages</a>
		    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		      <span class="navbar-toggler-icon"></span>
		    </button>
		    <div class="collapse navbar-collapse" 
		         id="navbarSupportedContent">
		      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
		        <li class="nav-item">
		          <a class="nav-link active" 
		             aria-current="page" 
		             href="index.php">Store</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link" 
		             href="contact.php">Contact</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link" 
		             href="about.php">About</a>
		        </li>
		        <li class="nav-item">
		          <?php if (isset($_SESSION['user_id'])) {?>
		          	<a class="nav-link" 
		             href="admin.php">Admin</a>
		          <?php }else{ ?>
		          <a class="nav-link" 
		             href="login.php">Login</a>
		          <?php } ?>

		        </li>
		      </ul>
		    </div>
		  </div>
		</nav>
				<?php }else if (isset($_SESSION['users_id'])) {;?>
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
							<a class="nav-link" href="user3">My Cart</a>
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






					<?php } ?>
		<div class="container">
		<h1 class="display-4 p-3 fs-3" style="color: white"> 
			<a href="index.php"
			   class="nd">
				<img src="img/back-arrow.PNG" 
				     width="35">
			</a>
		   <?=$current_category['name']?>
		</h1>
		<div class="d-flex pt-3">
			<?php if ($books == 0){ ?>
				<div class="alert alert-warning 
        	            text-center p-5" 
        	     role="alert">
        	     <img src="img/empty.png" 
        	          width="100">
        	     <br>
				 There are currently no books.
		       </div>
			   <div style="width: 723px;"></div>
			<?php }else{ ?>
			<div class="pdf-list d-flex flex-wrap" data-aos="fade-right">
				<?php foreach ($books as $book) { ?>
				<div class="card m-1">
					<img src="uploads/cover/<?=$book['cover']?>"
					     class="card-img-top">
					<div class="card-body">
						<h5 class="card-title">
							<?=$book['title']?>
						</h5>
						<p class="card-text">
							<i><b>By:
								<?php foreach($authors as $author){ 
									if ($author['id'] == $book['author_id']) {
										echo $author['name'];
										break;
									}
								?>

								<?php } ?>
							<br></b></i>
							<?=$book['description']?>
							<br><i><b>Category:
								<?php foreach($categories as $category){ 
									if ($category['id'] == $book['category_id']) {
										echo $category['name'];
										break;
									}
								?>

								<?php } ?>
							<br></b></i>
						</p>
						<?php if (isset($_SESSION['users_id'])) { ?>
							</form>
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
			<div class="list-group">
				<?php if ($categories == 0){
				}else{ ?>
				<a href="#"
				   class="list-group-item list-group-item-action active">Category</a>
				   <?php foreach ($categories as $category ) {?>
				  
				   <a href="category.php?id=<?=$category['id']?>"
				      class="list-group-item list-group-item-action">
				      <?=$category['name']?></a>
				<?php } } ?>
			</div>

			<div class="list-group mt-5">
				<?php if ($authors == 0){
				}else{ ?>
				<a href="#"
				   class="list-group-item list-group-item-action active">Author</a>
				   <?php foreach ($authors as $author ) {?>
				  
				   <a href="author.php?id=<?=$author['id']?>"
				      class="list-group-item list-group-item-action">
				      <?=$author['name']?></a>
				<?php } } ?>
			</div>
		</div>
		</div>
	</div>
	</div>
	<a href="#" id="top" class="bottop"><abbr title="Return to top"><img src="img/top.png" class="top" style="position:fixed; right: 2rem; bottom: 2rem;"></abbr></a>
        
             
			  <footer class="page-footer font-small blue" style="background-color: #F68901; color: white; ">


<div class="footer-copyright text-center py-3">© 2022 Copyright:
   <a href="#" style="text-decoration: none; color: white;"> Pages for All Ages</a>
</div>


</footer>
			  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
      <script>
  AOS.init();
</script>
</body>
</html>