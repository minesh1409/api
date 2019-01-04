<?php 

 $phone = $_GET['user_phone'];
 
 //Importing dbdetails file 
 require_once 'include/Config.php';
 
 //connection to database 
 $con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE) or die('Unable to Connect...');
 
 $sql = "DELETE FROM `otps` WHERE `user_phone` = $phone;";
 //Deleting record in database 
 if(mysqli_query($con,$sql)){
 echo 'OTP Deleted Successfully';
 }else{
 echo 'Could Not Delete OTP Try Again';
 }
 
 //closing connection 
 mysqli_close($con);
 ?>