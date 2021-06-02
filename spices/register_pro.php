<?php
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'spices';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) 
{
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}
if (!isset($_POST['username'], $_POST['password'], $_POST['email'])) 
{
	exit('Please complete the registration form!');
}
if (empty($_POST['username']) || empty($_POST['password']) || empty($_POST['email'])) 
{
	exit('Please complete the registration form');
}
if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) 
{
	exit('Email is not valid!');
}
if (strlen($_POST['password']) > 20 || strlen($_POST['password']) < 5) 
{
	exit('Password must be between 5 and 20 characters long!');
}
if ($stmt = $con->prepare('SELECT id, password FROM login WHERE username = ?')) 
{

	$stmt->bind_param('s', $_POST['username']);
	$stmt->execute();
	$stmt->store_result();
	if ($stmt->num_rows > 0) 
	{
		echo 'Username exists, please choose another!';
	} 
	else 
	{

		if ($stmt = $con->prepare('INSERT INTO login (customer_id, username, email, password, reg_date, status) VALUES (?, ?, ?, ?, ?, ?)')) 
		{


			$customer_id = "PSB01";
			$customer_id.= $_POST['username'];
			$status = "Active";
			$stmt->bind_param('ssssss',$customer_id, $_POST['username'], $_POST['email'], $_POST['password'], $_POST['reg_date'], $status);
			$stmt->execute();
			if ($stmt = $con->prepare('INSERT INTO customer (customer_id, name, country, skype_id, email, contact, website, address) VALUES (?, ?, ?, ?, ?, ?, ?, ?)')) 
			{
	            $stmt->bind_param('ssssssss',$customer_id, $_POST['name'], $_POST['country'], $_POST['skype_id'], $_POST['email'], $_POST['contact'],$_POST['website'], $_POST['address']);
	            $stmt->execute();
	            if($stmt = $con->prepare('INSERT INTO business (customer_id, company_name, primary_business, company_address, product) VALUES (?, ?, ?, ?, ?)'))
	            {
	                $stmt->bind_param('sssss',$customer_id, $_POST['company_name'], $_POST['primary_business'], $_POST['company_address'], $_POST['product']);
	                $stmt->execute();
	            	echo "<script>
								 alert('Successfully Registered');
								 window.location.href='login.html';
								 </script>";
	            }
			}
			else 
			{

				echo 'Could not prepare statement!';
			}
				
		} 
		else 
		{

			echo 'Could not prepare statement1!';
		}
	}
	//$stmt->close();
} 
else 
{

	echo 'Could not prepare statement!';
}
$con->close();
?>