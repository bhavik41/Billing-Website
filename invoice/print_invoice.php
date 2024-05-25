<!DOCTYPE html>
<html lang="en">
<?php
ob_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);


include '../nav/navigation.php';

ob_end_flush(); // Flush the output buffer and send its contents to the browser
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">    
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">


    <style>
        .form-group {
            position: relative;
            margin-bottom: 1.5rem;
        }


        .form-control:focus ~ label,
        .form-control:not(:placeholder-shown) ~ label {
            font-size: 0.75rem;
            transform: translateY(-1.60rem);
            color: black;
        }

        .form-control:focus {
            padding-bottom: 2.75rem;
        }

        .form-control:focus:valid {
            padding-bottom: 0.5rem;
        }

        label {
            position: absolute;
            top: 14%;
            left: 5%;
            font-size: 1rem;
            color: #A9A9A9;
            pointer-events: none;
            transform-origin: 0 0;
            transition: all 0.1s ease-out;
        }

        @media only screen and (max-width: 768px) {
            .form-row {
                flex-direction: column;
            }

            label {
                position: absolute;
                top: 0.4rem;
                left: 1rem;
            }

            .form-group {
                margin-bottom: 4.6rem;
            }
        }
        @media only screen and (max-width: 576px) {
            label {
                font-size: 0.9rem;
            }

            /* Adjust other styles as needed */
        }
        /* Add custom styles here */
        .table-container {
            /* Remove max-height and overflow-y */
            position: relative;
            border: 1px solid #000; /* Add black border to the table container */
        }

        .table-container::-webkit-scrollbar {
            width: 12px; /* Set the width of the scrollbar */
        }

        .table-container::-webkit-scrollbar-thumb {
            background-color: #007bff; /* Set the background color of the thumb (scrollbar handle) */
            border-radius: 6px; /* Set the border radius of the thumb */
        }

        .table-container::-webkit-scrollbar-track {
            background-color: #ccc; /* Set the background color of the remaining scrollbar area */
        }

        .sticky-header {
            position: sticky;
            top: 0;
            background-color: #343a40; /* Change the background color as needed (black in this case) */
            color: #ffffff; /* Text color for better visibility */
        }

        .scroll {
            overflow-y: auto;
            border-right: 1px solid #000; /* Add a black border to the right side of the scroll area */
            margin-right: -15px; /* Adjust the margin to remove the space */
        }

        /* Increase the width of specific columns */
        .wide-column {
            min-width: 150px; /* Adjust the width as needed */
        }

        /* Adjust text alignment and wrapping for the invoice data */
        .data-one-line {
            white-space: nowrap; /* Prevent text wrapping */
            overflow: hidden; /* Hide overflowed text */
            text-overflow: ellipsis; /* Display ellipsis (...) for overflowed text */
        }
        .updateField{
            
        }
    </style>
    <script>
function myFunction(inputId,tRow) {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById(inputId);
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[tRow];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}

  function filterByDateRange() {
            var fromDate = new Date(document.getElementById('fromDate').value);
            var toDate = new Date(document.getElementById('toDate').value);

            var table = document.getElementById("myTable");
            var rows = table.getElementsByTagName("tr");

            for (var i = 1; i < rows.length; i++) { // Start from 1 to skip the header row
                var rowDate = new Date(rows[i].cells[2].innerText); // Assuming the date is in the third column
                if ((isNaN(fromDate.getTime()) || rowDate >= fromDate) &&
                    (isNaN(toDate.getTime()) || rowDate <= toDate)) {
                    rows[i].style.display = "";
                } else {
                    rows[i].style.display = "none";
                }
            }
}


</script>

</head>

