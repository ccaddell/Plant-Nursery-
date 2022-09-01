<?php


    //include config.php file on all user panel pages
    include "config.php";

    $CID =  $_POST['customer_id'];
    $first_name = $_POST['first_name'];
    $last_name =  $_POST['last_name'];
    $phone_number = $_POST['phone_number'];
    $discount = $_POST['discount'];
    $beginning_date = $_POST['beginning_date'];
    $address =  $_POST['address'];
    //customer id cannot be changed
    // echo '<p> ' . $CID . ' </p';

    $sql = "UPDATE customer SET
        First_Name= '".$first_name."',Last_Name='".$last_name."', Phone_Number='".$phone_number."', Address='".$address."', Discount='".$discount."', Beginning_Date='".$beginning_date."' WHERE CID='".$CID."'";

    if (mysqli_query($conn, $sql)) {
        // echo "<h3>data updated in the database successfully."
        //     . " Please browse your localhost php my admin"
        //     . " to view the updated data</h3>";
        header("Location: html/successUpdate.html");
    } else {
        echo "<p>ERROR: Hush! Sorry $sql. </p>"
            . mysqli_error($conn);
    }

    // Close connection
    mysqli_close($conn);
?>
