<?php
    //include config.php file on all user panel pages
    include "../config.php";

    $query = "SELECT * FROM customer;";

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
                    <h1>Delete a Customer</h1>
                </header>
                <section class="deleteSection">

                    <form id="deleteCustomerForm" action="../delete_customer.php" method="GET">
                        <fieldset id="customer_details">
                            <legend>Delete Customer</legend>

                            <div class="formQuestion">
                                <label for="customer_id" style="min-width: 225px"><b>Choose a profile to delete:</b> </label>
                                
                                <select id="customer_id" name="customer_id" required>
                                    <option value="-1" selected>Select a customer</option>
                                    <?php foreach($rows as $user):?>
                                    <option value=<?php echo $user['CID']?> <?php if($user['CID']== $_GET['customer_id']) {?> selected <?php } ?> ><?php echo $user['First_Name']?> <?php echo $user['Last_Name']?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>

                        </fieldset> <br>

                        <div style="text-align: center;">
                            <button type="submit" id="deleteCustomerButton">Delete Customer</button>
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