<?php
        //include config.php file on all user panel pages
        include "config.php";

        $PID =  $_POST['plant_id'];
        $name = $_POST['plant_name'];
        $aisle =  $_POST['aisle'];
        $price = $_POST['price'];
        $amt_in_stock = $_POST['stock'];
        $water_requirement= $_POST['water'];
        $sunlight_requirement= $_POST['sunlight'];
        $is_indoor = $_POST['indoor'];
        $is_outdoor = $_POST['outdoor'];
        $max_quantity= $_POST['max_quantity'];
        $is_poisonous= $_POST['poisonous'];
        $country_of_origin= $_POST['country'];
        $is_edible= $_POST['edible'];
        

        $sql = "INSERT INTO plants VALUES ('$PID',
        '$name','$aisle','$price', '$amt_in_stock','$max_quantity','$country_of_origin','$water_requirement',
        '$sunlight_requirement', '$is_indoor','$is_outdoor','$is_poisonous',
        '$is_edible')";

        if (mysqli_query($conn, $sql)) {
                header('Location: html/success.html');
        } else {
                echo "ERROR: Hush! Sorry $sql. "
                        . mysqli_error($conn);
        }

        // Close connection
        mysqli_close($conn);

?>