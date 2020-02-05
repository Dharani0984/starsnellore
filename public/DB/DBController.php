<?php
$request_method = $_SERVER['REQUEST_METHOD'];
switch($request_method){
	case "GET" : 
	response(doGet()); 
	break;
	case "POST" :
	response(doPost());
	break;
	case "DELETE" :
	response(doDelete()); 
	break;
	case "PUT" :
	response(doPut()); 
	break;
	case "LOGIN" :
	response(dologin());
	break;
}


function doGet(){
	if(isset($_GET['id'])){
		$id = $_GET['id'];
		$where = " WHERE id =" . $id;
	}else{
		$id = 0;
		$where = "";
	}
	include('db_connect.php');
	echo $sql = "SELECT * FROM users" . $where;
	die;
	$result = mysqli_query($conn,$sql);
	$count = mysqli_num_rows($result);
	if($count>0){
		while($data = mysqli_fetch_assoc($result)){
			$response[] = $data;
		}
		if(!empty($response)){
			return $response;
		}
	}else{
		echo "No Records";
	}
}

function doPost(){
	extract($_POST);
	//if($_POST){
		include('db_connect.php');
		$sql = "INSERT INTO USERS(name,email,password) VALUES('".$_POST['name']."','".$_POST['email']."','".$_POST['password']."')";
		$result = mysqli_query($conn,$sql);
		if($result == true){
			$response = array("message"=>"succesfully Inserted");
		}else{
			$response = array("message"=>"Insertion failed");
		}
	//}
	if(!empty($response)){
			return $response;
}
}

function doPut(){
	//if($_POST){
		include('db_connect.php');
		echo $sql = "UPDATE USERS SET 
					name = '".$_POST['name']."',
					email = '".$_POST['email']."',
					password = '".$_POST['password']."' 
					WHERE id=  '".$_GET['id']."'";
		$result = mysqli_query($conn,$sql);
		if($result == true){
			$response = array("message"=>"succesfully Updated");
		}else{
			$response = array("message"=>"updation failed");
		}
	//}
	if(!empty($response)){
			return $response;
	}
}

function doDelete(){
	if($id = $_GET['id']){
		include('db_connect.php');
		echo $sql = "DELETE FROM USERS WHERE id = ".$id;
		$result = mysqli_query($conn,$sql);
		if($result == true){
			$response = array("message"=>"succesfully Deleted");
		}else{
			$response = array("message"=>"Records not Deleted");
		}
	}
	return $response;
}


function dologin(){
		include('db_connect.php');
		echo $sql = "SELECT email,password FROM users WHERE email='".$_POST['email']."' AND password='".$_POST['password']."'";
		$result = mysqli_query($conn,$sql);
		$count = mysqli_num_rows($result);
		if($count >= 1){
			$response = array("message"=>"succesfully Login");
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