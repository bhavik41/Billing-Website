<?php
// Include database connection code or establish a database connection here
include '../partials/_dbconnect.php';

// Check if the buyerName parameter is set in the POST request
if(isset($_POST['buyerName'])) {
    $buyerName = $_POST['buyerName'];

    // Prepare and execute a SQL query to fetch buyer details based on the provided name
    $sql = "SELECT * FROM buyers WHERE buyerName = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $buyerName);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if any rows are returned
    if ($result->num_rows > 0) {
        // Fetch the buyer details
        $row = $result->fetch_assoc();

        // Create an array containing the fetched buyer details
        $buyerDetails = array(
            'buyerGstin' => $row['buyerGstin'],
            'buyerAddress' => $row['buyerAddress'],
            'buyerState' => $row['buyerState'],
            'buyerCode' => $row['buyerCode'],
        );

        // Return the buyer details as JSON response
        echo json_encode(array('status' => 'success', 'data' => $buyerDetails));
    } else {
        // If no matching buyer found, return an error status
        echo json_encode(array('status' => 'error'));
    }

    // Close the database connection and exit
    $stmt->close();
    $conn->close();
}
?>
