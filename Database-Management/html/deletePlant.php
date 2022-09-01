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
        <title>The Plant Shop.</title>

        <link rel="stylesheet" href="css/style.css">
    </head>

    <body>
        <div id="page-container">
            <div id="content-wrap">
                <header>
                    <h1>Delete a Plant</h1>
                </header>
                <section class="deleteSection">
                    <!-- <h2>Delete a Plant</h2> -->

                    <form id="deletePlantForm" action="../delete_plant.php" method="get">
                        <fieldset id="plant_details">
                            <legend>Delete Plant</legend>

                            <div class="formQuestion">
                                <label for="plant_id" style="min-width: 225px"><b>Choose a plant to delete:</b> </label>
                                
                                <select id="plant_id" name="plant_id" required>
                                    <option value="-1" selected>Select a plant</option>
                                    <?php foreach($rows as $user):?>
                                    <option value=<?php echo $user['PID']?> <?php if($user['PID']== $_GET['plant_id']) {?> selected <?php } ?> ><?php echo $user['Name']?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>

                        </fieldset> <br>

                        <div style="text-align: center;">
                            <button type="submit" id="deletePlantButton">Delete Plant</button>
                        </div>

                        <div style="text-align: center;">
                            <button id="cancelButton"><a href="index.html" style="text-decoration: none; color: black">Cancel</a></button>
                        </div>
                    </form>
                </section>
            </div> <!-- content-wrap -->

            <footer id="footer">
                <p>&copy; 2022 ThePlantShop</p>
            </footer>
        </div><!-- page-container-->
    </body>
</html>