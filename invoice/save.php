<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include '../partials/_dbconnect.php';
// Check if the form is submitted using POST method
if ($_SERVER["REQUEST_METHOD"] == "POST" ) {

    $invoiceNumber = $_POST['invoiceNumber'];
    $date = $_POST['date'];
    $invoiceType = $_POST['invoiceType'];
    $buyerName = $_POST['buyerName'];
    $buyerGstin = $_POST['buyerGstin'];
    $buyerAddress = $_POST['buyerAddress'];
    $buyerState = $_POST['buyerState'];
    $buyerCode = $_POST['buyerCode'];
    $transportName = $_POST['transportName'];
    $truckNo = $_POST['truckNo'];
    $rrLrNo = $_POST['rr-lr-no'];
    $totalIgst = $_POST['totalIgst'];
    $totalCgst = $_POST['totalCgst'];
    $totalSgst = $_POST['totalSgst'];
    $totalBill = $_POST['totalBill'];
    //echo $invoiceNumber;
    if(isset($_POST["uInvoiceNumber"])){
        $upadateInvoiceSql = "UPDATE `invoices` SET `date`='$date',`invoice_type`='$invoiceType',`buyer_name`='$buyerName',`buyer_gstin`='$buyerGstin',`buyer_address`='$buyerAddress',`buyer_state`='$buyerState',`buyer_code`='$buyerCode',`transport_name`='$transportName',`truck_number`='$truckNo',`rrlr_number`='$rrLrNo',`total_igst`='$totalIgst',`total_sgst`='$totalSgst',`total_cgst`='$totalCgst',`total_bill`='$totalBill',`dt`=current_timestamp() WHERE invoice_number ='$invoiceNumber'";
        $updateInvoiceQuery = mysqli_query($conn,$upadateInvoiceSql);
        if (!$updateInvoiceQuery) {
            echo "Error updating invoice: " . mysqli_error($conn);
        }
    }else{
        $invoiceSql = "INSERT INTO `invoices`(`invoice_number`, `date`, `invoice_type`, `buyer_name`, `buyer_gstin`, `buyer_address`, `buyer_state`, `buyer_code`, `transport_name`, `truck_number`, `rrlr_number`, `total_igst`, `total_sgst`, `total_cgst`, `total_bill`, `dt`) 
        VALUES ('$invoiceNumber','$date','$invoiceType','$buyerName','$buyerGstin','$buyerAddress','$buyerState','$buyerCode','$transportName','$truckNo','$rrLrNo','$totalIgst','$totalSgst','$totalCgst','$totalBill',current_timestamp())";
        $invoiceQuery = mysqli_query($conn,$invoiceSql);
        if (!$invoiceQuery) {
            echo "Error inserting invoice: " . mysqli_error($conn);
        }
    }

    $buyerExists = "SELECT * FROM `buyers` where buyerName = '$buyerName'";
    $resultBuyerExists = mysqli_query($conn,$buyerExists);
    if (!$resultBuyerExists) {
        echo "Error checking if buyer exists: " . mysqli_error($conn);
    }
    $row = mysqli_num_rows($resultBuyerExists);
    echo $row;
    if($row == 0){
        $insertBuyer = "INSERT INTO `buyers`(`buyerName`, `buyerGstin`, `buyerAddress`, `buyerState`, `buyerCode`, `dt`) VALUES ('$buyerName','$buyerGstin','$buyerAddress','$buyerState','$buyerCode',current_timestamp())";  
        $resultInsertBuyer = mysqli_query($conn,$insertBuyer);
        if (!$resultInsertBuyer) {
            echo "Error inserting buyer: " . mysqli_error($conn);
        }
        //echo "Successfully inserted Buyer";
    }



} else {
    // If the request method is not POST, respond with an error
    http_response_code(405); // Method Not Allowed
    echo "Invalid request method!";
}

?>
