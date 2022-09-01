<?php
if (isset($_POST['submit'])) {


    //include config.php file on all user panel pages
    include "config.php";

    $OID =  $_POST['order_id'];
    $Total_Dollars = $_POST['total_amount'];
    $CID =  $_POST['customer_id'];
    $Order_Date = $_POST['order_date'];


    //order id cannot be changed
    $sql = "UPDATE orders SET 
        total_dollars='$Total_Dollars',CID='$CID',order_date='$Order_Date' WHERE OID='$OID'";

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
