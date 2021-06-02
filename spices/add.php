<?php
    session_start();
    include('includes/header.php');
    include('includes/navbar_seller.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
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
<!--                         <h1 class="h3 mb-4 text-gray-800">Post Requirements</h1>
 -->                            <div class="col-lg-7">
                                <div class="p-5">
                                    <div class="container">
                                <form class="form-horizontal" action="add_pro.php" method="post" enctype="multipart/form-data">
                                    <center><h2>Add Products</h2></center>
                                    <div class="form-group">
                                        <label class="control-label col-sm-2" for="product_type">Choose Product:</label>
                                        <div class="col-sm-8">
                                        <select class = "form-control" name="product_type" id="product_type">
                                            <option value="volvo">Spices</option>
                                            <option value="saab">Herbs</option>
                                            <option value="mercedes">Seasonings</option>
                                          <option value="audi">Powder</option>
                                          <option value="audi">Mixes</option>
                                          <option value="audi">Dehydration</option>
                                        </select>
                                    </div>
                                    </div>
                                    <div class="form-group">
                                            <label class= "control-label col-sm-2" for="product_name">Product</label>
                                            <div class="col-sm-8">
                                            <input class="form-control" type="text" id="product_name" name="product_name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-2" for="product_name">Currency</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control"
                                                id="currency" name="currency" >
                                            </div>
                                    </div>
                                    <div class="form-group ">
                                        <label class="control-label col-sm-2" for="unit_price">Price Per Kg</label>
                                        <div class="col-sm-8">
                                        <input type="number" class="form-control" id="unit_price" name="unit_price" >
                                        </div>
                                    </div>
                                    <div class="form-group"> 
                                        <label class="control-label col-sm-2" for="bulk_price">Bulk Price</label>
                                        <div class="col-sm-8">
                                        <input type="number" class="form-control" id="bulk_price" name="bulk_price" >
                                    </div>
                                    </div>
                                    <div class="form-group"> 
                                        <label class="control-label col-sm-2" for="tax">Tax</label>
                                        <div class="col-sm-8">
                                        <input type="number" class="form-control"  id="tax" name="tax" >
                                    </div>
                                   </div>
                                
                                    <div class="form-group">
                                        <label class="control-label col-sm-2" for="quantity">Available Quantity</label>
                                        <div class="col-sm-8">
                                        <input type="number" class="form-control" id="quantity" name="quantity" 
                                            >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-2" for="description">Product Description</label>
                                        <div class="col-sm-8">
                                        <textarea class="form-control" name="description" rows="5" cols="20"></textarea> 
                                        </div>
                                    </div>
                                    <div class="form-group"> 
                                         <label class="control-label col-sm-2" for="supplier_location">Location of Supplier</label>
                                         <div class="col-sm-8">
                                            <input type="text" class="form-control"
                                                id="supplier_location" name="supplier_location" >
                                            </div>
                                    </div>
                                    <div class="form-group"> 
                                        <label class="control-label col-sm-2"  for="location_interested">Location  Interested</label>
                                        <div class="col-sm-8">
                                        <input type="text" class="form-control"  id="location_interested" name="location_interested" 
                                                >
                                            </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-2" for="additional_details">Additional Details</label>
                                        <div class="col-sm-8">
                                        <textarea class="form-control" id="additional_details" name="additional_details" rows="5" cols="20"></textarea> 
                                    </div>
                                    </div>
                                    <div class="form-group">
                                    <label class="control-label col-sm-2" for="photo">Select image of Product:</label>
                                    <div class="col-sm-8">
                                        <input type="file" class="form-control" id="photo" name="photo" >
                                    </div>
                                </div>
                                    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-8">
                                    <input type="submit" class="btn btn-primary btn-user btn-block" name="ok" value="Add Product">   
                                    </div>
                                    </div>  
                                </form>
                            </div>

                            </div>
                        </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->


        <!-- End of Content Wrapper -->

    
                    </div>
                </div>
                <!-- </div>
            </div>
        </div>
    </div>
</div> -->
        <!-- End of Content Wrapper -->
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

</body>
<?php
    include('includes/scripts.php');
?>
</html>
