<?php
    //include config.php file on all user panel pages
    include "../config.php";

    $query = "SELECT * FROM orders;";

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
                    <h1>Delete an Order</h1>
                </header>
                <section class="deleteSection">
                    <form id="chooseOrder" action="<?php echo $_SERVER['PHP SELF']; ?>" method="POST">
                        <div class="formQuestion">
                                <label for="order_id" style="min-width: 225px"><b>Choose an order to delete:</b> </label>
                                
                                <select id="order_id" name="order_id" required>
                                    <option value="-1" selected>Select an order</option>
                                    <?php foreach($rows as $user):?>
                                    <option value=<?php echo $user['OID']?> <?php if($user['OID']== $_POST['order_id']) {?> selected <?php } ?> ><?php echo $user['OID']?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                    </form>

                    <form id="deleteOrderForm" action="../delete_order.php" method="GET">
                        <fieldset id="order_details">
                            <legend>Delete Order</legend>

                            <div class="formQuestion">
                                <label for="order_id" style="min-width: 225px"><b>Choose an order to delete:</b> </label>
                                
                                <select id="order_id" name="order_id" required>
                                    <option value="-1" selected>Select an order</option>
                                    <?php foreach($rows as $user):?>
                                    <option value=<?php echo $user['OID']?> <?php if($user['OID']== $_GET['order_id']) {?> selected <?php } ?> ><?php echo $user['OID']?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>

                        </fieldset> <br>

                        <div style="text-align: center;">
                            <button type="submit" id="deleteOrderButton">Delete Order</button>
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