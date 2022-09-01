<?php
if (isset($_POST['submit'])) {


    //include config.php file on all user panel pages
    include "config.php";

    $PID =  $_POST['plant_id1'];
    $name = $_POST['plant_name'];
    $aisle =  $_POST['aisle'];
    $price = $_POST['price'];
    $amt_in_stock = $_POST['stock'];
    $water_requirement = $_POST['water'];
    $sunlight_requirement = $_POST['sunlight'];
    $is_indoor = $_POST['indoor'];
    $is_outdoor = $_POST['outdoor'];
    $max_quantity = $_POST['max_quantity'];
    $is_poisonous = $_POST['poisonous'];
    $country_of_origin = $_POST['country'];
    $is_edible = $_POST['edible'];


    //plant id cannot be changed
    $sql = "UPDATE plants SET
        name='$name',aisle='$aisle',price='$price', amt_in_stock='$amt_in_stock', water_requirement='$water_requirement',
       sunlight_requirement='$sunlight_requirement', is_indoor='$is_indoor',is_outdoor='$is_outdoor',max_quantity='$max_quantity',
       is_poisonous='$is_poisonous',country_of_origin='$country_of_origin',
        is_edible='$is_edible' WHERE pid='$PID'";

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