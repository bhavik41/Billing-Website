<?php
session_start();
?>
<html>
    <head>
        <title>Product cart</title>
    
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="style.css">  


<style>
    *{


    }
   
            .table-responsive {
                max-height: 209px;
                overflow: auto;
                overflow-x: auto; /* Enable horizontal scrollbar */
            }

            .table-responsive table {
                min-width: 600px; /* Set a minimum width for the table to enable horizontal scrollbar */
            }

            /* Optional: Style for WebKit browsers (Chrome, Safari) */
            .table-responsive::-webkit-scrollbar {
                width: 12px;
            }

            .table-responsive::-webkit-scrollbar-thumb {
                background-color: #007BFF;
                border-radius: 6px;
            }

            .table-responsive::-webkit-scrollbar-track {
                background-color: #f1f1f1;
            }

            .table-responsive::-webkit-scrollbar-thumb:hover {
                background-color: #0056b3;
            }
            
   #productsCart tr.normal td {
    color: #235A81;
    background-color: white;
}

#productsCart tr.highlighted td {
    color: #FFFFFF;
    background-color: #235A81;
}
        </style>
        <script>
function test() {
    var table = document.getElementById("productsCart");
    var ishigh;

    // Get references to the input fields
    var inputFields = {
        "P_Name": document.getElementById("P_Name"),
        "P_Rate": document.getElementById("P_Rate"),
        "hsn": document.getElementById("hsn"),
        "igst": document.getElementById("igst"),
        "cgst": document.getElementById("cgst"),
        "sgst": document.getElementById("sgst")
    };

    // Add a mousedown event listener to the table
    table.addEventListener("mousedown", function (e) {
        var target = e.target;

        // Check if the click is inside an input field
        if (isInputField(target)) {
            // Do nothing if the click is inside an input field
            return;
        }

        // Check if the click is on a checkbox
        if (target.tagName.toLowerCase() === 'input' && target.type === 'checkbox') {
            toggleUpdateButton(); // Toggle the update button based on checkbox state
            return; // Do nothing for checkbox clicks
        }

        // Clear the highlighted row if clicked outside the table
        if (!isDescendant(table, target)) {
            clearHighlightedRow();
        }
    });

    table.onclick = function (e) {
        e = e || window.event;
        var td = e.target || e.srcElement;
        var row = td.parentNode;

        if (ishigh && ishigh != row) {
            ishigh.classList.remove("highlighted");
        }

        // Toggle the highlighted class
        row.classList.toggle("highlighted");

        // Update the highlighted row
        ishigh = row;

        fillInputs();
        toggleUpdateButton();
    }

    function fillInputs() {
        var selectedRow = document.querySelector("#productsCart tr.highlighted");
        if (selectedRow) {
            var cells = selectedRow.cells;

            // Auto-fill the input fields
            Object.keys(inputFields).forEach(function (key) {
                inputFields[key].value = cells[key === "P_Name" ? 3 : 4].innerText;
            });
            selectedRow.focus();
        }
    }

    function toggleUpdateButton() {
        var updateButton = document.getElementById("updateBtn");
        var selectedRow = document.querySelector("#productsCart tr.highlighted");

        // Show the update button if a row is selected, otherwise hide it
        updateButton.style.display = selectedRow ? "inline-block" : "none";
    }

    // Add an event listener for the clear button
    document.getElementById("clearBtn").addEventListener("click", function () {
        // Clear the input fields
        Object.keys(inputFields).forEach(function (key) {
            inputFields[key].value = "";
        });
        clearHighlightedRow();
    });

    function clearHighlightedRow() {
        if (ishigh) {
            ishigh.classList.remove("highlighted");
            ishigh = null;
            toggleUpdateButton();
        }
    }

    // Function to check if an element is a descendant of another element
    function isDescendant(parent, child) {
        var node = child.parentNode;
        while (node != null) {
            if (node == parent) {
                return true;
            }
            node = node.parentNode;
        }
        return false;
    }

    // Function to check if an element is an input field
    function isInputField(element) {
        return element.tagName.toLowerCase() === 'input';
    }
}


</script>

</head>
    <body>

    <?php
