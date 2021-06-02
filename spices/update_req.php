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
    if (!empty($_POST)) 
    {
        // This part is similar to the create.php, but instead we update a record and not insert
        $product = isset($_POST['product']) ? $_POST['product'] : '';
        $quantity = isset($_POST['quantity']) ? $_POST['quantity'] : '';
        $unit = isset($_POST['unit']) ? $_POST['unit'] : '';
        $name = isset($_POST['name']) ? $_POST['name'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $contact = isset($_POST['contact']) ? $_POST['contact'] : '';
        
        //Update the record
        $req_id = $_GET['req_id'];
        $sql = "UPDATE requirements SET product = '$product', quantity = '$quantity', unit = '$unit', name = '$name', contact = '$contact', email = '$email' WHERE req_id = '$req_id'";
        $result=$con->query($sql);
        if($result)
        {
             echo "<script>
             alert('Successfully Added');
             window.location.href='view_req.php';
             </script>";
        }
    }
}
    // Get the contact from the contacts table
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['customer']?></span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="profile.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
            <div>
<div class="col-lg-7">
                                <div class="p-5">
                                    <div class="container">
    <center><h2>Update Requirements #<?=$_GET['req_id']?></h2></center>
        <form class="form-horizontal" action="" method="post">
                                    <div class="form-group">
                                            <label class= "control-label col-sm-2" for="product">Product</label>
                                            <div class="col-sm-8">
                                            <input class="form-control" type="text" id="product" name="product">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-2" for="quantity">Quantity</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control"
                                                id="quantity" name="quantity" >
                                            </div>
                                    </div>
                                    <div class="form-group ">
                                        <label class="control-label col-sm-2" for="unit">Unit</label>
                                        <div class="col-sm-8">
                                        <input type="text" class="form-control" id="unit" name="unit" >
                                        </div>
                                    </div>
                                    <div class="form-group"> 
                                        <label class="control-label col-sm-2" for="name">Name</label>
                                        <div class="col-sm-8">
                                        <input type="text" class="form-control" id="name" name="name" >
                                    </div>
                                    </div>
                                    <div class="form-group"> 
                                        <label class="control-label col-sm-2" for="tax">Contact</label>
                                        <div class="col-sm-8">
                                        <input type="text" class="form-control"  id="contact" name="contact" >
                                    </div>
                                   </div>
                                
                                    <div class="form-group">
                                        <label class="control-label col-sm-2" for="email">Email</label>
                                        <div class="col-sm-8">
                                        <input type="text" class="form-control" id="email" name="email" 
                                            >
                                        </div>
                                    </div>
                                    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-8">
                                    <input type="submit" class="btn btn-primary btn-user btn-block" name="ok" value="Update">   
                                    </div>
                                    </div>  
                                         
                                </form>
</div>
</div>
</div>
</body>
</html>