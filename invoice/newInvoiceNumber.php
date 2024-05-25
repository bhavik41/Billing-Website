<?php

include '../partials/_dbconnect.php';
$query = "SELECT invoice_number FROM `invoices` ORDER BY invoice_number DESC LIMIT 1;";
                        $result = mysqli_query($conn, $query);

                        if ($result && mysqli_num_rows($result) > 0) {
                            // Data exists, get the last invoice number and increment it
                            $row = mysqli_fetch_assoc($result);
                            $lastInvoiceNumber = $row["invoice_number"];

                            // Extract the numeric part and increment
                            preg_match('/\d+/', $lastInvoiceNumber, $matches);
                            $lastNumber = isset($matches[0]) ? intval($matches[0]) : 0;
                            $newNumber = $lastNumber + 1;

                            // Format the new invoice number with leading zeros
                            $invoiceNumber = 'INV-' . str_pad($newNumber, 4, '0', STR_PAD_LEFT);
                        } else {
                            // No data exists, set the invoice number to "inv-0001"
                            $invoiceNumber = "INV-0001";
                        }


                        $date = "";
                        $invoiceType = "";
                        $buyerName = "";
                        $buyerGstin = "";
                        $buyerAddress = "";
                        $buyertState = "";
                        $buyerCode = "";
                        $transportName = "";
                        $truckNumber = "";
                        $RRLRNO = "";


?>