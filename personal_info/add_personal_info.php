<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "balaji";

$conn = mysqli_connect($server, $username, $password, $database);
if (!$conn){
    die("Error" . mysqli_connect_error());
}

error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Name = $_POST["name"];
    $Address = $_POST["address"];
    $Gstin = $_POST["gstin"];
    $Code = $_POST["code"];
    $State = $_POST["state"];
    $Contact = $_POST["contact"];
    $Email = $_POST["email"];
    $Pan = $_POST["pan"];
    $bankName = $_POST['bankName'];
    $ACNO = $_POST['A/CNO'];
    $branch = $_POST['branch'];
    $IFSC = $_POST['IFSC'];

    // File upload handling
    if (isset($_FILES["buyerLogo"])) {
        // File upload handling
        $imageFileType = strtolower(pathinfo($_FILES["buyerLogo"]["name"], PATHINFO_EXTENSION));
        if ($imageFileType != "jpg" && $imageFileType != "jpeg") {
            die("Error: Only JPG files are allowed.");
        }
        $imageData = file_get_contents($_FILES["buyerLogo"]["tmp_name"]);
        $imageData = mysqli_real_escape_string($conn, $imageData);

    // Insert data into database
    $sql = "INSERT INTO `personal`(`Name`, `Address`, `Gstin`, `Code`, `State`, `Contact`, `Email`, `bankName`, `A/CNO`, `branch`, `IFSC`, `Pan`, `logo`, `dt`) 
            VALUES ('$Name','$Address','$Gstin','$Code','$State','$Contact','$Email','$bankName','$ACNO','$branch','$IFSC','$Pan','$imageData', current_timestamp())";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("location: personal.php");
    } else {
        echo "Failed to save data into database.";
    }
}
}
?>
