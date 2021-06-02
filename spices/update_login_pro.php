<?php
session_start();
include('includes/header.php');
include('includes/navbar.php');
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'spices';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) 
{
    exit('Failed to connect to MySQL: ' .mysqli_connect_error());
}
$customer_id = $_SESSION['customer'];
$email = $_POST['email'];
$password = $_POST['password'];
$query="UPDATE login SET email = '$email', password = '$password' WHERE customer_id = '$customer_id'";
$query1="UPDATE requirements SET email = '$email' WHERE customer_id = '$customer_id'";
if($con->query($query)===TRUE && $con->query($query1)===TRUE)
{
	echo "
				     <script>
				 window.location.href='profile.php';
				 </script>";
}

?>