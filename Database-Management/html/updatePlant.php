<?php
    //include config.php file on all user panel pages
    include "../config.php";

    $query = "SELECT * FROM plants;";

    $statement = $conn->prepare($query);
    $statement->execute();
    $result = $statement->get_result();
    $rows =  $result->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Update Inventory</title>

        <link rel="stylesheet" href="css/style.css">
    </head>

    <body>
        <div id="page-container">
            <div id="content-wrap">
                <header>
                    <h1>Update Plant Inventory</h1>
                </header>
                <section>

                    <form id="choosePlant" action="<?php echo $_SERVER['PHP SELF']; ?>" method="POST">
                        <div class="formQuestion">
                            <label for="plant_id" style="min-width: 225px"><b>Choose a plant to update:</b> </label>
                            
                            <select id="plant_id" name="plant_id" onChange="this.form.submit()" required>
                                <option value="-1" selected>Select a plant</option>
                                <?php foreach($rows as $plant):?>
                                <option value=<?php echo $plant['PID']?> <?php if($plant['PID']== $_POST['plant_id']) {?> selected <?php } ?> ><?php echo $plant['Name']?></option>
                                <?php endforeach;?>
                            </select>
                            
                        </div>
                    </form>
                    
                    <?php if(isset($_POST['plant_id']) && $_POST['plant_id'] > -1) { 
                            $selectedPID = $_POST['plant_id'];
                            $query1="SELECT * FROM plants where PID='$selectedPID';";

                            $statement1 = $conn->prepare($query1);
                            $statement1->execute();

                            $result1 = $statement1->get_result();
                            $plantInfo =  $result1->fetch_all(MYSQLI_ASSOC);

                            // print_r($plantInfo);

                    ?>
                    <form id="updatePlantForm" action="../update_plant.php" method="POST">
                        <fieldset id="SKU_details">
                            <legend>SKU Details</legend>

                            <input name="plant_id1" value="<?php echo $_POST['plant_id']; ?>" hidden>

                            <div class="formQuestion">
                                <label for="plant_name">Name of the plant:</label>
                                <input type="text" placeholder="Enter Plant Name" name="plant_name" required value="<?php echo $plantInfo[0]['Name']; ?>"><br>
                            </div>

                            <div class="formQuestion">
                                <label for="aisle">Located on aisle:</label>
                                <input type="text" placeholder="Enter Aisle Number" name="aisle" required value="<?php echo $plantInfo[0]['Aisle']; ?>"><br>
                            </div>

                            <div class="formQuestion">
                                <label for="price">Price:</label>
                                <input type="number" placeholder="Enter Price" name="price" step="0.01" required value="<?php echo $plantInfo[0]['Price']; ?>"><br>
                            </div>

                            <div class="formQuestion">
                                <label for="stock">In Stock:</label>
                                <input type="number" placeholder="Enter Quantity" name="stock" step="1" required value="<?php echo $plantInfo[0]['Amt_in_Stock']; ?>"><br>
                            </div>

                            <div class="formQuestion">
                                <label for="max_quantity">Max Quantity:</label>
                                <input type="number" placeholder="Enter Max Quantity" name="max_quantity" step="1" required  value="<?php echo $plantInfo[0]['Max_Quantity']; ?>"><br>
                            </div>

                        </fieldset> <br>

                        <fieldset id="plant_details">
                            <legend>Plant Details</legend>

                            <label for="country">Country of origin:</label>
                            <input type="text" placeholder="Enter Country of Origin" name="country" required value="<?php echo $plantInfo[0]['Country_of_Origin']; ?>" style="width: 20em;"><br>

                            <hr>

                            <label for="water">Water Requirement:</label><br>
                            <textarea rows = "5" cols = "50" name = "water" placeholder="Enter Water Requirements..." required><?php echo $plantInfo[0]['Water_Requirement']; ?></textarea><br>

                            <label for="sunlight">Sunlight Requirement:</label><br>
                            <textarea rows = "5" cols = "50" name = "sunlight" placeholder="Enter Sunlight Requirements..." required><?php echo $plantInfo[0]['Sunlight_Requirement']; ?></textarea><br>

                            <hr>

                            <label>Please select all appropriate descriptors:</label><br>
                            <input type="checkbox" id="indoor" name="indoor" value="True" <?php if ($plantInfo[0]['is_Indoor'] == 'True') { ?> checked <?php }?>>
                            <label for="indoor"> Indoor Plant</label><br>
                            <input type="checkbox" id="outdoor" name="outdoor" value="True" <?php if ($plantInfo[0]['is_Outdoor'] == 'True') { ?> checked <?php }?>>
                            <label for="outdoor"> Outdoor Plant</label><br>
                            <input type="checkbox" id="poisonous" name="poisonous" value="True" <?php if ($plantInfo[0]['is_Poisonous'] == 'True') { ?> checked <?php }?>>
                            <label for="poisonous"> Poisonous</label><br>
                            <input type="checkbox" id="edible" name="edible" value="True" <?php if ($plantInfo[0]['is_Edible'] == 'True') { ?> checked <?php }?>>
                            <label for="edible"> Edible</label><br>
                        </fieldset>

                        <div style="text-align: center;">
                            <button type="submit" id="updatePlantButton">Update Plant</button>
                        </div>

                        <div style="text-align: center;">
                            <button id="cancelButton"><a href="index.html" style="text-decoration: none; color: black">Cancel</a></button>
                        </div>

                    </form>
                    <?php } ?>
                </section>
            </div> <!-- content-wrap -->

            <footer id="footer">
                <p>&copy; 2022 ThePlantShop</p>
            </footer>
        </div> <!-- page-container -->
    </body>
</html>