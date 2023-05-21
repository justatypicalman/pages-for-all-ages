<?php 

function get_all_user($con){
   $sql  = "SELECT * FROM users";
   $stmt = $con->prepare($sql);
   $stmt->execute();

   if ($stmt->rowCount() > 0) {
   	  $authors = $stmt->fetchAll();
   }else {
      $authors = 0;
   }

   return $authors;
}


function get_user($con, $id){
   $sql  = "SELECT * FROM users WHERE id=?";
   $stmt = $con->prepare($sql);
   $stmt->execute([$id]);

   if ($stmt->rowCount() > 0) {
   	  $author = $stmt->fetch();
   }else {
      $author = 0;
   }

   return $author;
}