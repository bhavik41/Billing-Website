<?php
session_start();
include '../partials/_dbconnect.php';

if(isset($_POST['Delete_mul'])){
    $all_id = $_POST["delete_id"];
    $extract_id = implode(',',$all_id);
 
 $query = " DELETE FROM products WHERE ProdId IN($extract_id)";
 $query_run = mysqli_query($conn, $query);

 if ($query_run){
$_SESSION['status'] = "Data Deleted Successfully";
header('location: product_cart.php');
 }else{
    $_SESSION['status'] = "Data is not  Deleted ";
    header('location: product_cart.php');
 }

}

?>
