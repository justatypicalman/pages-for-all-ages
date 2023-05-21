<?php

include "db_conn.php";
session_start();
$user_id = $_SESSION['users_id'];

if (!isset($user_id)) {
   header('location:userlogin.php');
};

if (isset($_GET['logout'])) {
   unset($user_id);
   session_destroy();
   header('location:userlogin.php');
};

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
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Pages for all Ages</title>
   <link rel="icon" type="image/x-icon" href="img/biggerlogowithborder.png">
   <link rel="stylesheet" href="css/styles.css">
   <link rel="stylesheet" href="css/style.css">
   <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
   <style>
      .highlight {
         background-color: #126D76;
         color: white;
      }

		body {
			background: url("img/backgroundbookstore.png") no-repeat center center fixed;
			-webkit-background-size: cover;
			-moz-background-size: cover;
			-o-background-size: cover;
			background-size: cover;
		}

   </style>
</head>

<body style="background-color: rgba(200,200,200, 0.5);">
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
							<a class="nav-link" href="userhome.php">Books</a>
						</li>
                        <li class="nav-item">
							<a class="nav-link active" aria-current="page" href="userproducts.php">Buy</a>
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
   <div class="container-fluid">
      <div class="container">
         <?php
         if (isset($message)) {
            foreach ($message as $message) {
               echo '<div class="message" onclick="this.remove();">' . $message . '</div>';
            }
         }
         ?>

         <div class="container">

            <div class="dropdown" style="width: 100px; position: absolute; top: 150px; left: 50px;">
               <button style="border-radius: 10px; background-color: #126D76;color: white;" onclick="myFunction()" class="dropbtn">Categories</button>
               <div id="myDropdown" class="dropdown-content">
                  <a href="category.php?id=1">
                     <option>Electronic Devices</option>
                  </a>
                  <a href="category.php?id=2">
                     <option>Groceries & Pets</option>
                  </a>
                  <a href="category.php?id=3">
                     <option>Women's Fashion & Accessories</option>
                  </a>
                  <a href="category.php?id=4">
                     <option>Sports & Lifestyle</option>
                  </a>
                  <a href="category.php?id=5">
                     <option>Kid's Fashion</option>
                  </a>

               </div>

            </div>
            <br><br>
            <div class="products">
                <center>
               <h1 class="heading" style ="color: white;">Products</h1>
</center>
               <div class="box-container" data-aos="fade-right">

                  <?php

                  $select_product = mysqli_query($link, "SELECT * FROM `books` WHERE book_status = 1") or die('query failed');
                  if (mysqli_num_rows($select_product) > 0) {
                     while ($fetch_product = mysqli_fetch_assoc($select_product)) {
                  ?>
                        <form method="post" class="box" action="">
                           <img src="uploads/cover/<?php echo $fetch_product['cover']; ?>" alt="">
                           <div class="name">
                              <p><?php echo $fetch_product['title']; ?></p>
                           </div>
                           <div class="price">P<?php echo $fetch_product['price']; ?></div>
                           <input type="number" min="1" name="book_quantity" value="1">
                           <input type="hidden" name="book_image" value="<?php echo $fetch_product['cover']; ?>">
                           <input type="hidden" name="book_name" value="<?php echo $fetch_product['title']; ?>">
                           <input type="hidden" name="book_price" value="<?php echo $fetch_product['price']; ?>">
                           <input type="submit" value="add to cart" name="add_to_cart" class="btn">
                        </form>
                  <?php
                     };
                  };
                  ?>

               </div>

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
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
   <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
   <script>
      AOS.init();
   </script>
   <script>
      $(document).ready(function() {
         $('#search').keyup(function() {
            searchHighlight($(this).val());
         });
      })

      function myFunction() {
         document.getElementById("myDropdown").classList.toggle("show");
      }

      function searchHighlight(searchText) {
         if (searchText) {
            $(".highlight").removeClass("highlight");
            $("p").each(function(index, content) {
               var content = $(content).text();
               var searchExp = new RegExp(searchText, "ig");
               var matches = content.match(searchExp);
               if (matches) {
                  $(this).html(content.replace(searchExp, function(match) {
                     return "<span class='highlight'>" + match + "</span>";
                  }));
               }
            })
         } else
            $(".highlight").removeClass("highlight");
      }
      window.onclick = function(event) {
         if (!event.target.matches('.dropbtn')) {
            var dropdowns = document.getElementsByClassName("dropdown-content");
            var i;
            for (i = 0; i < dropdowns.length; i++) {
               var openDropdown = dropdowns[i];
               if (openDropdown.classList.contains('show')) {
                  openDropdown.classList.remove('show');
               }
            }
         }
      }
   </script>
</body>

</html>