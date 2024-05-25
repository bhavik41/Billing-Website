<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../partials/_dbconnect.php';

// Replace 'INV-0001' with the actual invoice number

                            // if(isset($_POST["uInvoiceNumber"])){
                                
                            //         include 'updateInvoiceNumber.php';
                            // }
                     

$sql =  "SELECT * FROM cart WHERE invoiceNumber = '$invoiceNumber'";
$result = mysqli_query($conn, $sql);

$totalIgst = 0;
$totalSgst = 0;
$totalCgst = 0;
$netTotal = 0;
$totalBill = 0;

if (mysqli_num_rows($result) > 0) {
    foreach ($result as $row) {
        $totalIgst += $row["igstValue"];
        $totalCgst += $row["cgstValue"];
        $totalSgst += $row["sgstValue"];
        $netTotal += $row["totalProductCost"];
        $totalBill += $row["pCost"];

        // $totalIgst = number_format($row["igstValue"], 2, '.', '');
        // $totalCgst = number_format($row["cgstValue"], 2, '.', '');
        // $totalSgst = number_format($row["sgstValue"], 2, '.', '');
        // $netTotal = number_format($row["totalProductCost"], 2, '.', '');
        // $totalBill = number_format($row["pCost"], 2, '.', '');
    }
    
    //Format the totals to 2 decimal places
    // $totalIgst = number_format($totalIgst, 2);
    // $totalCgst = number_format($totalCgst, 2);
    // $totalSgst = number_format($totalSgst, 2);
    // $totalBill = number_format($totalBill, 2);
    // $netTotal = number_format($netTotal, 2);
}
?>
