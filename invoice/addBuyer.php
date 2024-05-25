<?php
include '../partials/_dbconnect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['buyerName'])) {
    $buyerName = $_POST['buyerName'];

    // Check if the buyer already exists
    $checkQuery = "SELECT * FROM your_buyers_table WHERE buyerName = '$buyerName'";
    $checkResult = mysqli_query($conn, $checkQuery);

    if (mysqli_num_rows($checkResult) == 0) {
        // Buyer doesn't exist, add the new buyer with additional data
        $address = $_POST['address']; // Add additional fields as needed
        $gstin = $_POST['gstin'];
        $stateName = $_POST['stateName'];
        $stateCode = $_POST['stateCode'];

        $insertQuery = "INSERT INTO your_buyers_table (buyerName, address, gstin, stateName, stateCode) 
                        VALUES ('$buyerName', '$address', '$gstin', '$stateName', '$stateCode')";
        if (mysqli_query($conn, $insertQuery)) {
            echo json_encode(array("status" => "success"));
        } else {
            echo json_encode(array("status" => "error", "message" => mysqli_error($conn)));
        }
    } else {
        // Buyer exists, return their details (optional)
        $row = mysqli_fetch_assoc($checkResult);
        echo json_encode(array("status" => "exists", "buyerDetails" => $row));
    }
} else {
    echo json_encode(array("status" => "error", "message" => "Invalid request"));
}
?>
