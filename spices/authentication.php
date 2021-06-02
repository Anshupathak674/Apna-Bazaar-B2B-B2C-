<?php
session_start();
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'spices';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if ( mysqli_connect_errno() ) {
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

if ( !isset($_POST['username'], $_POST['password']) ) {
	exit('Please fill both the username and password fields!');
}
if ($stmt = $con->prepare('SELECT id, customer_id, password FROM login WHERE username = ?')) 
{

	$stmt->bind_param('s', $_POST['username']);
	$stmt->execute();
	$stmt->store_result();

    if ($stmt->num_rows > 0) 
    {
		$stmt->bind_result($id, $customer_id, $password);
		$stmt->fetch();
	
		if ($_POST['password'] === $password) 
		{
			session_regenerate_id();
			$_SESSION['loggedin'] = TRUE;
			$_SESSION['name'] = $_POST['username'];
			$_SESSION['id'] = $id;
			$_SESSION['customer'] = $customer_id;
			$sql = "SELECT * FROM business WHERE customer_id = '$customer_id'";
			$res = $con->query($sql);
			while($row=$res->fetch_assoc())
            {
            	$role = $row['primary_business'];
            	if($role=="Buyer" OR $role=="buyer")
			        header('Location: index.php');
			    else if($role=="Seller" OR $role=="seller")
			    	header('Location: seller.php');
			    else if($role=="Admin" OR $role=="admin")
			    	header('Location: admin_index.php');
			}
		} 
		else 
		{
			echo 'Incorrect username and/or password!';
		}
    } 
    else
    {
		echo 'Incorrect username and/or password!';
    }
	$stmt->close();
}
?>