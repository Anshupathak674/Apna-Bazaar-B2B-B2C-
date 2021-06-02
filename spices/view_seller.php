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
$role1 = "Seller";
$role2 = "seller";
$query="SELECT customer_id FROM business WHERE primary_business = '$role1' Or primary_business = '$role2'";
$res=$con->query($query);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Webslesson Tutorial | PHP Ajax Update MySQL Data Through Bootstrap Modal</title>  
           <style >
               * {
    box-sizing: border-box;
    font-family: -apple-system, BlinkMacSystemFont, "segoe ui", roboto, oxygen, ubuntu, cantarell, "fira sans", "droid sans", "helvetica neue", Arial, sans-serif;
    font-size: 16px;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}
body {
    background-color: #FFFFFF;
    margin: 0;
}
.navtop {
    background-color: #3f69a8;
    height: 60px;
    width: 100%;
    border: 0;
}
.navtop div {
    display: flex;
    margin: 0 auto;
    width: 1000px;
    height: 100%;
}
.navtop div h1, .navtop div a {
    display: inline-flex;
    align-items: center;
}
.navtop div h1 {
    flex: 1;
    font-size: 24px;
    padding: 0;
    margin: 0;
    color: #ecf0f6;
    font-weight: normal;
}
.navtop div a {
    padding: 0 20px;
    text-decoration: none;
    color: #c5d2e5;
    font-weight: bold;
}
.navtop div a i {
    padding: 2px 8px 0 0;
}
.navtop div a:hover {
    color: #ecf0f6;
}
.content {
    width: 1000px;
    margin: 0 auto;
}
.content h2 {
    margin: 0;
    padding: 25px 0;
    font-size: 22px;
    border-bottom: 1px solid #ebebeb;
    color: #666666;
}
.read .create-contact {
    display: inline-block;
    text-decoration: none;
    background-color: #38b673;
    font-weight: bold;
    font-size: 14px;
    color: #FFFFFF;
    padding: 10px 15px;
    margin: 15px 0;
}
.read .create-contact:hover {
    background-color: #32a367;
}
.read .pagination {
    display: flex;
    justify-content: flex-end;
}
.read .pagination a {
    display: inline-block;
    text-decoration: none;
    background-color: #a5a7a9;
    font-weight: bold;
    color: #FFFFFF;
    padding: 5px 10px;
    margin: 15px 0 15px 5px;
}
.read .pagination a:hover {
    background-color: #999b9d;
}
.read table {
    width: 100%;
    padding-top: 30px;
    border-collapse: collapse;
}
.read table thead {
    background-color: #ebeef1;
    border-bottom: 1px solid #d3dae0;
}
.read table thead td {
    padding: 10px;
    font-weight: bold;
    color: #767779;
    font-size: 14px;
}
.read table tbody tr {
    border-bottom: 1px solid #d3dae0;
}
.read table tbody tr:nth-child(even) {
    background-color: #fbfcfc;
}
.read table tbody tr:hover {
    background-color: #376ab7;
}
.read table tbody tr:hover td {
    color: #FFFFFF;
}
.read table tbody tr:hover td:nth-child(1) {
    color: #FFFFFF;
}
.read table tbody tr td {
    padding: 10px;
}
.read table tbody tr td:nth-child(1) {
    color: #a5a7a9;
}
.read table tbody tr td.actions {
    padding: 8px;
    text-align: right;
}
.read table tbody tr td.actions .edit, .read table tbody tr td.actions .trash {
    display: inline-flex;
    text-align: right;
    text-decoration: none;
    color: #FFFFFF;
    padding: 10px 12px;
}
.read table tbody tr td.actions .trash {
    background-color: #b73737;
}
.read table tbody tr td.actions .trash:hover {
    background-color: #a33131;
}
.read table tbody tr td.actions .edit {
    background-color: #37afb7;
}
.read table tbody tr td.actions .edit:hover {
    background-color: #319ca3;
}
.update form {
    padding: 15px 0;
    display: flex;
    flex-flow: wrap;
}
.update form label {
    display: inline-flex;
    width: 400px;
    padding: 10px 0;
    margin-right: 25px;
}
.update form input {
    padding: 10px;
    width: 400px;
    margin-right: 25px;
    margin-bottom: 15px;
    border: 1px solid #cccccc;
}
.update form input[type="submit"] {
    display: block;
    background-color: #38b673;
    border: 0;
    font-weight: bold;
    font-size: 14px;
    color: #FFFFFF;
    cursor: pointer;
    width: 200px;
    margin-top: 15px;
}
.update form input[type="submit"]:hover {
    background-color: #32a367;
}
.delete .yesno {
    display: flex;
}
.delete .yesno a {
    display: inline-block;
    text-decoration: none;
    background-color: #38b673;
    font-weight: bold;
    color: #FFFFFF;
    padding: 10px 15px;
    margin: 15px 10px 15px 0;
}
.delete .yesno a:hover {
    background-color: #32a367;
}
           </style>
</head>
<body>
    <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
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
           <div class="content read">
    <h2>Sellers</h2>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <td>Customer id</td>
                            <td>Name</td>
                            <td>Email</td>
                            <td>Contact</td>
                            <td>Status</td>
                            <td>Delete</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            while($rows=$res->fetch_assoc())
                            {
                                $seller_id = $rows['customer_id'];
                                $sql = "SELECT name, email, contact FROM customer WHERE customer_id = '$seller_id'";
                                $res1 = $con->query($sql);
                                while($rows1 = $res1->fetch_assoc())
                                {
                            ?>
                                <tr>
                                    <td><a href="show2.php?id=<?=$seller_id?>"><?php echo $seller_id; ?></a></td>
                                    <td><?php echo $rows1['name']; ?></td>
                                    <td><?php echo $rows1['email']; ?></td>
                                    <td><?php echo $rows1['contact']; ?></td>
                                    <td><?php echo "Active"; ?></td>
                                    <td class="actions">
                    <a href="del_buyer.php?id=<?=$seller_id?>" class="trash"><i class="fas fa-trash fa-xs"></i></a>
                </td>  
                                </tr>
                        <?php
                        }
                        }
                        ?>
                        </tbody>
                    </table>
            </div>  
                </div>  
           </div>  
       </div>
   </div>
      </body>  
 </html>  
<?php
include('includes/scripts.php');
?>