<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../partials/_dbconnect.php';

if (isset($_POST["uInvoiceButton"])) {

    $invoiceNumber = mysqli_real_escape_string($conn, $_POST["uInvoiceNumber"]);
    $sqlCheckInvoice = "SELECT * FROM `updateInvoicenumber` WHERE 1";
    $resultCheckInvoice = mysqli_query($conn,$sqlCheckInvoice);

    if(mysqli_num_rows($resultCheckInvoice) == 0){
        // Insert/update the invoice number in the updateInvoicenumber table
        $sqlInsertUpdateInvoice = "INSERT INTO `updateInvoicenumber`(`invoiceNumber`) VALUES ('$invoiceNumber')";
        $resultUpdateInvoice = mysqli_query($conn, $sqlInsertUpdateInvoice);

        if (!$resultUpdateInvoice) {
            die("Error updating invoice number: " . mysqli_error($conn));
        }

    }
    // Retrieve invoice details from the invoices table
    $sqlRetrieveInvoice = "SELECT * FROM `invoices` WHERE invoice_number = '$invoiceNumber'";
    $resultRetrieveInvoice = mysqli_query($conn, $sqlRetrieveInvoice);

    if (!$resultRetrieveInvoice) {
        die("Error retrieving invoice details: " . mysqli_error($conn));
    }

    $row = mysqli_fetch_assoc($resultRetrieveInvoice);

    $date = $row["date"];
    $invoiceType = $row["invoice_type"];
    $buyerName = $row["buyer_name"];
    $buyerGstin = $row["buyer_gstin"];
    $buyerAddress = $row["buyer_address"];
    $buyertState = $row["buyer_state"];
    $buyerCode = $row["buyer_code"];
    $transportName = $row["transport_name"];
    $truckNumber = $row["truck_number"];
    $RRLRNO = $row["rrlr_number"];
} else {
    // $deleteUpdateInvoice = "DELETE FROM updateInvoicenumber";
    // $resultDeleteUpdateInvoice = mysqli_query($conn,$deleteUpdateInvoice);
    
    // Get the next invoice number
    $query = "SELECT MAX(CAST(SUBSTRING(invoice_number, 5) AS UNSIGNED)) AS lastNumber FROM `invoices`";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Error getting last invoice number: " . mysqli_error($conn));
    }

    $row = mysqli_fetch_assoc($result);
    $lastNumber = isset($row['lastNumber']) ? $row['lastNumber'] : 0;
    $newNumber = $lastNumber + 1;

    // Format the new invoice number with leading zeros
    $invoiceNumber = 'INV-' . str_pad($newNumber, 4, '0', STR_PAD_LEFT);

    // Set other default values
    $date = "";
    $invoiceType = "";
    $buyerName = "";
    $buyerGstin = "";
    $buyerAddress = "";
    $buyertState = "";
    $buyerCode = "";
    $transportName = "";
    $truckNumber = "";
    $RRLRNO = "";
}

// Rest of your code...
?>
