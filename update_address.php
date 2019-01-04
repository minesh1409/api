<?php 

 if($_SERVER['REQUEST_METHOD']=='POST'){
 //Getting values 
 $address_id = $_POST['address_id'];
 $user_country = $_POST['user_country'];
 $user_city = $_POST['user_city'];
 $user_address = $_POST['user_address'];
 $user_state = $_POST['user_state'];
 $user_zip = $_POST['user_zip'];
 $user_phone = $_POST['user_phone'];

 //Importing dbdetails file 
 require_once 'include/Config.php';
 
 //connection to database 
 $con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE) or die('Unable to Connect...');
 
 //Creating sql query 
 $sql = "UPDATE addresses SET user_country='$user_country',user_city='$user_city',user_address='$user_address',user_state='$user_state',user_zip='$user_zip',user_phone='$user_phone' WHERE address_id = $address_id"; 
 //Updating database table 
 if(mysqli_query($con,$sql)){
 echo 'User Address Updated Successfully';
 }else{
 echo 'Could Not Update User Address Try Again';
 }
 
 //closing connection 
 mysqli_close($con);
 }
 ?>