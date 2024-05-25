<?php
ob_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);


include '../nav/navigation.php';
echo ' <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">';
ob_end_flush(); // Flush the output buffer and send its contents to the browser
?>
<?php

include '../partials/_dbconnect.php';


if (isset($_POST["printInvoiceNumber"])) {

    $invoiceNumber = mysqli_real_escape_string($conn, $_POST["printInvoiceNumber"]);
    

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Assuming you have a database connection established, replace the following with your database connection code
$fetchfrominvoice = "SELECT * FROM `invoices` WHERE invoice_number = '$invoiceNumber'";

$result = $conn->query($fetchfrominvoice);

if ($result->num_rows > 0) {
    // Fetch data from each row
    while ($row = $result->fetch_assoc()) {

        $invoiceNumber = $row['invoice_number'];
        $date = $row['date'];
        $invoiceType = $row['invoice_type'];
        $buyerName = $row['buyer_name'];
        $buyerGSTIN = $row['buyer_gstin'];
        $buyerAddress = $row['buyer_address'];
        $buyerState = $row['buyer_state'];
        $buyerCode = $row['buyer_code'];
        $transportName = $row['transport_name'];
        $truckNumber = $row['truck_number'];
        $rrlrNumber = $row['rrlr_number'];
        $totalIGST = $row['total_igst'];
        $totalSGST = $row['total_sgst'];
        $totalCGST = $row['total_cgst'];
        $amount = $row['total_bill'];
        $roundOf = $row['round_of'];
        $netAmount= $row['net_bill'];

        // echo "Amount: " . $amount . "<br>";
        // echo "Round Off: " . $roundOf . "<br>";
        // echo "Net Amount: " . $netAmount;

        // // Print or use the fetched variables as needed
        // echo "Invoice Number: $invoiceNumber, Date: $date, Invoice Type: $invoiceType, Buyer Name: $buyerName, Buyer GSTIN: $buyerGSTIN, Buyer Address: $buyerAddress, Buyer State: $buyerState, Buyer Code: $buyerCode, Transport Name: $transportName, Truck Number: $truckNumber, RRLR Number: $rrlrNumber, Total IGST: $totalIGST, Total SGST: $totalSGST, Total CGST: $totalCGST";
    }
} else {
    echo "No records found";
}

$sql = "SELECT `Id`, `Name`, `Address`, `Gstin`, `Code`, `State`, `Contact`, `Email`, `bankName`, `A/CNO`, `branch`, `IFSC`, `Pan`,`logo`, `dt` FROM `personal`";

// Execute the query
$result = $conn->query($sql);

// Check if the query was successful
if ($result) {
    // Check if there are rows returned
    if ($result->num_rows > 0) {
        // Fetch the data
        while ($row = $result->fetch_assoc()) {
            // Store values in variables
            $Id = $row['Id'];
            $Name = $row['Name'];
            $Address = $row['Address'];
            $Gstin = $row['Gstin'];
            $Code = $row['Code'];
            $State = $row['State'];
            $Contact = $row['Contact'];
            $Email = $row['Email'];
            $bankName = $row['bankName'];
            $ACNO = $row['A/CNO'];
            $branch = $row['branch'];
            $IFSC = $row['IFSC'];
            $Pan = $row['Pan'];
            $dt = $row['dt'];
            $logo = $row['logo'];

            // Echo the values
            // echo "Id: $Id, Name: $Name, Address: $Address, Gstin: $Gstin, Code: $Code, State: $State, Contact: $Contact, Email: $Email, Bank Name: $bankName, A/CNO: $ACNO, Branch: $branch, IFSC: $IFSC, Pan: $Pan, Date: $dt<br>";
        }
    } else {
        echo "No records found";
    }

    // Free the result set
    $result->free_result();
} else {
    // Display an error message if the query fails
    echo "Error: " . $conn->error;
}


// Close the connection
$conn->close();






?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Two Containers Example</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
   <style>
        .card1,.card2{
            height:200px;
            display: flex;
            flex-direction: row;
            padding:0;
          
        }
        .card3{
            height:480px;
            display: flex;
            flex-direction: row;
            padding:0;
        }
        .card4{
            height:70px;
            pading-bottom:5px;
            display: flex;
            flex-direction: row;
            padding:0;
        }
        .card5{
            height:150px;
            display: flex;
            flex-direction: row;
            padding:0;
        }
        .card6{
            height:170px;
            display: flex;
            flex-direction: row;
            padding:0;
        }
        .card7{
            height:200px;
            display: flex;
            flex-direction: row;
            padding:0;
        }

        .co-container1{
            padding:0;
            height:200px;
            display:flex;
        }
        .co-container2{
            height:200px;
            display:flex;
        }
    
        .co-container4{
            width:100%;
            height:70px;
            padding-left:0.5%;
        }
        .co-container5{
            width:100%;
            height:150px;
        }
        .co-container6{
            width:100%;
            padding-top:0.5%;
            height:170px;
            padding-left:0.5%;
        }
        .co-container7{
            width:100%;
            height:200px;
            padding-left:0.5%;
            
        }
        .align-right{
            text-align:right;
        }
        
        .logo{
            width:27%;
            /* border-left:none;
            border-right:none; */
            height:100%;
        }
        .compony_info{
            width:73%;
            height:100%;
            padding:1%;
        }
        h5,p{
            margin:0px;
        }
        span{
            font-weight:bold;
            margin-right:2%;
        }
        hr{
            margin:0px;
            margin-top:1.2%;
            margin-right:5%;
            padding:0px;
            border-width: 2px;

        }
    
.row{
    display:flex;

    height:25%;
    margin-left:0%;
    margin-right:0%;

}
.col{
    padding-right:0;
    padding-left:0.5%;
}
.col1{

 
    padding-left:0.5%;
}
.big{
    height:12.5rem;
}

.totaltd{
    height:0.08rem;
}
.amtwdth{
    width:21.7%;

}
.dodwdth{
    width:23.3%;
}
.nowdth{
    width:4.9%;
}
.w-10{
    width:12.7%;
}     
.w-15{
    width:15.7%;
}
.w-60{
    width:54%;
}
.w-61{
    width:60%;
}
.w-40{
    width:46%;
}
.w-30{
    width:39%;
}

.w-70{
    width:61%;
    padding-right:1%;
}
.bt{
    border-top:2px solid black;
}
.bt2{
    border-top:2px solid black;
}
.bb{
    border-bottom:2px solid black;
}
.bl{
    border-left:2px solid black;
}
.bl2{
    border-left:2px solid black;
}
.rl{
    border-right:none;
}
.br{
    border-right:2px solid black;
}
.col2{
    width:55.5%;
    padding-right:0;
    padding-left:0.5%;

}
.row{
    display:flex;
}
.col3{
    width:44.5%;
    padding-right:0;
    padding-left:0.5%;
}

.logo {
    display: flex;
    justify-content: center;
    align-items: center;
}

.d-flex {
        display: flex;
    }
.componyLogo{
    max-width: 187px; 
    max-height: 140px;
}
@media print {
    .navbar{
        display: none !important;
    }
    .buttons {
        display: none !important; /* Hide the buttons */
    }
    .container {
        margin-top: 1.2rem !important; /* Remove top margin */
        padding-top: 0 !important; /* Remove top padding */
    }
}

    </style>

<script>
    // Function to update the invoice number display
    function updateInvoiceNumber() {
        var invoiceTypeInput = document.getElementById("invoiceType").value;   

        if (invoiceTypeInput.trim() !== "") {
            document.getElementById('invoiceNumberDisplay').innerHTML = "( " + invoiceTypeInput + " )";
        } else {
            document.getElementById('invoiceNumberDisplay').innerHTML = " "; // Clear the display if no invoice type selected
        }

        // document.getElementById('invoiceNumberDisplay').innerHTML = "( " + invoiceTypeInput + " )";
    }

    // Listen for changes in the invoice type dropdown
    // document.getElementById("invoiceType").addEventListener("change", updateInvoiceNumber);
</script>
</head>
<body>

<!-- First Container -->
<div class="container px-0 py-0 mt-4 bb">
<div class="d-flex justify-content-between align-items-center mb-3 buttons">
    <input type="search" list="browsers" class="form-control mr-2" id="invoiceType" name="invoiceType" placeholder="Invoice Type" onchange="updateInvoiceNumber()" required/>
    <datalist id="browsers">
        <option value=" "></option>
        <option value="Original">Original</option>
        <option value="Duplicate">Duplicate</option>
    </datalist>
    <button class="btn btn-primary mr-2" onclick="window.print()">Print</button>
    <button class="btn btn-secondary">Cancel</button>
</div>


    <div class="d-flex justify-content-between align-items-center">
        <h3 class="mx-auto text-center">Tax Invoice</h3>
        <p id="invoiceNumberDisplay"></p>
    </div>



    


    <div class="card1 br">
        <div class="co-container1 br w-60">
            <div class="logo bl br bt">
            <img class="componyLogo" src="data:image/jpeg;base64,<?= base64_encode($logo); ?>" alt="Company Logo" style="">
            </div>
            <div class="compony_info bt">
                <h5>Balaji Bioful</h5>
                <p><span>Address:</span><?= $Address ?></p>
                <p><span>GSTIN:</span> <?= $Gstin ?></p>
                <p><span>State Name:</span> <?= $State ?> &emsp; &emsp; <span>Code:</span> <?= $Code ?></p>
                <p><span>Contact:</span> <?= $Contact ?></p>
                <p><span>Email:</span> <?= $Email ?></p>
                <p><span>PAN:</span> <?= $Pan ?></p>
            </div>
        </div>
        <div class="co-container1 w-40 flex-column">
                <div class="row">
                    
                    <div class="col2 bt br">
                        <p>Invoice No. &emsp; E-way Bill No.</p>
                        <p> <span><?= $invoiceNumber ?></span>  <span></span></p>
                    </div>
                    <div class="col3 bt pr-0">
                        <p>Dated:</p>
                        <p><span><?= $date ?></span></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col2 bt br">
                        <p>Delivery Note.</p>
                    </div>
                    <div class="col3 bt pr-0">
                        <p>Mode/Terms of Payment</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col2 bt br">
                        <p>Reference No. & Date.</p>
                    </div>
                    <div class="col3 bt pr-0">
                        <p>Other References</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col2 bt br">
                        <p>Buyer's Order No.</p>
                    </div>
                    <div class="col3 bt pr-0">
                        <p>Dated</p>
                    </div>
                </div>
        </div>      
    </div>
    <div class="card2 br">
        <div class="co-container2 bl br bt w-60 flex-column">
            <div class="col1">
                <p><span>Buyer (Bill To) :</span></p>
            </div>
            <div class="col1">
                <p><span>Buyer Name :</span> <?= $buyerName ?></p>
            </div>
            <div class="col1 pb-3">
                <p><span>Address:</span><?= $buyerAddress ?></p>
            </div>
            <div class="col1">
                <p><span>GSTIN:</span><?= $buyerGSTIN ?></p>
            </div>
            <div class="col1">
                <p><span>State:</span><?= $buyerState ?> &emsp; &emsp; <span>Code:</span> <?= $buyerCode ?></p>
            </div>
            <div class="col1">
                <p><span>Place of supplay:</span><?= $buyerState ?></p>
            </div>
        </div>
        <div class="co-container2 w-40 flex-column">
            <div class="row ">
                    
                    <div class="col2 bb br bt pr-5">
                        <p>Dispatch Document No,</p>
                        <p> <span>.....</span>  <span></span></p>
                    </div>
                    <div class="col3 bb bt">
                        <p>Delivery Note Date.</p>
                        <p><span>08-10-2021</span></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col2 bb br pr-5">
                        <p>Dispatched though.</p>
                        <p><?= $transportName ?></p>
                    </div>
                    <div class="col3 bb">
                        <p>Destination.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col2 bb br pr-5">
                        <p>Bill of Landing/LR-RR No.</p>
                        <p><?= $rrlrNumber ?></p>
                    </div>
                    <div class="col3 bb">
                        <p>Motor Vehicle No.</p>
                        <p><?= $truckNumber ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <p>Terms of Delivery</p>
                    </div>
                    
                </div>
        </div>      
    </div>
    <div class="card3 bb br bl">

            <?php 
            include '../partials/_dbconnect.php';
// Assuming $inv is the invoice number you're looking for
$inv = mysqli_real_escape_string($conn, $invoiceNumber);

// Your SQL query to fetch data from the cart table
$fetchproduct = "SELECT * FROM `cart` WHERE invoiceNumber='$inv'";

// Execute the query
$result = mysqli_query($conn, $fetchproduct);

// Check if the query was successful
if ($result) {
    // Check if there are rows returned
    if (mysqli_num_rows($result) > 0) {
        // Display the new table header for product details
        echo "<table name='items' class='table bt' style='margin-bottom: 0;'>";
        echo "<tr style='height: 1%;' class='border m-0 p-0'>
        <th style='height: 5%;' class='text-center align-middle nowdth bt bb'>No.</th>
        <th style='height: 5%;' class='text-center align-middle dodwdth bt bl bb'>Description of Goods</th>
        <th style='height: 5%;' class='text-center align-middle w-10 bt bl bb'>HSN/SAC</th>
        <th style='height: 5%;' class='text-center align-middle w-10 bt bl bb'>GST Rate</th>
        <th style='height: 5%;' class='text-center align-middle w-10 bt bl bb'>Quantity M.T</th>
        <th style='height: 5%;' class='text-center align-middle w-10 bt bl bb'>Rate per M.T</th>
        <th style='height: 5%;' class='text-center align-middle amtwdth bt bl bb'>Amount</th>
        </tr>";

        $totalHeightOfOtherRows = 0;
        $tsgst = 0;
        $tcgst = 0;
        $tigst = 0;
        $tAmount= 0;
        $n = 0;
        // Fetch and process the data for product details
        while ($row = mysqli_fetch_assoc($result)) {
            $n += 1;
            // Additional information for the new table
            $productName = $row['productName'];
            $hsnCode = $row['hsnCode'];
            $quantity = $row['quantity'];
            $productRate = $row['productCost'];
            $gst = $row['igst']+$row['cgst']+$row['sgst'];
            $totalHeightOfOtherRows += 5;
            $tsgst += $row['sgstValue'];
            $tcgst += $row['cgstValue'];
            $tigst += $row['igstValue'];
            $tAmount += $row['pCost'];
            // Display the new table row for product details
            echo "<tr style='height: 1%; '>";
            echo "<td class='text-center align-top pb-0'>"  .$n.".". "</td>";
            echo "<td class='text-center align-top pb-0 bl'>" . $productName . "</td>";
            echo "<td class='text-center align-top pb-0 bl'>" . $hsnCode . "</td>";
            echo "<td class='text-center align-top pb-0 bl'>" . $gst . "</td>";
            echo "<td class='text-center align-top pb-0 bl'>" . $quantity . "</td>";
            echo "<td class='text-center align-top pb-0 bl'>" . $productRate . "</td>";
            
            echo "<td class='text-right align-top amtwdth bl'>" . $row['pCost'] . "</td>";
            echo "</tr>";

        }
        $remainingHeight = 100 - $totalHeightOfOtherRows ;
        echo "<tr style='height: {$remainingHeight}%;'>";
echo "<td class='text-center align-top'></td>";
echo "<td class='text-right align-middle bl'><hr width=0px;> CGST </br> SGST </br> IGST </br> Round off </td>";
echo "<td class='text-center align-top bl'></td>";
echo "<td class='text-center align-top bl'></td>";
echo "<td class='text-center align-top bl'></td>";
echo "<td class='text-center align-top bl'></td>";
echo "<td class='text-right align-middle bl'>$tAmount </br><hr>$tcgst
</br >$tsgst</br>$tigst </br>$roundOf </td>";
echo "</tr>";

echo "<tr class='bt' height='20px'>";
echo "<td class='text-center align-top br bt' colspan='6'>Total</td>";
echo "<td class='text-right align-middle bl '>$netAmount</td>";
echo "</tr>";

        echo "</table>";

        // Initialize an array to store aggregated values based on HSN code
        $aggregatedValues = array();

        // Fetch and process the data for aggregated values
        mysqli_data_seek($result, 0); // Reset the result set pointer to the beginning
        while ($row = mysqli_fetch_assoc($result)) {
            $hsnCode = $row['hsnCode'];

            // If the HSN code is not in the aggregatedValues array, initialize it
            if (!isset($aggregatedValues[$hsnCode])) {
                $aggregatedValues[$hsnCode] = array(
                    'igstValue' => 0,
                    'cgstValue' => 0,
                    'pCost' => 0,
                    'sgstValue' => 0,
                    'sgst' => 0,
                    'igst' => 0,
                    'cgst' => 0,
                );
            }

            // Accumulate values based on HSN code
            $aggregatedValues[$hsnCode]['pCost'] += $row['pCost'];
            $aggregatedValues[$hsnCode]['igst'] = $row['igst'];
            $aggregatedValues[$hsnCode]['igstValue'] += $row['igstValue'];
            $aggregatedValues[$hsnCode]['cgstValue'] += $row['cgstValue'];
            $aggregatedValues[$hsnCode]['cgst'] = $row['cgst'];
            $aggregatedValues[$hsnCode]['sgstValue'] += $row['sgstValue'];
            $aggregatedValues[$hsnCode]['sgst'] = $row['sgst'];
        }


    } else {
        echo "No rows found";
    }

    // Free the result set
    mysqli_free_result($result);
} else {
    // Display an error message if the query fails
    echo "Error: " . mysqli_error($conn);
}
?>
<?php
function convertToWords($number){
    $no = floor($number);
    $point = round($number - $no, 2) * 100;
    $hundred = null;
    $digits_1 = strlen($no);
    $i = 0;
    $str = array();
    $words = array('0' => '', '1' => 'One', '2' => 'Two',
        '3' => 'Three', '4' => 'Four', '5' => 'Five', '6' => 'Six',
        '7' => 'Seven', '8' => 'Eight', '9' => 'Nine',
        '10' => 'Ten', '11' => 'Eleven', '12' => 'Twelve',
        '13' => 'Thirteen', '14' => 'Fourteen',
        '15' => 'Fifteen', '16' => 'Sixteen', '17' => 'Seventeen',
        '18' => 'Eighteen', '19' =>'Nineteen', '20' => 'Twenty',
        '30' => 'Thirty', '40' => 'Forty', '50' => 'Fifty',
        '60' => 'Sixty', '70' => 'Seventy',
        '80' => 'Eighty', '90' => 'Ninety');
    $digits = array('', 'Hundred', 'Thousand', 'Lakh', 'Crore');
    while ($i < $digits_1) {
        $divider = ($i == 2) ? 10 : 100;
        $number = floor($no % $divider);
        $no = floor($no / $divider);
        $i += ($divider == 10) ? 1 : 2;
        if ($number) {
            $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
            $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
            $str [] = ($number < 21) ? $words[$number] .
                " " . $digits[$counter] . $plural . " " . $hundred
                :
                $words[floor($number / 10) * 10]
                . " " . $words[$number % 10] . " "
                . $digits[$counter] . $plural . " " . $hundred;
        } else $str[] = null;
    }
    $str = array_reverse($str);
    $result = implode('', $str);

    // Capitalize the first letter of the result
    $result = ucfirst($result);

    // Handle the decimal part
    $points = '';
    if ($point) {
        if ($point < 20) {
            $points .= $words[$point];
        } else {
            $points .= $words[floor($point / 10) * 10];
            if ($point % 10 > 0) {
                $points .= ' ' . $words[$point % 10];
            }
        }
    }

    // Check if the point part is non-zero
    if ($points == '') {
        echo $result . " only";
    } else {
        echo $result . " Rupees and " . $points . " Paise only";
    }
}

?>


    </div>
    <div class="card4 bl bb br">
        <div class="co-container4">

            <p>Amount Chargeable(In words)</p>
            <p><span><?php echo convertToWords($netAmount); ?> </span></p>
        </div>      
    </div>
    <div class="card5 bl2">
        <div class="co-container5 br">
        <table class="table table-bordered border-dark">
    <tr class="small-row" style="height:5px;">
        <th class="text-center align-middle w-15" rowspan="2" style="padding: 0;">HSN/SAC</th>
        <th class="text-center align-middle w-10" rowspan="2" style="padding: 0;">Taxable<br/> Value</th>
        <th class="text-center align-middle" colspan="2" style="padding: 0;">Central Tax</th>
        <th class="text-center align-middle" colspan="2" style="padding: 0;">State Tax</th>
        <th class="text-center align-middle" rowspan="2" style="padding: 0;">Total Tax Amount</th>
    </tr>
    <tr class="small-row" style="height:5px;">
        <th class="text-center align-middle w-10" style="padding: 0;">Rate</th>
        <th class="text-center align-middle w-10" style="padding: 0;">Amount</th>
        <th class="text-center align-middle w-10" style="padding: 0;">Rate</th>
        <th class="text-center align-middle w-10" style="padding: 0;">Amount</th>
    </tr>
<?php 
$netTax = 0;
foreach ($aggregatedValues as $hsnCode => $values) {
    $ttax = $values['sgstValue'] + $values['cgstValue'];
    $netTax += $ttax;
    echo "<tr class='small-row'>";
    echo "<td class='text-center align-middle p-0' style='height: 5px; min-height: 5px;'>" . $hsnCode . "</td>";
    echo "<td class='text-center align-middle p-0' style='height: 5px; min-height: 5px;'>" . number_format($values['pCost'], 2). "</td>";
    echo "<td class='text-center align-middle p-0' style='height: 5px; min-height: 5px;'>" . number_format($values['cgst'], 2) . "</td>";
    echo "<td class='text-center align-middle p-0' style='height: 5px; min-height: 5px;'>" . number_format($values['cgstValue'], 2) . "</td>";
    echo "<td class='text-center align-middle p-0' style='height: 5px; min-height: 5px;'>" . number_format($values['sgst'], 2) . "</td>";
    echo "<td class='text-center align-middle p-0' style='height: 5px; min-height: 5px;'>" . number_format($values['sgstValue'], 2) . "</td>";
    echo "<td class='text-center align-middle p-0' style='height: 5px; min-height: 5px;'>" .number_format($ttax, 2). "</td>";
    echo "</tr>";
}

?>
<tr class='mb-2'>
    <td class='text-center align-middle' style='height: 100%'>Total</td>
    <td class='text-center align-middle' style='height: 100%;'><?php echo $amount; ?></td>
    <td class='text-center align-middle' style='height: 100%;'></td>
    <td class='text-center align-middle' style='height: 100%;'><?php echo $totalCGST; ?></td>
    <td class='text-center align-middle' style='height: 100%;'></td>
    <td class='text-center align-middle' style='height: 100%;'><?php echo $totalSGST; ?></td>
    <td class='text-center align-middle' style='height: 100%;'><?php echo $netTax; ?></td>
</tr>



</table>
        </div>      
    </div>
    <div class="card6">
        <div class="co-container6 bl bt br">
            <p class="">Tax Amount (in words) :
<span class=""><?php echo convertToWords($netTax); ?></span></p>
<p></br></p>
<p>Company's Bank Details</p>
<p>Bank Name <span>:<?= $bankName ?></span></p>
<p>A/C No. <span>:<?= $ACNO ?></span></p>
<p>Branch <span>:<?= $branch ?></span></p>
<p>IFS Code <span>:<?= $IFSC ?></span></p>
        </div>      
    </div>
    <div class="card7 br">
        <div class="co-container7 w-30 bl">
</br>
<br>
<p></br>Declaration</p>
<hr>
<p>We declare that this invoice shows the actual price of the goods described and that all particulars are true and correct.</p>

        </div>
        <div class="co-container7 align-right w-70 bl bt">
            <span>for Balaji Bioful</span>
</br></br></br>
<br><br><br>
<br>
            <P>Authorized Signatory </P>
        </div>       
    </div>

</div>

<!-- Bootstrap JS and Popper.js (required for some Bootstrap components) -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>
</html>

<?php
}
else{
    echo "Invoice Not Find";
}

?>