<?php
    //include config.php file on all user panel pages
    include "../config.php";

    $query = "SELECT * FROM supplier;";

    $statement = $conn->prepare($query);
    $statement->execute();
    $result = $statement->get_result();
    $rows =  $result->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Update Supplier</title>

        <link rel="stylesheet" href="css/style.css">
    </head>

    <body>
        <div id="page-container">
            <div id="content-wrap">
                <header>
                    <h1>Update Supplier</h1>
                </header>
                <section>

                    <form id="chooseSupplier" action="<?php echo $_SERVER['PHP SELF']; ?>" method="POST">
                        <div class="formQuestion">
                            <label for="supplier_id" style="min-width: 225px"><b>Choose a profile to update:</b> </label>
                            
                            <select id="supplier_id" name="supplier_id" onChange="this.form.submit()" required>
                                <option value="-1" selected>Select a company</option>
                                <?php foreach($rows as $supplier):?>
                                <option value=<?php echo $supplier['SID']?> <?php if($supplier['SID']== $_POST['supplier_id']) {?> selected <?php } ?> ><?php echo $supplier['Company_Name']?></option>
                                <?php endforeach;?>
                            </select>
                            
                        </div>
                    </form>
                    
                    <?php if(isset($_POST['supplier_id']) && $_POST['supplier_id'] > -1) { 
                            $selectedSID = $_POST['supplier_id'];
                            $query1="SELECT * FROM supplier where SID='$selectedSID';";

                            $statement1 = $conn->prepare($query1);
                            $statement1->execute();

                            $result1 = $statement1->get_result();
                            $supplierInfo =  $result1->fetch_all(MYSQLI_ASSOC);

                    ?>
                    <form id="updateSupplierForm" action="../update_supplier.php" method="POST">
                        <fieldset id="supplier_details">
                            <legend>Supplier Details</legend>

                            <div class="formQuestion">
                                <label for="company_name">Company Name:</label>
                                <input type="text" placeholder="Enter Company Name" name="company_name" required value="<?php echo $supplierInfo[0]['Company_Name']; ?>"><br>
                            </div>

                            <div class="formQuestion">
                                <label for="shipment_cost">Shipment Cost:</label>
                                <input type="number" placeholder="Enter Cost" name="shipment_cost" step="0.01" required value="<?php echo $supplierInfo[0]['Shipment_Cost']; ?>"><br>
                            </div>

                            <div class="formQuestion">
                                <label for="phone_number">Phone Number:</label>
                                <input type="text" placeholder="123-456-0000" name="phone_number" required value="<?php echo $supplierInfo[0]['Phone_Number']; ?>"><br>
                            </div>

                            <!-- the following html contains the questions for the customer's address -->
                            <!-- <hr>

                            <div class="formQuestion">
                                <label for="streetAddress">Street Address:</label>
                                <input type="text" name="streetAddress" id="streetAddress" placeholder="123 Plant St." required ><br>
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

                        </fieldset> <br>

                        <div style="text-align: center;">
                            <button type="submit" id="updateSupplierButton">Update Supplier</button>
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