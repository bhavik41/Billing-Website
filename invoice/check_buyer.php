<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include '../partials/_dbconnect.php';
    $buyerName = $_POST['buyerName'];
    $retrieveBuyer = "SELECT * FROM `buyers` WHERE 1";
    $resultRetrieveBuyer = mysqli_query($conn, $retrieveBuyer);

    if (mysqli_num_rows($resultRetrieveBuyer) > 0) {
        $row = mysqli_fetch_assoc($resultRetrieveBuyer);
        $buyerGstin1 = $row['buyerGstin'];
        $buyerAddress1 = $row['buyerAddress'];
        $buyerState1= $row['buyerState'];
        $buyerCode1 = $row['buyerCode']; 

        // Assuming you want to send this data back as a JSON response
        $response = array(
            'buyerName1' => $buyerName,
            'buyerGstin1' => $buyerGstin1,
            'buyerAddress1' => $buyerAddress1,
            'buyerState1' => $buyerState1,
            'buyerCode1' => $buyerCode1,
            'status' => 'success'
        );

        echo json_encode($response);
    } else {
        $response = array('status' => 'error', 'message' => 'No buyer found');
        echo json_encode($response);
    }
} else {
    // Handle other cases or errors
    $response = array('status' => 'error', 'message' => 'Invalid request method');
    //echo json_encode($response);
}
?>
