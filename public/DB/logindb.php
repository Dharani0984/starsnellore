<?php
$request_method = $_SERVER['REQUEST_METHOD'];
switch($request_method){
	case "POST" :
	response(doPost());
	break;
}

function doPost(){
	include('db_connect.php');
		$sql = "SELECT name,email,password FROM users WHERE email='".$_POST['email']."' AND password='".$_POST['password']."'";
		$result = mysqli_query($conn,$sql);
		$count = mysqli_num_rows($result);
		$myrow = mysqli_fetch_assoc($result);
		$name = $myrow['name'];
		$email = $myrow['email'];
		session_start();
		$_SESSION['name'] = $name;
		$_SESSION['email'] = $email;
		
		if($count >= 1){
			$response = array("message"=>"Login Successfully");
		}else{
			$response = array("message"=>"Login failed");
		}
	if(!empty($response)){
			return $response;
}
}

//output
function response($response){
	echo json_encode($response);
}
?>