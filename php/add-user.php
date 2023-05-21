<?php  
session_start();

if (isset($_SESSION['user_id']) &&
    isset($_SESSION['user_email'])) {

	include "../db_conn.php";


	if (isset($_POST['register'])){

		$fname = $_POST['f_name'];
        $lname = $_POST['l_name'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = md5($_POST['pass']);
        $mobile = $_POST['mobile'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $status = $_POST['status'];
        
		if (empty($fname) || empty($lname) || empty($username) || empty($email) || empty($password) || empty($mobile) || empty($address) || empty($city) ||empty($status)) {
			$em = "All Inputs are required";
			header("Location: ../add-user.php?error=$em");
            exit;
		}else {

                $sql  = "INSERT INTO users (fname, lname, username, email, `password`, mobile, address, city, user_role)
                                         VALUES ('$fname','$lname','$username','$email','$password','$mobile','$address','$city','$status')";
 

            if (mysqli_query($link, $sql)) {
		     	$sm = "User successfully registered!";
				header("Location: ../add-user.php?success=$sm");
	            exit;
		     }else{
		     	$em = "Unknown Error Occurred!";
				header("Location: ../add-user.php?error=$em");
	            exit;
		     
		     }
		}
	}else {
      header("Location: ../admin.php");
      exit;
	}

}else{
  header("Location: ../login.php");
  exit;
}