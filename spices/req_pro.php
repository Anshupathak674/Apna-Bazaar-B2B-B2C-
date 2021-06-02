<?php
session_start();
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'spices';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) 
{
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}
if (!isset($_POST['email'])) 
{
	exit('Please complete the registration form!');
}
if (empty($_POST['name']) || empty($_POST['quantity']) || empty($_POST['unit'])) 
{
	exit('Please complete the registration form');
}
if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) 
{
	exit('Email is not valid!');
}
$customer_id = $_SESSION['customer'];
$product = $_POST['product'];
$quantity = $_POST['quantity'];
$unit = $_POST['unit'];
$name = $_POST['name'];
$contact = $_POST['contact'];
$email = $_POST['email'];
$Status = "Active";
$Comments = "-";
$sql = "INSERT INTO requirements (`customer_id`, `product`, `quantity`, `unit`, `name`, `contact`, `email`, `Status`, `Comments`) VALUES ('$customer_id', '$product', '$quantity', '$unit', '$name', '$contact' , '$email', '$Status', '$Comments')";
$result=$con->query($sql);
if($result)
{
	 echo "<script>
	 alert('Successfully Added');
	 window.location.href='view_req.php';
	 </script>";
}
$con->close();
?>