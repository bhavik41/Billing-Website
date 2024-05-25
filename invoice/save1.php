<?php


        error_reporting(E_ALL);
        ini_set('display_errors', 1);
        include '../partials/_dbconnect.php';

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
            $totalBillFormatted = number_format(floatval($totalBill), 2, '.', '');
            $totalBill = floatval($totalBill);
            $roundOf = $_POST['rOf'];
            $netTotal = $_POST['netTotal'];
            $netTotal = number_format(floatval($netTotal), 2, '.', '');
            $netTotal = floatval($netTotal);


            //$invoiceNumber = $_POST["uInvoiceNumber"];
            $sqlCheckInvoice = "SELECT * FROM `updateInvoicenumber` WHERE 1";
            $resultCheckInvoice = mysqli_query($conn, $sqlCheckInvoice);
            $rowCheckInvoice = mysqli_num_rows($resultCheckInvoice);
            
            if ($rowCheckInvoice > 0) {
                $upadateInvoiceSql = "UPDATE `invoices` SET `date`='$date',`invoice_type`='$invoiceType',`buyer_name`='$buyerName',`buyer_gstin`='$buyerGstin',`buyer_address`='$buyerAddress',`buyer_state`='$buyerState',`buyer_code`='$buyerCode',`transport_name`='$transportName',`truck_number`='$truckNo',`rrlr_number`='$rrLrNo',`total_igst`='$totalIgst',`total_sgst`='$totalSgst',`total_cgst`='$totalCgst',`total_bill`='$totalBill',`round_of`=$roundOf,`net_bill`='$netTotal',`dt`=current_timestamp() WHERE invoice_number ='$invoiceNumber'";
                $updateInvoiceQuery = mysqli_query($conn,$upadateInvoiceSql);

                $deleteUpdateInvoice = "DELETE FROM updateInvoicenumber";
                $resultDeleteUpdateInvoice = mysqli_query($conn,$deleteUpdateInvoice);

                echo 'update'; 
                exit;
            }else{

                $invoiceSql = "INSERT INTO `invoices`(`invoice_number`, `date`, `invoice_type`, `buyer_name`, `buyer_gstin`, `buyer_address`, `buyer_state`, `buyer_code`, `transport_name`, `truck_number`, `rrlr_number`, `total_igst`, `total_sgst`, `total_cgst`, `total_bill`,`round_of`,`net_bill`, `dt`) 
                VALUES ('$invoiceNumber','$date','$invoiceType','$buyerName','$buyerGstin','$buyerAddress','$buyerState','$buyerCode','$transportName','$truckNo','$rrLrNo','$totalIgst','$totalSgst','$totalCgst','$totalBill','$roundOf','$netTotal',current_timestamp())";
                $invoiceQuery = mysqli_query($conn,$invoiceSql);
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

            


        }
?>