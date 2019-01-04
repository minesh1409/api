<?php
 
 if($_SERVER['REQUEST_METHOD']=='POST'){
	 
 $user_id = $_POST['user_id'];
 $user_country = $_POST['user_country'];
 $user_city = $_POST['user_city'];
 $user_address = $_POST['user_address'];
 $user_state = $_POST['user_state'];
 $user_zip = $_POST['user_zip'];
 $user_phone = $_POST['user_phone'];

 require_once 'include/Config.php';
 
 $con = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_DATABASE) or die('Unable to Connect');

 $sql ="SELECT address_id FROM addresses ORDER BY address_id ASC";
 
 $res = mysqli_query($con,$sql);
 
 $id = 0;
 
 if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
    {
      $ip=$_SERVER['HTTP_CLIENT_IP'];
    }
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
    {
      $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else
    {
      $ip=$_SERVER['REMOTE_ADDR'];
    }

 $sql = "INSERT INTO addresses (user_id,user_country,user_city,user_address,user_state,user_zip,user_phone) VALUES ('$user_id','$user_country','$user_city','$user_address','$user_state','$user_zip','$user_phone')";
 
 if(mysqli_query($con,$sql)){
 echo "Successfully Uploaded";
 }
 
 mysqli_close($con);
 }else{
 echo "Error";
 }
 ?>