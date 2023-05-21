<?php  
session_start();


if (isset($_SESSION['user_id']) &&
    isset($_SESSION['user_email'])) {


	include "../db_conn.php";


	if (isset($_GET['id'])) {

		$id = $_GET['id'];

		if (empty($id)) {
			$em = "Error Occurred!";
			header("Location: ../admin.php?error=$em");
            exit;
		}else {
			 $sql2  = "SELECT * FROM books
			          WHERE id=?";
			 $stmt2 = $conn->prepare($sql2);
			 $stmt2->execute([$id]);
			 $the_book = $stmt2->fetch();

			 if($stmt2->rowCount() > 0){
				$sql  = "UPDATE books SET book_status = '0'
				         WHERE id=?";
				$stmt = $conn->prepare($sql);
				$res  = $stmt->execute([$id]);


			     if ($res) {

                  

			     	$sm = "Book successfully archived!";
					header("Location: ../admin.php?success=$sm");
		            exit;
			     }else{
			     	$em = "Unknown Error Occurred!";
					header("Location: ../admin.php?error=$em");
		            exit;
			     }
			 }else {
			 	$em = "Error Occurred!";
			    header("Location: ../admin.php?error=$em");
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