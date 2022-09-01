<?php


        //include config.php file on all user panel pages
        include "config.php";

        $CID =  $_REQUEST['customer_id'];
        $first_name = $_REQUEST['first_name'];
        $last_name =  $_REQUEST['last_name'];
        $phone_number = $_REQUEST['phone_number'];
        $street_Address = $_REQUEST['streetAddress'];
        $city = $_REQUEST['city'];
        $state = $_REQUEST['state'];
        $zipCode = $_REQUEST['zipCode'];
        $address =  $street_Address . ', '. $city . ', '. $state . ', ' . $zipCode;
        $discount = $_REQUEST['discount'];
        $beginning_date= $_REQUEST['beginning_date'];

        $sql = "INSERT INTO customer VALUES ('$CID', 
        '$first_name','$last_name','$phone_number', '$address' ,'$discount', '$beginning_date')";

        if (mysqli_query($conn, $sql)) {
                header("Location: html/success.html");
        } else {
                echo "ERROR: Hush! Sorry $sql. "
                        . mysqli_error($conn);
        }

        // Close connection
        mysqli_close($conn);
        ?>
  