<?php 
session_start();

include "db_conn.php";

include "php/func-book.php";
$books = get_all_books($conn);

include "php/func-author.php";
$authors = get_all_author($conn);

include "php/func-category.php";
$categories = get_all_categories($conn);

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

    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <link rel='stylesheet' href='css/jAlert.css'>
        <link rel="stylesheet" href="css/stylez.css">
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
		          <a class="nav-link"  
		             href="index.php">Store</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link active" 
		             aria-current="page" 
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
		             href="userlogin.php">Login</a>
		          <?php } ?>

		        </li>
		      </ul>
		    </div>
		  </div>
		</nav>
		<div style="height: 20px"></div>
  

  <div class="container-fluid mb-4 shadowbox" style="background-color:#ffb545;width:65%;" data-aos="fade-up" data-aos-duration="1700">
    <div class="row">
      <div class="col">
        <form class="pt-2" style="width:100%;text-align: center;font-family: 'Bitter', serif;" id="myform">
            <h4 class = "mt-4 mb-4 text-center" style="font-family: 'Bitter', serif;font-size:2.2rem;color:white;text-shadow:2px 2px 1px black;"><strong>Website Feedbacks / Company Inquiry</strong></h4>
            <input type="text" placeholder="Name" required name="Name" class="formneeds">
            <input type="text" placeholder="Email" required name="Email" class="formneeds">
            <input type="number" placeholder="Contact Number" required name="Number" class="formneeds">
            <input type="text" placeholder="Subject" required name="Subject" class="formneeds">
            <textarea name="Text1" cols="40" rows="5" placeholder="Message (Optional)"class="tarea"></textarea>
            <br>
            <button class="bttn btn" type="submit" data-jAlert data-title="THANK YOU!" data-theme="red" data-content="Thank You For Visiting and Giving a Feedback To My Webpage!" >SEND MESSAGE</button>
        </form>
      </div>
    </div>
  </div>
  <footer class="page-footer font-small blue" style="background-color: #F68901; color: white; ">


      <div class="footer-copyright text-center py-3">© 2022 Copyright:
         <a href="#" style="text-decoration: none; color: white;"> Pages for All Ages</a>
      </div>


   </footer>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src='js/jAlert.js'></script>
  <script src='js/jAlert-functions.js'></script>
  <script src="js/script.js"></script>
  
  <script>
  $(function(){
  $.jAlert('attach');
  });
  </script>
             
			  
			  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

      <script>
  AOS.init();
</script>
			</body>
</html>