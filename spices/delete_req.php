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
$msg = '';
// Check if the contact id exists, for example update.php?id=1 will get the contact with the id of 1
if (isset($_GET['req_id'])) 
{
        $req_id = $_GET['req_id'];
        $sql = "DELETE FROM requirements WHERE req_id = '$req_id'";
        $result=$con->query($sql);
        if($result)
        {
             echo "<script>
             alert('Successfully Deleted');
             window.location.href='view_req.php';
             </script>";
        }
}
    // Get the contact from the contacts table
?>