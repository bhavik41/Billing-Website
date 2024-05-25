<?php
// server.php
error_reporting(E_ALL);
ini_set('display_errors', 1);
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Assuming you have a database connection already established
    include '../partials/_dbconnect.php';

    // Fetching data from the AJAX request
    $invoiceNumber = $_POST['invoiceNumber'];
    $productId = $_POST['productId'];
    $productName = $_POST['productName'];
    $productCost = $_POST['productCost'];
    $quantity = $_POST['quantity'];
    $hsnCode = $_POST['hsnCode'];
    $igst = $_POST['igst'];
    $igstValue = $_POST['igstValue'];
    $cgst = $_POST['cgst'];
    $cgstValue = $_POST['cgstValue'];
    $sgst = $_POST['sgst'];
    $sgstValue = $_POST['sgstValue'];
    $pCost = $_POST['pCost'];
    $totalProductCost = $_POST['totalProductCost'];

    // Inserting data into the database (customize this based on your database structure)
   
    // $_SESSION['uInvoiceButton'] = true;
$query = "INSERT INTO `cart`(`invoiceNumber`, `productId`, `productName`, `productCost`, `quantity`, `hsnCode`, `igst`, `igstValue`, `cgst`, `cgstValue`, `sgst`, `sgstValue`, `totalProductCost`,`pCost`, `dt`) 
VALUES ('$invoiceNumber','$productId','$productName','$productCost','$quantity','$hsnCode','$igst','$igstValue','$cgst','$cgstValue','$sgst','$sgstValue','$totalProductCost','$pCost',current_timestamp())";

    if (mysqli_query($conn, $query)) {
        $response = array('success' => true, 'invoiceNumber' => $invoiceNumber);
        echo json_encode($response);
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
   
    
 // Implement this function to get the current invoice number

// ... your existing logic ...

// Send the updated invoice number in the response
// $response = array('success' => true, 'invoiceNumber' => $invoiceNumber);
// echo json_encode($response);

    // Close the database connection
    //mysqli_close($conn);
}
?>
