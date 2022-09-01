<?php

include "config.php";
$sql = "DELETE FROM supplier WHERE sid='" . $_GET['supplier_id'] . "'";
if (mysqli_query($conn, $sql)) {
    // echo "Record deleted successfully";
    header("Location: html/successDelete.html");
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
mysqli_close($conn);

?>