<body>

    <div class="container mt-4 form-container table-responsive">
        <h3>Print Invoice </h3>
        <form action="print.php" method="POST">
            <div class="cart">
                <div class="row mr">
                    <div class="col px-3 py-3">
                        <div class="form-row updateField mb-5">
                            <div class="col form-group ">
                                <input type="text" class="form-control" id="printInvoiceNumber" name="printInvoiceNumber"
                                    placeholder=" ">
                                <label for="printInvoiceNumber">Print Invoice Number</label>
                            </div>
                            <div class="col form-group">
                                <button type="submit" class="btn btn-info mr-4 " name="printInvoiceButton">Print</button>
                            </div>
                        </div>
                        <div class="form-row">
                        <div class="col form-group">
                            <input type="text" class="form-control" id="invoiceNumber" onkeyup="myFunction('invoiceNumber',1)" placeholder="">
                           <label for="invoiceNumber">Invoice Number</label>
                        </div>
                        <div class="col form-group">
                            <input type="text" class="form-control" id="buyerName" onkeyup="myFunction('buyerName',4)" placeholder="">
                            <label for="buyerName">Buyer Name</label>
                        </div>
                        <div class="col form-group">
                                <input type="date" class="form-control" id="fromDate" onchange="filterByDateRange()">
                                <label for="fromDate">From Date</label>
                            </div>
                            <div class="col form-group">
                                <input type="date" class="form-control" id="toDate" onchange="filterByDateRange()">
                                <label for="toDate">To Date</label>
                            </div>
                    
                    </div>
                        
                        <form id="mstrTable" action="code.php" method="POST">
                            <div class="table-container scroll">
                                <table class="table table-bordered table-border-secondary retrive table-hover" id="myTable">
                                    <thead class="thead-dark sticky-header">
                                        <tr>
                                            <th class="border border-secondary text-center align-middle">Sr No.</th>
                                            <th class="border border-secondary text-center align-middle">Invoice Number</th>
                                            <th class="border border-secondary text-center align-middle">Date</th>
                                            <th class="border border-secondary text-center align-middle">Invoice Type</th>
                                            <th class="border border-secondary text-center align-middle">Buyer Name</th>
                                            <th class="border border-secondary text-center align-middle">Buyer GSTIN</th>
                                            <th class="border border-secondary text-center align-middle">Buyer Address</th>
                                            <th class="border border-secondary text-center align-middle">Buyer State</th>
                                            <th class="border border-secondary text-center align-middle">Buyer Code</th>
                                            <th class="border border-secondary text-center align-middle">Transport Name</th>
                                            <th class="border border-secondary text-center align-middle">Truck Number</th>
                                            <th class="border border-secondary text-center align-middle">RRLR Number</th>
                                            <th class="border border-secondary text-center align-middle">Total IGST</th>
                                            <th class="border border-secondary text-center align-middle">Total SGST</th>
                                            <th class="border border-secondary text-center align-middle">Total CGST</th>
                                            <th class="border border-secondary text-center align-middle">Total Bill</th>
                                            <th class="border border-secondary text-center align-middle">Creation Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include '../partials/_dbconnect.php';

                                        $query = "SELECT * FROM `invoices`";
                                        $query_run = mysqli_query($conn, $query);
                                        if (mysqli_num_rows($query_run) > 0) {
                                            $r = 0;
                                            foreach ($query_run as $row) {
                                                $r = $r + 1;
                                        ?>
                                        <tr>
                                            <td class="border border-secondary text-center align-middle"><?= $r; ?></td>
                                            <td class="border border-secondary text-center align-middle data-one-line">
                                                <?= $row["invoice_number"]; ?></td>
                                            <td class="border border-secondary text-center align-middle data-one-line"><?= $row["date"]; ?></td>
                                            <td class="border border-secondary text-center align-middle data-one-line"><?= $row["invoice_type"]; ?></td>
                                            <td class="border border-secondary text-center align-middle data-one-line"><?= $row['buyer_name']; ?></td>
                                            <td class="border border-secondary text-center align-middle"><?= $row['buyer_gstin']; ?></td>
                                            <td class="border border-secondary text-center align-middle"><?= $row["buyer_address"]; ?></td>
                                            <td class="border border-secondary text-center align-middle"><?= $row["buyer_state"]; ?></td>
                                            <td class="border border-secondary text-center align-middle"><?= $row["buyer_code"]; ?></td>
                                            <td class="border border-secondary text-center align-middle"><?= $row["transport_name"]; ?></td>
                                            <td class="border border-secondary text-center align-middle data-one-line"><?= $row["truck_number"]; ?></td>
                                            <td class="border border-secondary text-center align-middle"><?= $row["rrlr_number"]; ?></td>
                                            <td class="border border-secondary text-center align-middle"><?= $row["total_igst"]; ?></td>
                                            <td class="border border-secondary text-center align-middle"><?= $row["total_sgst"]; ?></td>
                                            <td class="border border-secondary text-center align-middle"><?= $row["total_cgst"]; ?></td>
                                            <td class="border border-secondary text-center align-middle"><?= $row["total_bill"]; ?></td>
                                            <td class="border border-secondary text-center align-middle data-one-line"><?= $row["dt"]; ?></td>
                                        </tr>
                                        <?php

                                            }
                                        } else {
                                        ?>
                                        <tr colspan="3">
                                            <td class="text-center" colspan="17">NO RECORD FOUND</td>
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
        </form>
    </body>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap-table@1.18.3/dist/bootstrap-table.min.js"></script>

</html>
