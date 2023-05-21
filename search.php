<?php 
session_start();

# If search key is not set or empty
if (!isset($_GET['key']) || empty($_GET['key'])) {
	header("Location: index.php");
	exit;
}
$key = $_GET['key'];

# Database Connection File
include "db_conn.php";

# Book helper function
include "php/func-book.php";
$books = search_books($conn, $key);

# author helper function
include "php/func-author.php";
$authors = get_all_author($conn);

# Category helper function
include "php/func-category.php";
$categories = get_all_categories($conn);

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Book Store</title>

    <!-- bootstrap 5 CDN-->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <!-- bootstrap 5 Js bundle CDN-->
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
		             href="#">Contact</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link" 
		             href="#">About</a>
		        </li>
		        <li class="nav-item">
		          <?php if (isset($_SESSION['user_id'])) {?>
		          	<a class="nav-link" 
		             href="admin.php">Admin</a>
		          <?php }else{ ?>
		          <a class="nav-link" 
		             href="userlogin.php">Login</a>
		          <?php } ?>

		        </li>
		      </ul>
		    </div>
		  </div>
		</nav>
		<div class="container"><br>
		Search result for <b><?=$key?></b>

		<div class="d-flex pt-3">
			<?php if ($books == 0){ ?>
				<div class="alert alert-warning 
        	            text-center p-5 pdf-list" 
        	     role="alert">
        	     <img src="img/empty-search.png" 
        	          width="100">
        	     <br>
				  The key <b>"<?=$key?>"</b> didn't match to any record
		           in the database
			  </div>
			<?php }else{ ?>
			<div class="pdf-list d-flex flex-wrap">
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
                       <a href="uploads/files/<?=$book['file']?>"
                          class="btn btn-success">Open</a>

                        <a href="uploads/files/<?=$book['file']?>"
                          class="btn btn-primary"
                          download="<?=$book['title']?>">Download</a>
					</div>
				</div>
				<?php } ?>
			</div>
		<?php } ?>
		</div>
	</div>
	</div>
	<footer id="footer" class="text-center text-lg-start" style="background-color: #F68901; color: white;" data-aos="flip-up" data-aos-duration="2500">
                <!-- Section: Social media -->
                <section
                  class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom"
                >
                  <!-- Left -->
                  <div class="me-5 d-none d-lg-block">
                    <span>Get connected with us:</span>
                  </div>
                 
                </section>
                <!-- Section: Social media -->
              
                <!-- Section: Links  -->
                <section class="">
                  <div class="container text-center text-md-start mt-5">
                    <!-- Grid row -->
                    <div class="row mt-3">
                      <!-- Grid column -->
                      <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                        <!-- Content -->
                        <h6 class="text-uppercase fw-bold mb-4">
                          <img src="img/biggerlogowithborder.png" style="width: 30px;">&nbsp;&nbsp;Pages for all Ages
                        </h6>
                        <p>
                            Hireplicity is a custom software development and outsourcing company based in Mandaue City, Cebu with office in Califronia. With over 10 years of proven experience, we make sure that we only deliver excellent services and products.
                        </p>
                      </div>
                      <!-- Grid column -->
              
                      <!-- Grid column -->
                      <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">
                          Contents
                        </h6>
                        <p>
                          Books
                        </p>
                        <p>
                          Categories
                        </p>
                        <p>
                          Author
                        </p>
                      </div>
                      <!-- Grid column -->
              
                      <!-- Grid column -->
                      <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">
                          Useful links
                        </h6>
                        <p>
                          <a href="#" class="text-reset">Home</a>
                        </p>
                        <p>
                          <a href="contact.php" class="text-reset">Contact</a>
                        </p>
                        <p>
                          <a href="about.php" class="text-reset">About</a>
                        </p>
                        <p>
                          <a href="#start" class="text-reset">Back to Top</a>
                        </p>
                      </div>
                      <!-- Grid column -->
              
                      <!-- Grid column -->
                      <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">
                          Contact
                        </h6>
                        <p><i class="fas fa-home me-3"></i>Maybunga, Pasig City, Philippines</p>
                        <p>
                          <i class="fas fa-envelope me-3"></i>
                          pagesforallages@gmail.com
                        </p>
                        <p><i class="fas fa-phone me-3"></i> +639309939976</p>
                      </div>
                      <!-- Grid column -->
                    </div>
                    <!-- Grid row -->
                  </div>
                </section>
                <!-- Section: Links  -->
              
                <!-- Copyright -->
                <div class="text-center p-4">
                  © 2022 Copyright:
                  <a class="text-reset fw-bold" href="#">Pages for all Ages</a>
                </div>
                <!-- Copyright -->
              </footer>
</body>
</html>