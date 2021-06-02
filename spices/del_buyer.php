<?php
session_start();
include('includes/header.php');
include('includes/navbar_admin.php');
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
if(isset($_GET['id']))
{
	$id = $_GET['id'];
	$query="SELECT status FROM login WHERE customer_id = '$id'";
    $res=$con->query($query);
    while($rows = $res->fetch_assoc())
    {
    	if($rows['status']=='Active')
    	{
			$sql = "UPDATE login SET status = 'Inactive' WHERE customer_id = '$id'";
			if ($con->query($sql) === TRUE) 
			{
				echo "
				     <script>
				 alert('Successfully Deleted');
				 window.location.href='admin.php';
				 </script>";
		    }
	    }
	    else
	    {
	    	echo "
				     <script>
				 alert('User Already Deleted');
				 window.location.href='admin.php';
				 </script>";
	    }
    }
}
