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
                                        <th class="text-center align-middle"> </th>
                                        <th class="text-center align-middle">Total Product Cost </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    include '../partials/_dbconnect.php';

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
                                            <td class="text-center align-middle"><?= $row["pCost"] ; ?></td>
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
