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
    <script src="https://kit.fontawesome.com/d876f86ab9.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/about.css">
    <link rel="stylesheet" href="css/style.css">
<style>
body{
	background: url("img/backgroundbookstore.png") no-repeat center center fixed;
			-webkit-background-size: cover;
        	-moz-background-size: cover;
        	-o-background-size: cover;
       		background-size: cover;
}

.pserve{
    text-align:center;
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
		    <div class="collapse navbar-collapse" 
		         id="navbarSupportedContent">
		      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
		        <li class="nav-item">
		          <a class="nav-link" 
		             href="index.php">Store</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link" 
		             href="contact.php">Contact</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link active" 
		             aria-current="page" 
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
        <br>
        
		<div class="container">
            <div class="filler" style="height: 10px;"></div>
		<div class="container">
            <div class="row">
                <div class="col" data-aos="fade-right">
                    <p style="font-weight: bold; font-size: 40px;text-align: center; color: white;">WE COMMIT TO</p>
                </div>
            </div>
            <div class="row">
                <div class="col" data-aos="fade-left">
                    <div id="line" style="margin: auto;"></div>
                </div>
            </div>
            </div>
        
        
        <div class="filler" style="height: 50px"></div>
        <!-- 1st -->
        <div class="container" id="first">
            <div class="row justify-content-md-center" style="padding-bottom: 60px;">
                <div class="col">
                    <div class="container" data-aos="fade-right" data-aos-duration="2000">
                        <div class="row">
                            <div class="col shadow-6" id="framef"  style="border-radius: 15px 15px 50px 50p; height: 450px"><center>
                            <br>
                            <br>
                            
                                    <i class="fa-solid fa-people-line" id="i1" style="text-align:center;font-size: 100px;"></i>
                                <br><br>
                                <br>
                                <br>
                                <p style="font-weight: bold; font-size: 25px">Our Customers</p>
                            </center>
                                <p class="pserve">Provide the highest standards of customer service.</p>
                            </div>                            
                        </div>
                    </div>     
                </div>
                <div class="col">
                    <div class="container" data-aos="fade-up" data-aos-duration="2000">
                        <div class="row">
                            <div class="col shadow-6" id="frames" style="height: 450px;">
                            <br>
                            <br>
                                <center>
                                    <i class="fa-solid fa-book-open" id="i2" style="text-align:center;font-size: 100px;"></i>
                                <br><br><br>
                            <br>
                                <p style="font-weight: bold; font-size: 25px">Our Products</p></center>
                                <p class="pserve">Offer a wide range of relevant and quality products.</p>
                            </div>
                        </div>
                    </div> 
                </div>
                <div class="col">
                    <div class="container" data-aos="fade-left" data-aos-duration="2000">
                        <div class="row">
                            <div class="col shadow-6" id="framel" style="height: 450px">
                            <br>
                            <br>
                                <center>
                                    <i class="fa-solid fa-people-carry-box" id="i3" style="text-align:center;font-size: 100px;"></i>
                                    <br>
                            <br>
                                <br><br>
                                <p style="font-weight: bold; font-size: 25px">Our People</p></center>
                                <p class="pserve">Create Programs for the development and advancement of our highly productive employees.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>




        </div>         
            <div class="filler" style="height: 100px"></div>
            <div class="container-fluid" style="background-color: white; width: 100%">
                <div class="container" style="background-color: white; width: 100%">
                    <div class="filler" style="height: 50px"></div>
                <div class="row">
                    <div class="col" data-aos="fade-right">
                        <p style="font-weight: bold; font-size: 30px;text-align: center;">Outstanding Services</p>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col" data-aos="fade-left">
                        <div id="line2" style="margin: auto;"></div>
                </div>
                
                </div>
                <div class="filler" style="height: 50px"></div>
                <div class="row">
                    <div class="col">
                        <div class="container">
                            <div class="row">
                                <div class="col-1">
                                </div>

                                <div class="col">
                                    <div id="tv" class="num1" data-aos="fade-up-left">
                                        <div class="filler" style="height: 50px"></div>
                                        <center>
                                            <img src="img/2.webp" class="n1" style="width: 200px;">
                                            <div class="filler" style="height: 57px"></div>
                                            <div class="container" style="width: 300px">
                                                <p style="font-weight: bold; font-size: 23px">Blooming Potential</p>
                                                <p style="font-size: 18px;font-weight: 600;color: #374361">We are Pages For All Ages, a self-made store by a small group of Information Technology students. Our store features different books from various genres and authors.</p>
                                            </div>
                                        </center>
                                          
                                        </div>
                                </div>

                                <div class="col">
                                    <div id="tv" class="num2" data-aos="fade-up-left" data-aos-duration="2000">
                                        <div class="filler" style="height: 80px"></div>
                                        <center>
                                            <img src="img/1.webp" class="n2" style="width: 170px;">
                                            <div class="filler" style="height: 35px"></div>
                                            <div class="container" style="width: 300px">
                                                <p style="font-weight: bold; font-size: 27px">Customer Satisfaction</p>
                                                <p style="font-size: 18px;font-weight: 600;color: #374361">We mainly focus on the satisfaction of our customers regarding our services. Pages For All Ages is guaranteed to find and provide you with the book that you're looking for.
</p>
                                            </div>
                                        </center>

                                          
                                        </div>
                                </div>
                                <div class="filler" style="height: 100px"></div>
                            </div>
                        </div>
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
              <a href="#" id="top" class="bottop" ><abbr title="Return to top"><img src="img/top.png" class="top"  style="position:fixed; right: 2rem; bottom: 2rem;"></abbr></a>
       
	<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

      <script>
  AOS.init();
</script>
<script>
	
        $(document).ready(function(){
            $('#framef').mouseenter(function(){
                $(".fa-people-line").css("color", "#ff6a00");
            }).mouseleave(function(){
                $(".fa-people-line").css("color", "#e68c55");
            });
            $('#frames').mouseenter(function(){
                $(".fa-book-open").css("color", "#ff6a00");
            }).mouseleave(function(){
                $(".fa-book-open").css("color", "#e68c55");
            });
            $('#framel').mouseenter(function(){
                $(".fa-people-carry-box").css("color", "#ff6a00");
            }).mouseleave(function(){
                $(".fa-people-carry-box").css("color", "#e68c55");
            });
            $('.num1').hover(function(){

$('.n1').css("transform", "scale(1.2)");
},function(){
    $('.n1').css("transform","scale(1)"	);
    });

    $('.num2').hover(function(){

       $('.n2').css("transform", "scale(1.2)");
       },function(){
       $('.n2').css("transform","scale(1)"	);
       });
        });


        
        $(window).scroll(function() {
                    if($(window).scrollTop() + $(window).height() > $(document).height() - 100) {
                        bot.hide();
                        top.show();
                    }else if ($(window).scrollTop() + $(window).height() > $(document).height() - 100){
                       $('.top').hide();
                        bot.show();
                        top.hide();
                    }
                });
        </script>
</body>
</html>