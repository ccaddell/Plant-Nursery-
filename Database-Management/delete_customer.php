<?php

include "config.php";
$sql = "DELETE FROM customer WHERE cid='" . $_GET["customer_id"] . "'";
if (mysqli_query($conn, $sql)) {
    // echo "Record deleted successfully";
    header("Location: html/successDelete.html");
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
mysqli_close($conn);

?>