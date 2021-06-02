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
$name = $_POST['name'];
$country = $_POST['country'];
$skype_id = $_POST['name'];
$contact = $_POST['contact'];
$website = $_POST['website'];
$address = $_POST['address'];
$query="UPDATE customer SET name = '$name', country = '$country', skype_id = '$skype_id', contact = '$contact', website = '$website', address = '$address' WHERE customer_id = '$customer_id'";
$query1="UPDATE requirements SET name = '$name', contact = '$contact' WHERE customer_id = '$customer_id'";
if($con->query($query)===TRUE && $con->query($query1)===TRUE)
{
	echo "
				     <script>
				 window.location.href='profile.php';
				 </script>";
}

?>