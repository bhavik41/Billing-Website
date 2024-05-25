<?php
// Check if the form fields are set before accessing them
$invoiceNumber = isset($_POST["invoiceNumber"]) ? $_POST["invoiceNumber"] : "";
$date = isset($_POST["date"]) ? $_POST["date"] : "";
$invoiceType = isset($_POST["invoiceType"]) ? $_POST["invoiceType"] : "";
$buyerName = isset($_POST["buyerName"]) ? $_POST["buyerName"] : "";
$buyerGstin = isset($_POST["buyerGstin"]) ? $_POST["buyerGstin"] : "";
$buyerAddress = isset($_POST["buyerAddress"]) ? $_POST["buyerAddress"] : "";
$buyerState = isset($_POST["buyerState"]) ? $_POST["buyerState"] : "";
$buyerCode = isset($_POST["buyerCode"]) ? $_POST["buyerCode"] : "";
$transportName = isset($_POST["transportName"]) ? $_POST["transportName"] : "";
$truckNumber = isset($_POST["truckNo"]) ? $_POST["truckNo"] : "";
$RRLRNumber = isset($_POST["rr-lr-no"]) ? $_POST["rr-lr-no"] : "";
$totalIgst = isset($_POST["totalIgst"]) ? $_POST["totalIgst"] : "";


?>
