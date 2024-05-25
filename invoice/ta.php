<?php
ob_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);


include '../nav/navigation.php';
echo ' <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">';
ob_end_flush(); // Flush the output buffer and send its contents to the browser
?>
<!DOCTYPE html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Floating Label Example</title>
    <!-- Bootstrap CSS -->
    
    <link rel="stylesheet" href="invoice.css"> <!-- Include jQuery library -->
    <script type="text/javascript" src="invoice.js"></script>
    
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<link rel="stylesheet" href="invoice.css">
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"> -->
<!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<!-- Bootstrap JS and Popper.js (required for some Bootstrap components) -->

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->



<!-- Bootstrap Table JS -->


<!-- Your custom script -->
<script type="text/javascript" src="invoice.js"></script>

<script>
//    document.getElementById("buyerName").addEventListener("input", function() {
//         updateBuyerInfo();
//     });


        function myFunction() {
    // Create FormData objects for each form
  

    // Append data from totalFormData to basicFormData
    var userData = {
        buyerName: $("#buyerName").val()
        
        // Use the correct selector for the input field
    };

    // Use basicFormData for the AJAX request
    $.ajax({
        type: "POST",

        url: "check_buyer.php",
        data: userData,
        success: function (response) {
            console.log(response);
                $("#buyerGstin").val(response.buyerGstin1);
                    $("#buyerAddress").val(response.buyerAddress1);
                    $("#buyerState").val(response.buyerState1);
                    $("#buyerCode").val(response.buyerCode1);

          
        },
        error: function (xhr, status, error) {
            console.error(xhr, status, error);
            alert("Error submitting forms: " + error);
        }
    });
}
    </script>
    <!-- Add this script in the <head> section of your HTML -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('#buyerName').change(function() {
        var buyerName = $(this).val();
        if (buyerName !== '') {
            $.ajax({
                url: 'fetch_buyer_details.php',
                type: 'post',
                data: { buyerName: buyerName },
                dataType: 'json',
                success: function(response) {
                    console.log(response);
                    if (response.status == 'success') {
                        $('#buyerGstin').val(response.data.buyerGstin);
                        $('#buyerAddress').val(response.data.buyerAddress);
                        $('#buyerState').val(response.data.buyerState);
                        $('#buyerCode').val(response.data.buyerCode);
                        // Populate other fields as needed
                    } else {
                        alert('Buyer details not found');
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr, status, error);
                    alert('Error fetching buyer details');
                }
            });
        }
    });
});
</script>
<script type="text/javascript" src="state.js"></script>



</head>
   
    <body>

