<?php

include "config.php";
$sql = "DELETE FROM orders WHERE oid='" . $_GET["order_id"] . "'";
if (mysqli_query($conn, $sql)) {
    // echo "Record deleted successfully";
    header("Location: html/successDelete.html");
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
mysqli_close($conn);

?>