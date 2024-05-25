<?php
// $showAlert = false;
// $showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include '../partials/_dbconnect.php';
    
    $P_Name = $_POST["P_Name"];
    $P_Cost = $_POST["P_Rate"];
    $HSN = $_POST["hsn"];
    $IGST = $_POST["igst"];
    $CGST = $_POST["cgst"];
    $SGST = $_POST["sgst"];


            $sql = "INSERT INTO `products`(`ProdName`, `ProdPrice`, `hsn`, `IGST`, `CGST`, `SGST`, `dt`) VALUES ('$P_Name','$P_Cost','$HSN','$IGST','$CGST','$SGST',current_timestamp())";
            $result = mysqli_query($conn, $sql);
            if ($result){
                $showAlert = true;
            }else{
                echo "false";
            }
            header('location: product_cart.php');
        
}

                  
?>    
