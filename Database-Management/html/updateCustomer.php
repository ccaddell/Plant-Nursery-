<?php
    //include config.php file on all user panel pages
    include "../config.php";

    $query = "SELECT * FROM customer;";

    $statement = $conn->prepare($query);
    $statement->execute();
    $result = $statement->get_result();
    $row =  $result->fetch_all(MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Update Customer</title>

        <link rel="stylesheet" href="css/style.css">
    </head>

    <body>
        <div id="page-container">
            <div id="content-wrap">
                <header>
                    <h1>Update a Customer Profile</h1>
                </header>
                <section>

                    <form id="chooseCustomer" action="#updateCustomerForm" method="POST">
                        <div class="formQuestion">
                            <label for="customer_id1" style="min-width: 225px"><b>Choose a profile to update:</b> </label>
                            
                            <select id="customer_id1" name="customer_id1" onChange="this.form.submit()" required>
                                <option value="-1" selected>Select a customer</option>
                                <?php foreach($row as $user):?>
                                <option value=<?php echo $user['CID']?> <?php if($user['CID']== $_POST['customer_id1']) {?> selected <?php } ?>><?php echo $user['First_Name']?> <?php echo $user['Last_Name']?></option>
                                <?php endforeach;?>
                            </select>
                            
                        </div>
                    </form>
                    
                    <?php if(isset($_POST['customer_id1'])){ 
                            $query1="SELECT * FROM customer where CID=" .$_POST['customer_id1'].  ";";
                            $result1=$conn->query($query1);
                            $customerInfo = mysqli_fetch_array($result1);

                            // print_r($customerInfo)
                    ?>
                    <form id="updateCustomerForm" action="../update_customer.php" method="POST">
                        <fieldset id="customer_details">
                            <legend>Customer Details</legend>

                            <input name="customer_id" value="<?php echo $_POST['customer_id1']; ?>" hidden>

                            <div class="formQuestion">
                                <label for="first_name">First Name:</label>
                                <input type="text" placeholder="Enter First Name" name="first_name" required value="<?php echo $customerInfo['First_Name']; ?>"><br>
                            </div>

                            <div class="formQuestion">
                                <label for="last_name">Last Name:</label>
                                <input type="text" placeholder="Enter Last Name" name="last_name" required value="<?php echo $customerInfo['Last_Name']; ?>"><br>
                            </div>

                            <div class="formQuestion">
                                <label for="phone_number">Phone Number:</label>
                                <input type="text" placeholder="123-456-0000" name="phone_number" required value="<?php echo $customerInfo['Phone_Number']; ?>"><br>
                            </div>

                            <div class="formQuestion">
                                <label for="address">Address:</label><br>
                                <textarea name="address" rows = "5" cols = "25" name = "water" placeholder="123 Plant Street" required><?php echo $customerInfo['Address']; ?></textarea><br>
                            </div>

                            <!-- the following html contains the questions for the customer's address -->
                            <!-- <hr>

                            <div class="formQuestion">
                                <label for="streetAddress">Street Address:</label>
                                <input type="text" name="streetAddress" id="streetAddress" placeholder="123 Plant St." required><br>
                            </div>

                            <div class="formQuestion">
                                <label for="city">City:</label>
                                <input type="text" name="city" id="city" placeholder="Athens" required><br>
                            </div>

                            <div class="formQuestion">
                                <label for="state">State:</label>
                                <input type="text" name="state" id="state" placeholder="Georgia" required><br>
                            </div>

                            <div class="formQuestion">
                                <label for="zipCode">Zip Code:</label>
                                <input type="number" name="zipCode" id="zipCode" placeholder="30606" required><br>
                            </div> -->

                            <hr>

                            <div class="formQuestion">
                                <label for="discount">Discount:</label>
                                <input type="number" placeholder="Enter Discount" name="discount" step="0.01" value="<?php echo $customerInfo['Discount']; ?>" required><br>
                            </div>

                            <div class="formQuestion">
                                <label for="beginning_date">Starting Date:</label>
                                <input type="date" id="start" name="beginning_date" min="2018-01-01" max="9999-12-31" value="<?php echo $customerInfo['Beginning_Date']; ?>">
                            </div>

                        </fieldset> <br>

                        <div style="text-align: center;">
                            <button type="submit" id="updateCustomerButton">Update Customer</button>
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