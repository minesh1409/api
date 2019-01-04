<?php 
 
 $id = $_GET['user_id'];
 
 //Importing dbdetails file 
 require_once 'include/Config.php';
 
 //connection to database 
 $con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE) or die('Unable to Connect...');
 
 //sql query to fetch all addresses 
 $sql = "SELECT * FROM addresses WHERE user_id = $id";
 
 //getting addresses 
 $result = mysqli_query($con,$sql);
 
 //response array 
 $response = array(); 
 $response['error'] = false; 
 $response['addresses'] = array(); 
 
 //traversing through all the rows 
 while($row = mysqli_fetch_array($result)){
 $temp = array(); 
 $temp['address_id']=$row['address_id'];
 $temp['user_id']=$row['user_id'];
 $temp['user_country']=$row['user_country'];
 $temp['user_city']=$row['user_city'];
 $temp['user_address']=$row['user_address'];
 $temp['user_state']=$row['user_state'];
 $temp['user_zip']=$row['user_zip'];
   $temp['user_phone']=$row['user_phone'];
 array_push($response['addresses'],$temp);
 }
	//displaying in json format 
	echo json_encode($response);
	
	mysqli_close($con);
 ?>