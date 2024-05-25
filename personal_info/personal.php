<?php
ob_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);


include '../nav/navigation.php';
echo ' <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">';
ob_end_flush(); // Flush the output buffer and send its contents to the browser
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
     <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buyer Information Form</title>
    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"> -->
    
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }

        .container {
            margin-top: 50px;
        }

        .card {
            border: none;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #007bff;
            color: #ffffff;
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            border-bottom: 2px solid #0056b3; /* Added border for better separation */
        }

        .card-body {
            padding: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .btn-block {
            width: 100%;
        }

        .form-control {
            border-radius: 20px;
        }

        /* Additional Styles */
        .alert-warning {
            background-color: #fff3cd;
            border-color: #ffeeba;
            color: #856404;
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            .container {
                margin-top: 20px;
            }
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="card">
            <div class="card-header">
                User Information
            </div>
            <div class="card-body">
            <?php
            // Database connection details
          include '../partials/_dbconnect.php';

            $sql = "SELECT * FROM `personal` WHERE 1";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // If rows exist, display user information
                $row = $result->fetch_assoc();
                ?>

                <p class="lead"><strong>Seller Name:</strong> <?php echo $row["Name"]; ?></p>
                <p class="lead"><strong>Address:</strong> <?php echo $row["Address"]; ?></p>
                <p class="lead"><strong>GSTIN:</strong> <?php echo $row["Gstin"]; ?></p>
                <p class="lead"><strong>State Name:</strong> <?php echo $row["State"]; ?></p>
                <p class="lead"><strong>Code:</strong> <?php echo $row["Code"]; ?></p>
                <p class="lead"><strong>Contact:</strong> <?php echo $row["Contact"]; ?></p>
                <p class="lead"><strong>Email:</strong> <?php echo $row["Email"]; ?></p>
                <p class="lead"><strong>Bank Name:</strong> <?php echo $row["bankName"]; ?></p>
                <p class="lead"><strong>A/C NO. :</strong> <?php echo $row["A/CNO"]; ?></p>
                <p class="lead"><strong>Branch:</strong> <?php echo $row["branch"]; ?></p>
                <p class="lead"><strong>IFS Code. :</strong> <?php echo $row["IFSC"]; ?></p>
                <p class="lead"><strong>PAN:</strong> <?php echo $row["Pan"]; ?></p>
                <!-- Add this input field to your HTML form -->
                <?php if (!empty($row['logo'])): ?>
        <div class="form-group">
            <label for="buyerLogo">Buyer Logo:</label><br>
            <img src="data:image/jpeg;base64,<?php echo base64_encode($row['logo']); ?>" alt="Buyer Logo" style="max-width: 200px;">
        </div>
    <?php endif; ?>

                <?php
            } else {
                // If no rows, display form for user input
                ?>
                <div class="alert alert-warning" role="alert">
                    User information not found. Please fill in your information below.
                </div>
                <form action="add_personal_info.php" method="post"  enctype="multipart/form-data">
                    <!-- Your form fields (unchanged) -->
                    <div class="form-group">
                        <label for="buyerName">Buyer Name:</label>
                        <input type="text" class="form-control" id="buyerName" name="name" required>
                    </div>

                    <div class="form-group">
                        <label for="address">Address:</label>
                        <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="gstin">GSTIN:</label>
                        <input type="text" class="form-control" id="gstin" name="gstin" required>
                    </div>

                    <div class="form-group">
                        <label for="stateName">State Name:</label>
                        <input type="text" class="form-control" id="stateName" name="state" required>
                    </div>

                    <div class="form-group">
                        <label for="code">Code:</label>
                        <input type="text" class="form-control" id="code" name="code" required>
                    </div>

                    <div class="form-group">
                        <label for="contact">Contact:</label>
                        <input type="text" class="form-control" id="contact" name="contact" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="text" class="form-control" id="email" name="email" required>
                    </div>

                    <div class="form-group">
                        <label for="bankName">Bank Name:</label>
                        <input type="text" class="form-control" id="bankName" name="bankName" required>
                    </div>
                    <div class="form-group">
                        <label for="A/CNO">A/c No. :</label>
                        <input type="text" class="form-control" id="A/CNO" name="A/CNO" required>
                    </div> 
                    <div class="form-group">
                        <label for="branch">Branch:</label>
                        <input type="text" class="form-control" id="branch" name="branch" required>
                    </div>
                    <div class="form-group">
                        <label for="IFSC">IFS Code :</label>
                        <input type="text" class="form-control" id="IFSC" name="IFSC" required>
                    </div>
                    <div class="form-group">
                        <label for="pan">PAN:</label>
                        <input type="text" class="form-control" id="pan" name="pan" required>
                    </div>
                    <div class="form-group">
        <label for="buyerLogo">Buyer Logo:</label>
        <input type="file" class="form-control-file" id="buyerLogo" name="buyerLogo" accept="image/jpeg">
    </div>
                    <button type="submit" class="btn btn-primary btn-block">Submit</button>
                    
                </form>
                <?php
            }

            // Close the database connection
            $conn->close();
            ?>
            <div class="text-center mt-3">
                    <a href="update_personal_info.php" class="btn btn-primary btn-block">Update Information</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and Popper.js (required for some Bootstrap components) -->
   
</body>
</html>


                <!-- Update Information link -->
                
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and Popper.js (required for some Bootstrap components) -->
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script> -->

</body>
</html>
