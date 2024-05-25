<?php
// Connect to the database
error_reporting(E_ALL);
ini_set('display_errors', 1);
include '../partials/_dbconnect.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect user input
    $Name = $_POST["name"];
    $Address = $_POST["address"]; // Fix the typo here
    $Gstin = $_POST["gstin"];
    $Code = $_POST["code"];
    $State = $_POST["state"]; // Fix the variable name here
    $Contact = $_POST["contact"];
    $Email = $_POST["email"];
    $Pan = $_POST["pan"];
    $bankName = $_POST['bankName'];
    $ACNO = $_POST['A/CNO'];
    $branch = $_POST['branch'];
    $IFSC = $_POST['IFSC'];

    // Handle logo upload
    if (isset($_FILES["buyerLogo"])) {
        // Get the temporary file path
        $imageFileType = strtolower(pathinfo($_FILES["buyerLogo"]["name"], PATHINFO_EXTENSION));
        if ($imageFileType != "jpg" && $imageFileType != "jpeg") {
            die("Error: Only JPG files are allowed.");
        }
        $imageData = file_get_contents($_FILES["buyerLogo"]["tmp_name"]);
        $imageData = mysqli_real_escape_string($conn, $imageData);
   

    // Update the database with new information
    $sql = "UPDATE `personal` SET `Name`='$Name',`Address`='$Address',`Gstin`='$Gstin',`Code`='$Code',`State`='$State',`Contact`='$Contact',`Email`='$Email',`bankName`='$bankName',`A/CNO`='$ACNO',`branch`='$branch',`IFSC`='$IFSC',`Pan`='$Pan', `logo`='$imageData', `dt`=current_timestamp() WHERE 1";
    $result = mysqli_query($conn, $sql);
    if ($result){
        header("location: personal.php");
    } else {
        echo "Failed to update information.";
    }
}
}

// Close the database connection
$conn->close();
?>
