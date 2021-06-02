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
if(!empty($_POST))  
 {  
      $output = '';  
      $message = '';  
      $product = mysqli_real_escape_string($con, $_POST["product"]);  
      $quantity = mysqli_real_escape_string($con, $_POST["quantity"]);  
      $unit = mysqli_real_escape_string($con, $_POST["unit"]);  
      if($_POST["employee_id"] != '')  
      {  
           $query = "  
           UPDATE requirements   
           SET product='$product',   
           quantity='$quantity',   
           unit='$unit',      
           WHERE id='".$_POST["req_id"]."'";  
           $message = 'Data Updated';  
      }  
      if(mysqli_query($con, $query))  
      {  
           $output .= '<label class="text-success">' . $message . '</label>';  
           $select_query = "SELECT * FROM requirements ORDER BY req_id DESC";  
           $result = mysqli_query($con, $select_query);  
           $output .= '  
                <table>
                        <thead>
                        <tr>
                            <td>#</td>
                            <td>Customer id</td>
                            <td>Product</td>
                            <td>Quantity</td>
                            <td>Unit</td>
                            <td>Name</td>
                            <td>Contact</td>
                            <td>Email</td>
                            <td>Status</td>
                            <td>Comments</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>   ';  
           while($row = mysqli_fetch_array($result))  
           {  
                $output .= '  
                     <tr>  
                          <td>' . $row["req_id"] . '</td>  
                          <td>' . $row["customer_id"] . '</td>  
                          <td>' . $row["product"] . '</td>  
                          <td>' . $row["quantity"] . '</td>  
                          <td>' . $row["unit"] . '</td>  
                          <td>' . $row["name"] . '</td>  
                          <td>' . $row["contact"] . '</td>  
                          <td>' . $row["email"] . '</td>  
                          <td>' . $row["status"] . '</td>  
                          <td>' . $row["comments"] . '</td>  
                          <td><input type="button" name="edit" value="Edit" id="'.$row["req_id"] .'" class="btn btn-info btn-xs edit_data" /></td>  
                          <td><input type="button" name="view" value="view" id="' . $row["req_id"] . '" class="btn btn-info btn-xs view_data" /></td>  
                     </tr>  
                     </tbody>
                ';  
           }  
           $output .= '</table>';  
      }  
      echo $output;  
 }  
 ?>
 