include '../nav/navigation.php';
?>
       
    <div class="container">
        <div class="row justify-content-center">
           
            <div class="col-md-9">
                <div class="card mt-4 px-3 py-3">
                <h3>Add Products</h3>
                <div class="c-body">
                    <form action="add_product.php" method="post">
                        <div class="flex-container">
                            <div class="flex-subcontainer">
                                <div class="form-group">
                                    <label for="P_Name" class="PNamel">Product Name :</label>
                                    <input type="text" name="P_Name" id="P_Name" class="form-control pname" required>
                                </div>
                            </div>
                            <div class="flex-subcontainer">
                                <div class="form-group">
                                    <label for="P_Rate" class="PRatel">Product Rate :</label>
                                    <input type="number" name="P_Rate" id="P_Rate" class="form-control PRate" required>
                                </div>
                            </div>
                            <div class="flex-subcontainer">
                                <div class="form-group">
                                    <label for="hsn" class="HSNl">HSN Code :</label>
                                    <input type="number" name="hsn" id="hsn" class="form-control hsn" required>
                                </div>
                            </div>
                            <div class="flex-subcontainer">
                                <div class="form-group">
                                    <label for="igst" class="IGSTL">IGST(%) :</label>
                                    <input type="number" name="igst" id="igst" class="form-control igst" min="0" max="1000" step="0.01" required>
                                </div>
                            </div>
                            <div class="flex-subcontainer">
                                <div class="form-group">
                                    <label for="cgst" class="CGSTL">CGST(%) :</label>
                                    <input type="number" name="cgst" id="cgst" class="form-control cgst" min="0" max="1000" step="0.01" required>
                                </div>
                            </div>
                            <div class="flex-subcontainer">
                                <div class="form-group">
                                    <label for="sgst" class="SGSTL">SGST(%) :</label>
                                    <input type="number" name="sgst" id="sgst" class="form-control sgst" min="0" max="1000" step="0.01" required>
                                </div>
                            </div>
                        </div>
                        <div class="flex-subcontainer">
                        <button type="button" id="clearBtn" class="btn btn-secondary">Clear</button>
                        <input type="submit" name="update" id="updateBtn" class="btn btn-success" value="Update" style="display:none;">
                            <input type="submit" name="submit" class="btn btn-primary" value="Submit">
                            
                        </div>
                        <div class="flex-subcontainer">
    <!-- Add an update button initially hidden -->
    
</div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
</div>
    <div class="container">
        <div class="row justify-content-center">
        <div class="col-md-9">
            <?php 
if(isset($_SESSION['status'])){

    echo "<h4>".$_SESSION['status']."</h4>";
    unset($_SESSION['status']);
}
            ?>
<div class="card mt-4">
    <div class="card-body">
        <form action="code.php" method="POST" id="productsCart">
            <h3>Products Cart</h3>
            <div class="table-responsive" style="max-height: 209px; overflow-y: auto;">
                <table class="table table-bordered table-striped retrive" >
                    <thead>
                        <tr>
                            <th class="text-center align-middle">Serial No. </th>
                            <th class="text-center align-middle" style="width:10px">
                                <button type="submit" name="Delete_mul" class="btn btn-danger">Delete</button>
                            </th>
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
                                    <td class="text-center align-middle"><?= $r; ?></td>
                                    <td class="text-center align-middle">
                                        <input type="checkbox" name="delete_id[]" value="<?= $row["ProdId"]; ?>">
                                    </td>
                                    <td class="text-center align-middle"><?= $row["ProdId"]; ?></td>
                                    <td class="text-center align-middle"><?= $row["ProdName"]; ?></td>
                                    <td class="text-center align-middle"><?= $row["ProdPrice"]; ?></td>
                                    <td class="text-center align-middle"><?= $row['hsn']; ?></td>
                                    <td class="text-center align-middle"><?= $row['IGST']; ?></td>
                                    <td class="text-center align-middle"><?= $row["CGST"]; ?></td>
                                    <td class="text-center align-middle"><?= $row["SGST"]; ?></td>
                                </tr>
                        <?php
                                if ($r >= 4) {
                                    break; // Break loop after the first 4 items
                                }
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
<script>
        document.addEventListener("DOMContentLoaded", function () {
        test();
    });

        </script>   
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    </body>
</html>