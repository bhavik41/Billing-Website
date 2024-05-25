<!DOCTYPE html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Floating Label Example</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="invoice.css"> <!-- Include jQuery library -->
    <script type="text/javascript" src="invoice.js"></script>
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<link rel="stylesheet" href="invoice.css">

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<!-- Bootstrap JS and Popper.js (required for some Bootstrap components) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<!-- Bootstrap Table JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-table@1.18.3/dist/bootstrap-table.min.js"></script>

<!-- Your custom script -->
<script type="text/javascript" src="invoice.js"></script>



</head>
   
    <body>
    <?php
    // error_reporting(E_ALL);
    // ini_set('display_errors', 1);
    //                             if(isset($_POST["uInvoiceNumber"])){
                                    
    //                                     include 'updateInvoiceNumber.php';
    //                             }

    //                             $inv = $invoiceNumber;
    //                          ?>
                             <?php
                            //  error_reporting(E_ALL);
                            //  ini_set('display_errors', 1);
                            //     if(!isset($_POST["uInvoiceNumber"])){
                            //         include 'newInvoiceNumber.php';
                            //     }
                                ?>
    <div class="container mt-4 form-container">
        <div class="row">
            <div class="col">
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
                            <input type="date" class="form-control" id="date" name="date" value="<?php echo $date; ?>" placeholder=" ">
                            <label for="date">Date</label>
                        </div>
                        <div class="col form-group">
                            <input type="search" list="browsers" class="form-control"  id="invoiceType" name="invoiceType" value="<?php echo $invoiceType; ?>" placeholder=" " /></label>
                                <datalist id="browsers">
                                    <option value="Tax Invoice">
                                    <option value="Retail Invoice">
                                    
                                </datalist>
                                <label for="invoiceType">Invoice Type</label>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col form-group">
                            <input type="search" list="browsers" class="form-control" id="buyerName" name="buyerName" value="<?php echo $buyerName; ?>" placeholder=" ">
                            <label for="buyerName">Buyer's Name:</label>
                            <datalist id="buyersList">
                        <?php
                        // Fetch and display buyer names from your data source (replace this with your actual data retrieval logic)
                            // include '../partials/_dbconnect.php';
                            // $query = "SELECT DISTINCT buyerName FROM your_buyers_table";
                            // $result = mysqli_query($conn, $query);

                            // while ($row = mysqli_fetch_assoc($result)) {
                            //     echo "<option value='" . $row['buyerName'] . "'>";
                            // }
                            ?>
                            </datalist>
                        
                        </div>

                        <div class="col form-group">
                            <input type="text" class="form-control" id="buyerGstin" name="buyerGstin" value="<?php echo $buyerGstin; ?>" placeholder=" ">
                            <label for="buyerGstin">Buyer's GSTIN</label>
                        </div>
                        <div class="col form-group d-none d-lg-block invisible">
                            <input type="text" class="form-control" id="disabled" placeholder=" " disabled>
                            <label for="disabled">disabled</label>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col form-group">
                            <input type="text" class="form-control" id="buyerAddress" name="buyerAddress" value="<?php echo $buyerAddress; ?>" placeholder=" ">
                            <label for="buyerAddress">Address</label>
                        </div>
                        <div class="col form-group">
                            <input type="text" class="form-control" id="buyerState" name="buyerState" value="<?php echo $buyertState; ?>" placeholder=" ">
                            <label for="buyerState">State</label>
                        </div>
                        <div class="col form-group">
                            <input type="text" class="form-control" id="buyerCode" name="buyerCode" value="<?php echo $buyerCode; ?>" placeholder=" ">
                            <label for="buyerCode">Code</label>
                        </div>
                    
                    </div>
                    <div class="form-row">
                        <div class="col form-group">
                            <input type="text" class="form-control" id="transportName" name="transportName" value="<?php echo $transportName; ?>" placeholder=" ">
                            <label for="transportName">Transport Name</label>
                        </div>
                        <div class="col form-group">
                            <input type="text" class="form-control" id="truckNo" name="truckNo" value="<?php echo $truckNumber; ?>" placeholder=" ">
                            <label for="truckNo">Truck No</label>
                        </div>
                        <div class="col form-group">
                            <input type="text" class="form-control" id="rr-lr-no" name="rr-lr-no" value="<?php echo $RRLRNO; ?>" placeholder=" ">
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

    <div class="container mt-4 form-container">
    <h3 >Products Cart</h3>

        <div class="cart">
            <div class="row mr">
                <div class="col px-3 py-3">
                    <div class="row search-container mb-2">
                        <div class="col search">
                            <input type="text" class="form-control" id="search" placeholder="Search">
                        </div>
                    </div>
                    
                    <form id="mstrTable" action="code.php" method="POST">

                        <div class="table-responsive border border-dark" style="max-height: 209px; overflow-y: auto;">
                            <table class="table table-bordered retrive table-hover">
                                <thead class="thead-dark">
                                    <tr>
                                        <th class="text-center align-middle">Product Id </th>
                                        <th class="text-center align-middle">Product Name </th>
                                        <th class="text-center align-middle">Product Cost </th>
                                        <th class="text-center align-middle">HSN Code </th>
                                        <th class="text-center align-middle">IGST(%) </th>
                                        <th class="text-center align-middle">CGST(%) </th>
                                        <th class="text-center align-middle">SGST(%)</th>
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
        
                            



            <div class="row cartdetail" id="cartDetailForm">
                <div class="col">
                 <form class="orderCart">

                        <div class="form-row flxc">
                        <div class="form-row"> 
                        <!-- <input type="hide" class="form-control" id="invoiceNumber1" name="invoiceNumber"  readonly> -->
                     
                            <div class="col form-group">
                                <input type="text" class="form-control" id="productId" name="productId" placeholder=" ">
                                <label for="productId">Product Id:</label>
                            </div>
                    
                            <div class="col form-group">
                                <input type="text" class="form-control" id="productName" name="productName" placeholder=" ">
                                <label for="productName">Product Name:</label>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col form-group">
                                <input type="text" class="form-control" id="productCost" name="productCost" placeholder=" ">
                                <label for="productCost">Product Cost:</label>
                            </div>
                            <div class="col form-group">
                                <input type="text" class="form-control" id="quantity" name="quantity" placeholder=" ">
                                <label for="quantity">Quantity(Tons):</label>
                            </div>
                            
                        </div>
                        <div class="form-row">
                            <div class="col form-group">
                                <input type="text" class="form-control" id="hsnCode" name="hsnCode" placeholder=" ">
                                <label for="hsnCode">HSN Code</label>
                            </div>
                        
                            
                        </div>
                        <div class="form-row">
                            <div class="col form-group">
                                <input type="text" class="form-control" id="igst" name="igst" placeholder=" ">
                                <label for="igst">IGST %</label>
                            </div>
                            <div class="col form-group">
                                <input type="text" class="form-control" id="igstValue" name="igstValue" placeholder=" ">
                                <label for="igstValue">IGST Value</label>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col form-group">
                                <input type="text" class="form-control" id="cgst" name="cgst" placeholder=" ">
                                <label for="cgst">CGST %</label>
                            </div>
                            <div class="col form-group">
                                <input type="text" class="form-control" id="cgstValue" name="cgstValue" placeholder=" ">
                                <label for="cgstValue">CGST Value</label>
                            </div>
                            
                            
                        </div>
                        <div class="form-row">
                            <div class="col form-group ">
                                <input type="text" class="form-control" id="sgst" name="sgst" placeholder=" ">
                                <label for="sgst">SGST %</label>
                            </div>
                            <div class="col form-group ">
                                <input type="text" class="form-control" id="sgstValue" name="sgstValue"  value="" placeholder=" ">
                                <label for="sgstValue">SGST Value</label>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col form-group ">
                                <input type="text" class="form-control" id="tCost" name="tCost" placeholder=" ">
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
    </div>


    <script type="text/javascript">
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
        totalProductCost: $("#tCost").val() 
        // Use the correct selector for the input field
    };
    console.log(userData);
    $.ajax({
        type: "post",
        data: userData,
        url: "addToCart.php",
        success: function (response) {
            console.log(response);
    $('#cartTableContainer').load(location.href + ' #cartTableContainer');
  
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
        $("#tCost").val('');
    }
</script>
<?php

// $invoiceNumber = getInvoiceNumber(); // Replace with your actual method

// echo $invoiceNumber;

?>

<div id="cartTableContainer">
    <!-- Your cart table content goes here -->


    <div class="container mt-4 form-container">
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
                                        <th class="text-center align-middle">Product Cost </th>
                                        <th class="text-center align-middle">Quantity </th>
                                        <th class="text-center align-middle">HSN Code </th>
                                        <th class="text-center align-middle">IGST(%) </th>
                                        <th class="text-center align-middle">IGST Value </th>
                                        <th class="text-center align-middle">CGST(%) </th>
                                        <th class="text-center align-middle">IGST value </th>
                                        <th class="text-center align-middle">SGST(%)</th>
                                        <th class="text-center align-middle">IGST value </th>
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
                                    
                                    echo $invoiceNumber;
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
                                            <td class="text-center align-middle"><?= $row["totalProductCost"] ; ?></td>
                                        </tr>
                                    <?php
                                    
                                           
                                        }

                                    } else {
                                    ?>
                                        <tr colspan="3">
                                            <td class="text-center" colspan="14">NO RECORD FOUND</td>
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
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

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
   

    <div class="container mt-4 form-container" id="displayTotalValues">
        <div class="row">
            <div class="col">
                <form action=""  method="post" id="total">
                    <div class="form-row">
                        <div class="col form-group">
                            <input type="text" class="form-control" id="totalIgst" name="totalIgst" value = "<?= $totalIgst ?>" placeholder=" ">
                            <label for="totalIgst">Total IGST</label>
                        </div>
                        <div class="col form-group">
                        <input type="text" class="form-control" id="totalCgst" name="totalCgst" value="<?= $totalCgst ?>" placeholder=" ">

                            <label for="totalCgst">Total CGST</label>
                        </div>
                        <div class="col form-group">
                            <input type="text" class="form-control" id="totalSgst" name="totalSgst" value="<?= $totalSgst ?>" placeholder=" ">
                            <label for="totalSgst">Total SGST</label>
                        </div>
                        <div class="col form-group">
                            <input type="text" class="form-control" id="totalBill" name="totalBill" value="<?= $totalBill ?>" placeholder=" ">
                            <label for="totalBill">Total Bill</label>
                        </div>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>

    <div class="form-row">
                        <div class="col form-group">
                            <!-- Update the "Submit" button in the total form -->
                            <button type="submit" class="btn btn-info" onclick="submitForms()"id="submitTotal">Submit</button>

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
            location.reload();
          
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



    <!-- Bootstrap JS and Popper.js -->

    <!-- Bootstrap JS and Popper.js (required for some Bootstrap components) -->
  <!-- Bootstrap JS and Popper.js (required for some Bootstrap components) -->
  <!-- <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<!-- Bootstrap Table JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-table@1.18.3/dist/bootstrap-table.min.js"></script>


    </body>
    </html>