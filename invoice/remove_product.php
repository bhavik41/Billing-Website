<?php
include '../partials/_dbconnect.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

$productId = $_POST['productId'];
$quantity = $_POST['quantity'];
$invoiceNumber = $_POST['invoiceNumber']; // Fix: Remove the $ sign before invoiceNumber
echo "success " . $invoiceNumber.$productId.$quantity;
//Perform the database query to remove the product based on the productId
$query = "DELETE FROM cart WHERE (productId = '$productId' AND quantity = '$quantity' AND invoiceNumber = '$invoiceNumber')";
$result = mysqli_query($conn, $query);

if ($result) {
    echo "success " . $productId;
} else {
    // If there's an error, send a JSON response with an error message
    // echo json_encode(['success' => false, 'message' => 'Error removing product']);
    echo "Error removing product";
    exit;
}
?>
