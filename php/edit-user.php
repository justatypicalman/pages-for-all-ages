<?php  
session_start();


if (isset($_SESSION['user_id']) &&
    isset($_SESSION['user_email'])) {


	include "../db_conn.php";



	if (isset($_POST['user_id'])  &&
        isset($_POST['f_name'])   &&
        isset($_POST['l_name'])   &&
        isset($_POST['username']) &&
        isset($_POST['email'])    &&
        isset($_POST['pass']) &&
        isset($_POST['mobile'])   &&
        isset($_POST['city'])     &&
        isset($_POST['address'])  &&
        isset($_POST['status'])) {

		$fname = $_POST['f_name'];
		$id = $_POST['user_id'];
        $lname = $_POST['l_name'];
		$username = $_POST['username'];
        $email = $_POST['email'];
		$pass = md5($_POST['pass']);
        $mobile = $_POST['mobile'];
		$city = $_POST['city'];
        $address = $_POST['address'];
		$status = $_POST['status'];

		if (empty($id)) {
			$em = "All inputs are required";
			header("Location: ../edit-user.php?error=$em&id=$id");
            exit;
		}else {
			$sql = "UPDATE users
		          	        SET fname=?,
                                lname=?,
                                username=?,
                                email=?,
                                password=?,
                                mobile=?,
                                address=?,
                                city=?,
                                user_role=?
		          	        WHERE id=?";
		          	$stmt = $conn->prepare($sql);
					$res  = $stmt->execute([$fname, $lname, $username, $email, $pass, $mobile, $address, $city, $status, $id]);

				     if ($res) {
				     	$sm = "Successfully updated!";
						header("Location: ../edit-user.php?success=$sm&id=$id");
			            exit;
				     }else{
				     	$em = "Unknown Error Occurred!";
						header("Location: ../edit-user.php?error=$em&id=$id");
			            exit;
				     }

		}
	}else {
      header("Location: ../admin.php?error");
      exit;
	}

}else{
  header("Location: ../login.php");
  exit;
}