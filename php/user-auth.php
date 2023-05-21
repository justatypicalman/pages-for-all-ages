<?php
//user

// session_start();

// if (isset($_POST['uname']) && 
// 	isset($_POST['password'])) {

// 	include "../db_conn.php";
    
// 	include "func-validation.php";
	

// 	$username = $_POST['uname'];
// 	$password = $_POST['password'];


// 	$text = "Username";
// 	$location = "../userlogin.php";
// 	$ms = "error";
//     is_empty($username, $text, $location, $ms, "");

//     $text = "Password";
// 	$location = "../userlogin.php";
// 	$ms = "error";
//     is_empty($password, $text, $location, $ms, "");

//     $sql = "SELECT * FROM users WHERE username=? AND user_role='1'";
		
//     $stmt = $conn->prepare($sql);
//     $stmt->execute([$username]);

//     if ($stmt->rowCount() === 1) {
//     	$user = $stmt->fetch();

//     	$user_id = $user['id'];
//     	$user_name = $user['username'];
//     	$user_password = $user['password'];
//     	if ($username === $user_name) {
//     		if (password_verify($password, $user_password)) {
//     			$_SESSION['users_id'] = $user_id;
//     			$_SESSION['users_name'] = $user_name;
//     			header("Location: ../userhome.php");
//     		}else {
//     	        $em = "Incorrect username or password";
//     	        header("Location: ../userlogin.php?error=$em");
//     		}
//     	}else {
//     	    $em = "Incorrect username or password";
//     	    header("Location: ../userlogin.php?error=$em");
//     	}
//     }else{
//     	$em = "Incorrect username or password";
//     	header("Location: ../userlogin.php?error=$em");
//     }

// }else {
// 	header("Location: ../userlogin.php");
// }

// <?php 
session_start();

//admin
if (isset($_POST['email']) && 
	isset($_POST['password'])) {

	include "../db_conn.php";
    
	include "func-validation.php";
	

	$email = $_POST['email'];
	$password = $_POST['password'];


	$text = "Email";
	$location = "../userlogin.php";
	$ms = "error";
    is_empty($email, $text, $location, $ms, "");

    $text = "Password";
	$location = "../userlogin.php";
	$ms = "error";
    is_empty($password, $text, $location, $ms, "");

    $sql = "SELECT * FROM users 
            WHERE email=? AND user_role=1";
	$sql1 = "SELECT * FROM users WHERE email = '$email'";
    $stmt = $conn->prepare($sql1);
    $stmt->execute();

    if ($stmt->rowCount() === 1) {
    	$user = $stmt->fetch();

    	$user_id = $user['id'];
    	$user_email = $user['email'];
    	$user_password = $user['password'];
		
    	if ($email === $user_email) {
    		if (md5($password) === $user_password) {
    			$_SESSION['users_id'] = $user_id;
    			$_SESSION['users_email'] = $user_email;
    			header("Location: ../userhome.php");
    		}else { 
    	        $em = "Incorrect email or password";
    	        header("Location: ../userlogin.php?error=$em");
    		}

    	}else {
    	    $em = "Incorrect email or password";
    	    header("Location: ../userlogin.php?error=$em");
    	}
    }else{
    	$em = "Incorrect email or password";
    	header("Location: ../userlogin.php?error=$em");
    }

}else {
	$em = "Incorrect email or password";
    header("Location: ../userlogin.php?error=$em");
}


