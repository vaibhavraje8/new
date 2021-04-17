<?php
			
include "config.php";

if(!isset($_POST['id'])){
	//insert into table
	if($_POST['fname']==""&&$_POST['lname']==""&&$_POST['email']==""&&$_POST['phone']==""){
		echo "<div class='alert alert-danger alert-dismissible'> Blank spaces are not allowed, fill  the form properly";exit();

	}
	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['save']) && $_POST['save'] == 1) {

		$fname 		= 	$_POST['fname'];
		$lname 		= 	$_POST['lname'];
		$email 		= 	$_POST['email'];
		$phone      = 	$_POST['phone'];
		$save 		= 	$_POST['save'];

		$query = "INSERT INTO customers (vFirstName, vLastName,vEmail, vPhone) VALUES ('$fname', '$fname', '$email', '$phone') ";

		$result = mysqli_query($con, $query);
			
		if($result) {
			echo "<div class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert'> × </button>Added successfully.</div>";
		}

		else {
			echo "<div class='alert alert-danger alert-dismissible'>
			<button type='button' class='close' data-dismiss='alert'> × </button>
			Email has Already Exist.";
		}
	}
}
else{
	$fname 		= 	$_POST['fname'];
		$lname 		= 	$_POST['lname'];
		$email 		= 	$_POST['email'];
		$phone      = 	$_POST['phone'];
		$id 		= 	$_POST['id'];

		$query = "UPDATE `customers` SET `vFirstName` = '$fname', `vLastName` = '$lname', `vEmail` = '$email', `vPhone` = '$phone ' WHERE `customers`.`iId` = $id" ;

		$result = mysqli_query($con, $query);
			
		if($result) {
			echo "updated successfully.";
		}

		else {
			echo "<div class='alert alert-danger alert-dismissible'>
			<button type='button' class='close' data-dismiss='alert'> × </button>
			try again, something went wrong!! .";
		}
}
?>

