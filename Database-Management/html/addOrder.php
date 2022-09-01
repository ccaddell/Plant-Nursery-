<?php
    //include config.php file on all user panel pages
    include "../config.php";

    // to list customers
    $query1 = "SELECT * FROM customer;";

    $statement1 = $conn->prepare($query1);
    $statement1->execute();
    $result1 = $statement1->get_result();
    $customerRows =  $result1->fetch_all(MYSQLI_ASSOC);

    // to list plants
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
                    <h1>The Plant Shop.</h1>
                </header>
                <section>
                    <form id="chooseCustomer" action="<?php echo $_SERVER['PHP SELF']; ?>" method="POST">
                        <div class="formQuestion">
                                <label for="customer_id" style="min-width: 225px"><b>Customer:</b> </label>
                                
                                <select id="customer_id1" name="customer_id1" onChange="this.form.submit()" required>
                                    <option value="-1" selected>Select a customer</option>
                                    <?php foreach($customerRows as $user):?>
                                    <option value=<?php echo $user['CID']?> <?php if($user['CID']== $_POST['customer_id1']) {?> selected <?php } ?> ><?php echo $user['First_Name']?> <?php echo $user['Last_Name']?></option>
                                    <?php endforeach;?>
                                </select>
                            
                            </div>
                    </form>
                    <?php if(isset($_POST['customer_id1']) && $_POST['customer_id1'] > -1) { ?>
                    <form id="insertOrderForm" action="../insert_orders.php" method="POST">
                        <fieldset id="order_details">
                            <legend>Order Details</legend>

                            <div class="formQuestion">
                                <label for="order_id"><b>Order ID:</b></label>
                                <input type="text" placeholder="ex. 01" name="order_id" required><br>
                            </div>

                            <div class="formQuestion">
                                <label for="customer_id"><b>Customer ID:</b></label>
                                <input type="text" name="customer_id" value=<?php echo $_POST['customer_id1']?> disabled>
                            </div>

                            <div class="formQuestion">
                                <label for="order_date">Today's Date:</label>
                                <input type="date" id="start" name="beginning_date" min="2022-01-01" max="9999-12-31">
                            </div>
                            
                        </fieldset> <br>

                        <fieldset id="plant_option">
                            <legend> Select Plants</legend>

                            <table  style="margin: 3em;">
                                <tr>
                                  <th style="padding: 1em;"></th>
                                  <th style="padding: 1em;">Plant Name</th>
                                  <th style="padding: 1em;">Price</th>
                                  <th style="padding: 1em;">Amount in Stock</th>
                                </tr>
                                <?php foreach($rows as $plant):?>
                                    <tr>
                                      <td><input type="checkbox" id=<?php echo $plant['PID']?> value=<?php echo $plant['PID']?> <?php if($plant['Amt_in_Stock']== 0) {?> disabled <?php } ?>></td>
                                      <td style="margin: 15px;"><?php echo $plant['Name']; ?> </td>
                                      <td style="text-align: center;"><?php echo $plant['Price']; ?> </td>
                                      <td style="text-align: center;"><?php echo $plant['Amt_in_Stock']; ?> </td>
                                    <tr>
                                <?php endforeach;?>
                    
                              </table>
                        </fieldset>

                        <div style="text-align: center;">
                            <button type="submit" id="addOrderButton">Place Order</button>
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
        </div><!-- page-container-->
    </body>
</html>