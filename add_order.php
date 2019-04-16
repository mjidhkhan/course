<?php
require_once("includes/session.php"); 
require_once("includes/connection.php"); 
require_once("includes/functions.php"); 
if(isset($_POST['action'])){
		$data = $_POST;
		$action = $_POST['action'];
		switch ($action) {
			case "ORDER":
				processOrderData($data);
				break;
		}
}else{
echo 'ERROR';
}

function processOrderData($data){
	
//array_push($_SESSION['ORDERS'],$data['id']);
	$_SESSION['ORDERS'][] = $data['id'];
	$result = sizeof($_SESSION['ORDERS']);
	echo $result;

	//unset($_SESSION['ORDERS'][$data['id']]);

}

