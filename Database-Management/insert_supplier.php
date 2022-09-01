<?php


        //include config.php file on all user panel pages
        include "config.php";

        $SID =  $_REQUEST['supplier_id'];
        $company_name = $_REQUEST['company_name'];
        $shipment_cost =  $_REQUEST['shipment_cost'];
        $street_Address = $_REQUEST['streetAddress'];
        $city = $_REQUEST['city'];
        $state = $_REQUEST['state'];
        $zipCode = $_REQUEST['zipCode'];
        $address =  $street_Address . ', '. $city . ', '. $state . ', ' . $zipCode;
        $phone_number = $_REQUEST['phone_number'];
        

        $sql = "INSERT INTO supplier VALUES ('$SID', 
        '$company_name','$shipment_cost','$address', '$phone_number')";

        if (mysqli_query($conn, $sql)) {
               header("Location: html/success.html");
        } else {
                echo "ERROR: Hush! Sorry $sql. "
                        . mysqli_error($conn);
        }

        // Close connection
        mysqli_close($conn);

        ?>