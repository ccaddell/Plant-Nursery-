<?php
if (isset($_POST['submit'])) {


    //include config.php file on all user panel pages
    include "config.php";

    $SID =  $_POST['supplier_id'];
    $company_name = $_POST['company_name'];
    $shipment_cost =  $_POST['shipment_cost'];
    $address = $_POST['address'];
    $phone_number = $_POST['phone_number'];
    $street_Address = $_POST['streetAddress'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zipCode = $_POST['zipCode'];
    $address =  $street_Address . ', '. $city . ', '. $state . ', ' . $zipCode;
    // supplier id cannot be changed 
    $sql = "UPDATE supplier SET
        company_name='$company_name',shipment_cost='$shipment_cost', address='$address', phone_number='$phone_number' WHERE SID='$SID'";

    if (mysqli_query($conn, $sql)) {
        // echo "<h3>data updated in the database successfully."
        //     . " Please browse your localhost php my admin"
        //     . " to view the updated data</h3>";
        header("Location: html/successUpdate.html");
    } else {
        echo "ERROR: Hush! Sorry $sql. "
            . mysqli_error($conn);
    }

    // Close connection
    mysqli_close($conn);
}
?>