  <?php
  if(isset($_POST['submit'])){


        //include config.php file on all user panel pages
        include "config.php";

        $OID =  $_REQUEST['order_id'];
        $Total_Dollars = $_REQUEST['total_amount'];
        $CID =  $_REQUEST['customer_id'];
        $Order_Date = $_REQUEST['order_date'];

        $sql = "INSERT INTO orders VALUES ('$OID', 
        '$Total_Dollars','$CID','$Order_Date')";

        if (mysqli_query($conn, $sql)) {
                // echo "<h3>data stored in a database successfully."
                //         . " Please browse your localhost php my admin"
                //         . " to view the updated data</h3>";

                header("Location: success.html");
        } else {
                echo "ERROR: Hush! Sorry $sql. "
                        . mysqli_error($conn);
        }

        // Close connection
        mysqli_close($conn);
}
        ?>
  