<div class="main border border-dark">


    <div class="container px-5 form-container">
        <div class="row">
            <div class="col mt-5">
                <form action="saveInvoice" method="post" id="basicForm">
                    <div class="form-row">
                        <div class="col form-group">
                            <?php
                                    include 'invoiceNumber.php';

                            ?>
                            <input type="text" class="form-control" id="invoiceNumber" name="invoiceNumber" value="<?php echo $invoiceNumber; ?>" readonly>
                            <label for="invoiceNumber">Invoice Number</label>
                        </div>
                        <div class="col form-group">
                            <input type="date" class="form-control" id="date" name="date" value="<?php echo $date; ?>" placeholder=" " required>
                            <label for="date">Date</label>
                        </div>
                        <div class="col form-group">
                            <input type="search" list="browsers" class="form-control"  id="invoiceType" name="invoiceType" value="<?php echo $invoiceType; ?>" placeholder=" " required/>
                                <datalist id="browsers">
                                    <option value="Tax Invoice">
                                    <option value="Retail Invoice">
                                    
                                </datalist>
                                <label for="invoiceType">Invoice Type</label>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col form-group">
                            <input type="search" list="buyersList2" class="form-control" id="buyerName" name="buyerName" value="<?php echo ucwords($buyerName); ?>" oninput="this.value = this.value.replace(/\b\w/g, function(char) { return char.toUpperCase(); });" placeholder=" " required>
                            <!-- <input type="search" list="buyersList2" class="form-control" id="buyerName" name="buyerName" value="<?php  ?>" onchange="myFunction()" onchange="this.value = this.value.replace(/\b\w/g, function(char) { return char.toUpperCase(); });" placeholder=" " required> -->
                            <label for="buyerName">Buyer's Name:</label>
                            <datalist id="buyersList2">
                                    
                        <?php
                       // Fetch and display buyer names from your data source (replace this with your actual data retrieval logic)
                            include '../partials/_dbconnect.php';
                            $query = "SELECT DISTINCT buyerName FROM buyers";
                            $result = mysqli_query($conn, $query);

                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<option value='" . $row['buyerName'] . "'>";
                            }
                            ?>
                            </datalist>
                        
                        </div>

                        <div class="col form-group">
                            <input type="text" class="form-control" id="buyerGstin" name="buyerGstin" value="<?php echo $buyerGstin; ?>" value="<?php echo $buyerGstin1; ?>" oninput="this.value = this.value.toUpperCase();" placeholder=" " required>
                            <label for="buyerGstin">Buyer's GSTIN</label>
                        </div>
                        <div class="col form-group d-none d-lg-block invisible">
                            <input type="text" class="form-control" id="disabled" placeholder=" " disabled>
                            <label for="disabled">disabled</label>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col form-group">
                        <input type="text" class="form-control" id="buyerAddress" name="buyerAddress" value="<?php echo ucwords($buyerAddress); ?>" placeholder=" " oninput="this.value = this.value.replace(/\b\w/g, function(char) { return char.toUpperCase(); });" required>


                            <label for="buyerAddress">Address</label>
                        </div>
                        <div class="col form-group">
                            <select class="form-control" id="buyerState" name="buyerState" value="<?php echo $buyertState; ?>" onchange="fillStateCode()" required>
                                <option value="">Select State</option>
                                <option value="JAMMU AND KASHMIR">JAMMU AND KASHMIR</option>
                                <option value="HIMACHAL PRADESH">HIMACHAL PRADESH</option>
                                <option value="PUNJAB">PUNJAB</option>
                                <option value="CHANDIGARH">CHANDIGARH</option>
                                <option value="UTTARAKHAND">UTTARAKHAND</option>
                                <option value="HARYANA">HARYANA</option>
                                <option value="DELHI">DELHI</option>
                                <option value="RAJASTHAN">RAJASTHAN</option>
                                <option value="UTTAR PRADESH">UTTAR PRADESH</option>
                                <option value="BIHAR">BIHAR</option>
                                <option value="SIKKIM">SIKKIM</option>
                                <option value="ARUNACHAL PRADESH">ARUNACHAL PRADESH</option>
                                <option value="NAGALAND">NAGALAND</option>
                                <option value="MANIPUR">MANIPUR</option>
                                <option value="MIZORAM">MIZORAM</option>
                                <option value="TRIPURA">TRIPURA</option>
                                <option value="MEGHALAYA">MEGHALAYA</option>
                                <option value="ASSAM">ASSAM</option>
                                <option value="WEST BENGAL">WEST BENGAL</option>
                                <option value="JHARKHAND">JHARKHAND</option>
                                <option value="ODISHA">ODISHA</option>
                                <option value="CHATTISGARH">CHATTISGARH</option>
                                <option value="MADHYA PRADESH">MADHYA PRADESH</option>
                                <option value="GUJARAT">GUJARAT</option>
                                <option value="DADRA AND NAGAR HAVELI">DADRA AND NAGAR HAVELI</option>
                                <option value="DAMAN">DAMAN</option>
                                <option value="DIU">DIU</option>
                                <option value="MAHARASHTRA">MAHARASHTRA</option>
                                <option value="ANDHRA PRADESH">ANDHRA PRADESH</option>
                                <option value="KARNATAKA">KARNATAKA</option>
                                <option value="GOA">GOA</option>
                                <option value="LAKSHADWEEP">LAKSHADWEEP</option>
                                <option value="KERALA">KERALA</option>
                                <option value="TAMIL NADU">TAMIL NADU</option>
                                <option value="PUDUCHERRY">PUDUCHERRY</option>
                                <option value="ANDAMAN AND NICOBAR ISLANDS">ANDAMAN AND NICOBAR ISLANDS</option>
                                <option value="TELANGANA">TELANGANA</option>
                                <option value="ANDHRA PRADESH">ANDHRA PRADESH</option>
                                <option value="LADAKH (NEWLY ADDED)">LADAKH (NEWLY ADDED)</option>
                                <option value="OTHER TERRITORY">OTHER TERRITORY</option>
                                <option value="CENTRE JURISDICTION">CENTRE JURISDICTION</option>
                            </select>
                            <label for="buyerState">State</label>

                        </div>
                        <div class="col form-group">
                            <input type="text" class="form-control" id="buyerCode" name="buyerCode" value="<?php echo $buyerCode; ?>" placeholder=" " required>
                            <label for="buyerCode">Code</label>
                        </div>
                    
                    </div>
                    <div class="form-row">
                        <div class="col form-group">
                            <input type="text" class="form-control" id="transportName" name="transportName" value="<?php echo $transportName; ?>" placeholder=" " oninput="this.value = this.value.replace(/\b\w/g, function(char) { return char.toUpperCase(); });" required>
                            <label for="transportName">Transport Name</label>
                        </div>
                        <div class="col form-group">
                        <input type="text" class="form-control" id="truckNo" name="truckNo" value="<?php echo strtoupper($truckNumber); ?>" oninput="this.value = this.value.toUpperCase();" placeholder=" " required>

                            <label for="truckNo">Truck No</label>
                        </div>
                        <div class="col form-group">
                            <input type="text" class="form-control" id="rr-lr-no" name="rr-lr-no" value="<?php echo $RRLRNO; ?>" oninput="this.value = this.value.toUpperCase();" placeholder=" " required>
                            <label for="rr-lr-no">RR-LR No</label>
                        </div>
                    </div>
                    <!-- <div class="form-row">
                        <div class="col form-group">
                            <button type="submit" class="btn btn-info">Submit</button>
                        </div>
                    </div> -->
                </form>
            </div>
        </div>
    </div>

    <div class="container mt-4 pl-5 px-5 form-container">
    
        
        <div class="cart">
            <!-- <div class="border border-dark"> -->

            
            <div class="row pcart mr-0 ml-0 mb-2">
                <div class="col border border-dark half h-75 px-3 py-3">
                <h3 >Products Cart</h3>
                    <div class="row search-container mb-2">
                        <div class="col search">
                            <input type="text" class="form-control" id="search" placeholder="Search" required>
                        </div>
                    </div>
                    
                    <form id="mstrTable" action="code.php" method="POST">

                        <div class="table-responsive border border-dark" style="max-height: 209px; overflow-y: auto;">
                            <table class="table table-bordered retrive table-hover">
                                <thead class="thead-dark">
                                    <tr>

                                        <th class="text-center px-4 align-middle">Product Id </th>
                                        <th class="text-center px-4 align-middle">Product Name </th>
                                        <th class="text-center px-4 align-middle">Product Cost </th>
                                        <th class="text-center px-4 align-middle">HSN Code </th>
                                        <th class="text-center px-4 align-middle">IGST(%) </th>
                                        <th class="text-center px-4 align-middle">CGST(%) </th>
                                        <th class="text-center px-4 align-middle">SGST(%)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    include '../partials/_dbconnect.php';

                                    $query = "SELECT * from products";
                                    $query_run = mysqli_query($conn, $query);
                                    if (mysqli_num_rows($query_run) > 0) {
                                        $r = 0;
                                        foreach ($query_run as $row) {
                                            $r = $r + 1;
                                    ?>
                                            <tr>
                                            
                                            <td class="text-center align-middle"><?= $row["ProdId"]; ?></td>
                                            <td class="text-center align-middle"><?= $row["ProdName"]; ?></td>
                                            <td class="text-center align-middle"><?= $row["ProdPrice"]; ?></td>
                                            <td class="text-center align-middle"><?= $row['hsn']; ?></td>
                                            <td class="text-center align-middle"><?= $row['IGST'] ; ?></td>
                                            <td class="text-center align-middle"><?= $row["CGST"]; ?></td>
                                            <td class="text-center align-middle"><?= $row["SGST"] ; ?></td>
                                        </tr>
                                    <?php
                                        
                                        }
                                    } else {
                                    ?>
                                        <tr colspan="3">
                                            <td class="text-center" colspan="9">NO RECORD FOUND</td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
            </div>
        
            <!-- </div>                -->



            <div class="row cartdetail border border-dark pl-0 ml-0 mr-0" id="cartDetailForm">
                <div class="col">
                    <h3>Product Information</h3>
                 <form class="orderCart mt-4">

                        <!-- <div class="form-row flxc"> -->
                        <div class="form-row"> 
                        <!-- <input type="hide" class="form-control" id="invoiceNumber1" name="invoiceNumber"  readonly> -->
                     
                            <div class="col form-group">
                                <input type="text" class="form-control" id="productId" name="productId" placeholder=" " required>
                                <label for="productId">Product Id:</label>
                            </div>
                    
                            <div class="col form-group">
                                <input type="text" class="form-control" id="productName" name="productName" placeholder=" " required>
                                <label for="productName">Product Name:</label>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col form-group">
                                <input type="text" class="form-control" id="productCost" name="productCost" placeholder=" " required>
                                <label for="productCost">Product Cost:</label>
                            </div>
                            <div class="col form-group">
                                <input type="text" class="form-control" id="quantity" name="quantity" placeholder=" " required>
                                <label for="quantity">Quantity(Tons):</label>
                            </div>
                            
                        </div>
                        <div class="form-row">
                            <div class="col form-group">
                                <input type="text" class="form-control" id="hsnCode" name="hsnCode" placeholder=" " required>
                                <label for="hsnCode">HSN Code</label>
                            </div>
                        
                            
                        </div>
                        <div class="form-row">
                            <div class="col form-group">
                                <input type="text" class="form-control" id="igst" name="igst" placeholder=" " required>
                                <label for="igst">IGST %</label>
                            </div>
                            <div class="col form-group">
                                <input type="text" class="form-control" id="igstValue" name="igstValue" placeholder=" " required>
                                <label for="igstValue">IGST Value</label>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col form-group">
                                <input type="text" class="form-control" id="cgst" name="cgst" placeholder=" " required>
                                <label for="cgst">CGST %</label>
                            </div>
                            <div class="col form-group">
                                <input type="text" class="form-control" id="cgstValue" name="cgstValue" placeholder=" " required>
                                <label for="cgstValue">CGST Value</label>
                            </div>
                            
                            
                        </div>
                        <div class="form-row">
                            <div class="col form-group ">
                                <input type="text" class="form-control" id="sgst" name="sgst" placeholder=" " required>
                                <label for="sgst">SGST %</label>
                            </div>
                            <div class="col form-group ">
                                <input type="text" class="form-control" id="sgstValue" name="sgstValue"  value="" placeholder=" " required>
                                <label for="sgstValue">SGST Value</label>
                            </div>
                        </div>
                        <div class="form-row">
                        <div class="col form-group ">
                                <input type="text" class="form-control" id="pCost" name="pCost" placeholder=" " required>
                                <label for="pCost">Product Cost</label>
                            </div>
                            <div class="col form-group ">
                                <input type="text" class="form-control" id="tCost" name="tCost" placeholder=" " required>
                                <label for="tCost">Total Product Cost</label>
                            </div>
                           
                        </div>
                        <div class="form-row">
                            <div class="col form-group">
                                <button type="submit" class="btn btn-info mr-4 " name="addToCart" id="addToCart">Add to cart</button>
                                <!-- <button type="button" class="btn btn-danger ml-2" id="removeButton">Remove</button> -->
                            </div>
                            <div class="col form-group">

                                <button type="button" class="btn btn-danger ml-2" id="removeButton" >Remove</button>
                            </div>
                        </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    


    <script type="text/javascript">
       // $(document).ready(function() {
    document.querySelector("#addToCart").addEventListener("click", function (event) {
    event.preventDefault();  // Prevent default form submission

    var userData = {
        invoiceNumber: $("#invoiceNumber").val(),
        productId: $("#productId").val(),
        productName: $("#productName").val(),
        productCost: $("#productCost").val(),
        quantity: $("#quantity").val(),
        hsnCode: $("#hsnCode").val(),
        igst: $("#igst").val(),
        igstValue: $("#igstValue").val(),
        cgst: $("#cgst").val(),
        cgstValue: $("#cgstValue").val(),
        sgst: $("#sgst").val(),
        sgstValue: $("#sgstValue").val(),
        pCost: $("#pCost").val(),
        totalProductCost: $("#tCost").val() 
        // Use the correct selector for the input field
    };
    // jQuery.noConflict();

   // console.log(userData);
    $.ajax({
        type: "post",
        data: userData,
        url: "addToCart.php",
        success: function (response) {
            console.log(response);

  
            $('#totalValuesCalculation').load(location.href + ' #totalValuesCalculation');
            $('#displayTotalValues').load(location.href + ' #displayTotalValues');
            $('#cartTableContainer').load(location.href + ' #cartTableContainer');
           

            clearCartDetailForm();
        },
        error: function (xhr, status, error) {
                console.error(xhr, status, error);
                alert("Error adding product to cart: " + error);
            }
    });
    });

function clearCartDetailForm() {
        // Clear form fields in the cartdetail div
        $("#productId").val('');
        $("#productName").val('');
        $("#productCost").val('');
        $("#quantity").val('');
        $("#hsnCode").val('');
        $("#igst").val('');
        $("#igstValue").val('');
        $("#cgst").val('');
        $("#cgstValue").val('');
        $("#sgst").val('');
        $("#sgstValue").val('');
        $("#pCost").val('');
        $("#tCost").val('');
    }

//});
</script>
<?php

// $invoiceNumber = getInvoiceNumber(); // Replace with your actual method

// echo $invoiceNumber;

?>

<div id="cartTableContainer">
    <!-- Your cart table content goes here -->


    <div class="container mt-4 px-5 form-container">
    <div class="abs">
        <h3 class="ml">Products Cart</h3>
            <div class="row mr pl-4">
                <div class="col px-3 py-3">
                    <div class="row search-container mb-2">
                        <div class="col search">
                            <input type="text" class="form-control" id="searchProduct" placeholder="Search">
                        </div>
                    </div>
                    <!-- <form action="remove_product.php" method="POST" class="orderCart" onsubmit="return false;"> -->
<!-- <form class="orderCart"> -->
                    <form id="invoiceForm">
                    <!-- <form action="remove_product.php" method="POST" class="orderCart"> -->
                    <!-- max-height: 209px;  -->
                        <div class="table-responsive border border-dark" style="overflow-y: auto;">
                            <table class="table table-bordered retrive table-hover">

                                <thead class="thead-dark">
                                <tr>
                                <th class="text-center align-middle">Remove </th>
                                        <th class="text-center align-middle">Serial Number </th>
                                        <th class="text-center align-middle">Product Id </th>
                                        <th class="text-center align-middle">Product Name </th>
                                        <th class="text-center align-middle">Cost Per M.T </th>
                                        <th class="text-center align-middle">Quantity </th>
                                        <th class="text-center align-middle">HSN Code </th>
                                        <th class="text-center align-middle">IGST(%) </th>
                                        <th class="text-center align-middle">IGST Value </th>
                                        <th class="text-center align-middle">CGST(%) </th>
                                        <th class="text-center align-middle">IGST value </th>
                                        <th class="text-center align-middle">SGST(%)</th>
                                        <th class="text-center align-middle">IGST value </th>
                                        <th class="text-center align-middle">Product Cost </th>
                                        <th class="text-center align-middle">Total Product Cost </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    error_reporting(E_ALL);
                                    ini_set('display_errors', 1);
                                    include '../partials/_dbconnect.php';
                                    //$invoiceNumber = $_POST["uInvoiceNumber"];
                                    $sqlCheckInvoice = "SELECT * FROM `updateInvoicenumber` WHERE 1";
                                    $resultCheckInvoice = mysqli_query($conn, $sqlCheckInvoice);
                                    $rowCheckInvoice = mysqli_num_rows($resultCheckInvoice);
                                    
                                    if ($rowCheckInvoice == 1) {
                                        // Fetch the row data
                                        $rowInvoice = mysqli_fetch_assoc($resultCheckInvoice);
                                        // Get the invoiceNumber from the fetched row
                                        $invoiceNumber = $rowInvoice["invoiceNumber"];
                                    }
                                    
                                    // Assuming $invoiceNumber is defined or retrieved before this point
                                    // Replace with your actual method of getting the invoice number
                                    
                                    // echo $invoiceNumber;
                                    $query = "SELECT * FROM cart WHERE invoiceNumber = '$invoiceNumber'";

                                    $query_run = mysqli_query($conn, $query);
                                    if (mysqli_num_rows($query_run) > 0) {
                                    $r = 0;
                                        foreach ($query_run as $row) {
                                        $r = $r + 1;
                                    ?>
                                            <tr>
                                            <td class="text-center align-middle">
                                            <button type="button" class="btn btn-danger btn-sm btn-remove-product" data-product-id="<?= $row['productId'] ?>" data-quantity="<?= $row['quantity'] ?>">Remove</button>
                                            </td>
                                            <td class="text-center align-middle"><?php echo $r ?></td>
                                            <td class="text-center align-middle"><?= $row["productId"]; ?></td>
                                            <td class="text-center align-middle"><?= $row["productName"]; ?></td>
                                            <td class="text-center align-middle"><?= $row["productCost"]; ?></td>
                                            <td class="text-center align-middle"><?= $row['quantity']; ?></td>
                                            <td class="text-center align-middle"><?= $row['hsnCode'] ; ?></td>
                                            <td class="text-center align-middle"><?= $row["igst"]; ?></td>
                                            <td class="text-center align-middle"><?= $row["igstValue"] ; ?></td>
                                            <td class="text-center align-middle"><?= $row["cgst"] ; ?></td>
                                            <td class="text-center align-middle"><?= $row["cgstValue"] ; ?></td>
                                            <td class="text-center align-middle"><?= $row["sgst"] ; ?></td>
                                            <td class="text-center align-middle"><?= $row["sgstValue"] ; ?></td>
                                            <td class="text-center align-middle"><?= $row["pCost"] ; ?></td>
                                            <td class="text-center align-middle"><?= $row["totalProductCost"] ; ?></td>
                                        </tr>
                                    <?php
                                    
                                           
                                        }

                                    } else {
                                    ?>
                                        <tr colspan="3">
                                            <td class="text-center" colspan="15">NO RECORD FOUND</td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
            </div>
    </div>
</div>
 
</div>
<!-- <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> -->

<script type="text/javascript">
    $(document).ready(function () {
        // Use delegated event handling to ensure the event is bound to dynamically added elements
        $(document).on('click', '.btn-remove-product', function () {
            var productId = $(this).data('product-id');
            var quantity = $(this).data('quantity');
           var invoiceNumber= $("#invoiceNumber").val();
             // Retrieve quantity data

var userData = {
    productId: productId,
    quantity: quantity,
    invoiceNumber: invoiceNumber // Include quantity in the data sent to the server
};

            // Use AJAX to remove the product from the cart
            $.ajax({
                type: "POST",
                url: "remove_product.php",
                data: userData,
                success: function (response) {
                    // Update the cart table and total values display
                    $('#cartTableContainer').load(location.href + ' #cartTableContainer');
                    // $('#totalValuesCalculation').load(location.href + ' #totalValuesCalculation');
                    $('#displayTotalValues').load(location.href + ' #displayTotalValues');
                    
                    console.log(response);
                },
                error: function (xhr, status, error) {
                    console.error(xhr, status, error);
                    alert("Error removing product: " + error);
                }
            });
        });
    });
</script>



<div id="totalValuesCalculation">
<?php
    include 'total.php';
    ?>
</div>
   

    <div class="container mt-4 px-5 form-container" id="displayTotalValues">
        <div class="row">
            <div class="col">
                <form action=""  method="post" id="total">
                    <div class="form-row mt-4">
                    <div class="col form-group">
                            <input type="text" class="form-control" id="totalBill" name="totalBill" value="<?= number_format($totalBill, 2, '.', '') ?>" placeholder=" " required>
                            <label for="totalBill">Amount</label>
                        </div>
                        <div class="col form-group">
                            <input type="text" class="form-control" id="totalIgst" name="totalIgst" value = "<?= number_format($totalIgst, 2, '.', '') ?>" placeholder=" " required>
                            <label for="totalIgst">Total IGST</label>
                        </div>
                        <div class="col form-group">
                        <input type="text" class="form-control" id="totalCgst" name="totalCgst" value="<?= number_format($totalCgst, 2, '.', '') ?>" placeholder=" " required>

                            <label for="totalCgst">Total CGST</label>
                        </div>
                        <div class="col form-group">
                            <input type="text" class="form-control" id="totalSgst" name="totalSgst" value="<?= number_format($totalSgst, 2, '.', '') ?>" placeholder=" " required>
                            <label for="totalSgst">Total SGST</label>
                        </div>
                        <div class="col form-group">
                        <?php
                            //echo $netTotal;
                            $roundedNetTotal = round($netTotal);
                            $rf = -($netTotal - $roundedNetTotal);
                        ?>
                            <input type="text" class="form-control" id="rOf" name="rOf" value="<?= number_format($rf, 2, '.', '') ?>" placeholder=" ">
                            <label for="rOf">Round off</label>
                        </div>
                        <div class="col form-group">
      
                            <input type="text" class="form-control" id="netTotal" name="netTotal" value="<?= number_format($roundedNetTotal, 2, '.', '') ?>" placeholder=" ">
                            <label for="netTotal">Net Amount</label>
                        </div>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
    <div class="container ">
        
    <div class="form-row ">
                        <div class="col form-group ml-4 pl-3">
                            <!-- Update the "Submit" button in the total form -->
                            <button type="submit" class=" btn btn-info" onclick="submitForms()"id="submitTotal">Submit</button>

                        </div>
                    </div>
                    </div>
</div>
</div>

                    <script>
function submitForms() {
    // Create FormData objects for each form
    var basicFormData = new FormData($("#basicForm")[0]);
    var totalFormData = new FormData($("#total")[0]);

    // Append data from totalFormData to basicFormData
    for (var pair of totalFormData.entries()) {
        basicFormData.append(pair[0], pair[1]);
    }

    // Use basicFormData for the AJAX request
    $.ajax({
        type: "POST",
        processData: false,
        contentType: false,
        url: "save1.php",
        data: basicFormData,
        success: function (response) {
        console.log(response);

        // Check if the response is "update"
        if (response.trim().toLowerCase() === "update") {
            // Redirect to update.php
            window.location.href = "update.php";
        } else {
            // Reload the current page
            location.reload();
        }
    },
        error: function (xhr, status, error) {
            console.error(xhr, status, error);
            alert("Error submitting forms: " + error);
        }
    });
}


</script>


    <script>
        document.addEventListener("DOMContentLoaded", function () {
        test();
    });

        </script>   




<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script> -->
<!-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<!-- Bootstrap Table JS -->



    </body>
    </html>