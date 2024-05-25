<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Information</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
</head>
<body>
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include '../nav/navigation.php';
?>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h2>Update Information</h2>
                    <a href="personal.php" class="btn btn-secondary">X</a>
                </div>
            </div>
            <div class="card-body">
            <?php
            error_reporting(E_ALL);
            ini_set('display_errors', 1);
            // Connect to the database
        
            include '../partials/_dbconnect.php';

            $sql = "SELECT * FROM `personal` WHERE 1";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                ?>
                <form action="update_process.php" method="post" enctype="multipart/form-data">
                    <!-- Displaying the current information -->
                    <div class="form-group">
                        <label for="buyerName">Buyer Name:</label>
                        <input type="text" class="form-control" id="buyerName" name="name" value="<?= $row["Name"]; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="address">Address:</label>
                        <textarea class="form-control" id="address" name="address" rows="3" required><?= $row["Address"]; ?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="gstin">GSTIN:</label>
                        <input type="text" class="form-control" id="gstin" name="gstin" value="<?= $row["Gstin"]; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="code">Code:</label>
                        <input type="text" class="form-control" id="code" name="code" value="<?= $row["Code"]; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="stateName">State Name:</label>
                        <input type="text" class="form-control" id="stateName" name="state" value="<?= $row["State"]; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="contact">Contact:</label>
                        <input type="text" class="form-control" id="contact" name="contact" value="<?= $row["Contact"]; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="text" class="form-control" id="email" name="email" value="<?= $row["Email"]; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="bankName">Bank Name:</label>
                        <input type="text" class="form-control" id="bankName" name="bankName" value="<?= $row["bankName"]; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="A/CNO">A/c No. :</label>
                        <input type="text" class="form-control" id="A/CNO" name="A/CNO" value="<?= $row["A/CNO"]; ?>" required>
                    </div> 

                    <div class="form-group">
                        <label for="branch">Branch:</label>
                        <input type="text" class="form-control" id="branch" name="branch" value="<?= $row["branch"]; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="IFSC">IFS Code :</label>
                        <input type="text" class="form-control" id="IFSC" name="IFSC" value="<?= $row["IFSC"]; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="pan">PAN:</label>
                        <input type="text" class="form-control" id="pan" name="pan" value="<?= $row["Pan"]; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="currentLogo">Current Logo:</label><br>
                        <img src="data:image/jpeg;base64,<?= base64_encode($row['logo']); ?>" alt="Current Logo" style="max-width: 200px;">
                    </div>

                    <!-- Input field for updating the logo -->
                    <div class="form-group">
                        <label for="buyerLogo">New Buyer Logo:</label><br>
                        <input type="file" class="form-control-file" id="buyerLogo" name="buyerLogo" accept="image/jpeg">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Update Information</button>
                </form>
                <?php
            } else {
                echo "No user information found.";
            }

            // Close the database connection
            $conn->close();
            ?>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and Popper.js (required for some Bootstrap components) -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
