<?php
date_default_timezone_set('Asia/Manila');
session_start();
$user_id = $_SESSION['users_id'];
include "db_conn.php";
if (!isset($user_id)) {
    header('location:userlogin.php');
};

if (isset($_GET['logout'])) {
    unset($user_id);
    session_destroy();
    header('location:userlogin.php');
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
    header('location:usercart.php');
}

if (isset($_GET['delete_all'])) {
    mysqli_query($link, "DELETE FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
    header('location:usercart.php');
}

if (isset($_GET['checkout'])) {
    $trans_id = $_GET['checkout'];
    $date = date("Y-m-d | h:i:sa");
    $totalprice = 0;
    $totalorders = "";
    $cart_query = mysqli_query($link, "SELECT * FROM `cart` WHERE user_id = '$trans_id'") or die('Query Failed');
        $grand_total = 0;
        if (mysqli_num_rows($cart_query) > 0) {
            while ($fetch_cart = mysqli_fetch_assoc($cart_query)) {
                $name = $fetch_cart['name'];
                $price =$fetch_cart['price'];
                $quantity = $fetch_cart['quantity'];
                $order = $quantity . " pc/s " . $name;
                $totalprice += $price;
                $totalorders = $totalorders . $order . "<br>";
                $q_query = mysqli_query($link, "SELECT * FROM `books` WHERE title = '$name'") or die('Query Failed');
                if (mysqli_num_rows($q_query) > 0) {
                    while ($fetch_q = mysqli_fetch_assoc($q_query)) {

                            $qbooks = $fetch_q['quantity'];
                            $quantitynow = $qbooks - $quantity;
                            $bookid = $fetch_q['id'];

                            mysqli_query($link, "UPDATE `books` SET quantity = '$quantitynow' WHERE id = '$bookid'");

                    }

                    }




            }
    $sql = "INSERT INTO trans (user_id, allorders, totalprice, dateCheckedOut) VALUES ('$trans_id','$totalorders','$totalprice','$date')";
    mysqli_query($link, $sql);
    mysqli_query($link, "DELETE FROM `cart` WHERE user_id = '$trans_id'") or die('query failed');

    header('location:usercart.php');
}
}

if (isset($_SESSION['users_id']) &&
    isset($_SESSION['users_email'])) {


	include "db_conn.php";
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
        td{
            font-weight: bold;
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
							<a class="nav-link" href="userhome.php">Books</a>
						</li>
                        <li class="nav-item">
							<a class="nav-link active" aria-current="page" href="usercart.php">My Cart</a>
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
    </div>


<div class="container">
<div class="shopping-cart">
<center>
<h1 class="heading" style="color: white">Shopping Cart</h1>
</center>
<table class="table table-bordered shadow" style="background-color: white;">
    <thead>
        <th>Image</th>
        <th>Name</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Total Price</th>
        <th>Action</th>
    </thead>
    
    <tbody>
        <?php
        $cart_query = mysqli_query($link, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('Query Failed');
        $grand_total = 0;
        if (mysqli_num_rows($cart_query) > 0) {
            while ($fetch_cart = mysqli_fetch_assoc($cart_query)) {
        ?>
                <tr>
                    <td style="width: 80px"><img src="uploads/cover/<?php echo $fetch_cart['image']; ?>" height="100" alt=""></td>
                    <td><?php echo $fetch_cart['name']; ?></td>
                    <td>P<?php echo $fetch_cart['price']; ?></td>
                    <td>
                        <form action="" method="post">
                            <input type="hidden" name="cart_id" value="<?php echo $fetch_cart['id']; ?>">
                            <input type="number" min="1" name="cart_quantity" value="<?php echo $fetch_cart['quantity']; ?>">
                            <input type="submit" name="update_cart" value="Update" style="background-color: #f68901; border-radius: 5px; padding: 5px 10px;color: white; border: 1px solid #f68901" class="option-btn">
                        </form>
                    </td>
                    <td>P<?php echo $sub_total = ($fetch_cart['price'] * $fetch_cart['quantity']); ?></td>
                    <td><a href="usercart.php?remove=<?php echo $fetch_cart['id']; ?>" class="delete-btn" style="background-color: red; color: white; border-radius: 5px; padding: 5px 10px; border: 1px solid red; text-decoration: none;" onclick="return confirm('Remove this item from the cart?');">Remove</a></td>
                </tr>
        <?php
                $grand_total += $sub_total;
            }
        } else {
            echo '<tr><td style="padding:20px; text-transform:capitalize;" colspan="6">No Item added</td></tr>';
        }
        ?>
        <tr class="table-bottom">
            <td colspan="4">Grand Total :</td>
            <td>P<?php echo $grand_total; ?></td>
            <td><a style="background-color: red; color: white; border-radius: 5px; padding: 5px 10px; border: 1px solid red; text-decoration: none;" href="usercart.php?delete_all" onclick="return confirm('Delete All items from the cart?');" class="delete-btn <?php echo ($grand_total > 1) ? '' : 'disabled'; ?>">Delete All</a></td>
        </tr>
    </tbody>
</table>

<div class="cart-btn">
    
    <a href="usercart.php?checkout=<?php echo $user_id;?>" style="background-color: #f68901; color: white;" class="btn <?php echo ($grand_total > 1) ? '' : 'disabled'; ?> " onclick="return confirm('Are you sure you want to proceed to checkout?');">Proceed to Checkout</a>

</div>

</div>
</div>





        <?php }else{
  header("Location: userlogin.php");
  exit;
} ?>