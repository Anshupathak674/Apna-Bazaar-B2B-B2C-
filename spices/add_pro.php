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
if(isset($_POST['ok']))
{
	$customer_id = $_SESSION['customer'];
	$product_type = $_POST['product_type'];
	$product_name = $_POST['product_name'];
	$currency = $_POST['currency'];
	$unit_price = $_POST['unit_price'];
	$bulk_price = $_POST['bulk_price'];
	$tax = $_POST['tax'];
	$quantity = $_POST['quantity'];
	$description = $_POST['description'];
	$supplier_location = $_POST['supplier_location'];
	$location_interested = $_POST['location_interested'];
	$additional_details = $_POST['additional_details'];
    $output_dir = "uploads/";/* Path for file upload */
	$RandomNum   = time();
	$ImageName      = str_replace(' ','-',strtolower($_FILES['photo']['name'][0]));
	$ImageType      = $_FILES['photo']['type'][0];
 
	$ImageExt = substr($ImageName, strrpos($ImageName, '.'));
	$ImageExt       = str_replace('.','',$ImageExt);
	$ImageName      = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
	$NewImageName = $ImageName.'-'.$RandomNum.'.'.$ImageExt;
    $ret[$NewImageName]= $output_dir.$NewImageName;
	
	/* Try to create the directory if it does not exist */
	if (!file_exists($output_dir))
	{
		@mkdir($output_dir, 0777);
	}               
	move_uploaded_file($_FILES["photo"]["tmp_name"][0],$output_dir."/".$NewImageName );
        
        $sql = "INSERT INTO `seller` (`customer_id`, `product_type`, `product_name`, `currency`, `unit_price`, `bulk_price`, `tax`, `quantity`, `description`,`photo`, `supplier_location`, `location_interested`, `additional_details`) VALUES ('$customer_id', '$product_type', '$product_name', '$currency', '$unit_price', '$bulk_price' , '$tax', '$quantity', '$description', '$NewImageName', '$supplier_location', '$location_interested', '$additional_details')";
        $query = mysqli_query($con,$sql);
}
$con->close();
?>