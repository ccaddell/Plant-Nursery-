<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>List of Orders</title>

        <link rel="stylesheet" href="html/css/style.css">
        <?php
        include('config.php');
        $query = "SELECT a.OID,a.Order_Date,a.Total_Dollars,
        CONCAT(b.First_Name, ' ' , b.Last_Name) AS 'Customer Name'
        FROM orders a 
        INNER JOIN customer b 
        ON a.CID=b.CID";
            $result = mysqli_query($conn, $query);
        ?>
    </head>
    <body>
        <div id="page-container">
            <div id="content-wrap">
                <header>
                    <h1><u>Orders</u></h1>
                </header>

                <section>
                    <table style="margin: 3em;">
                        <tr>
                            <th style="padding: 1em;">OID</th>
                            <th style="padding: 1em;">Customer Name</th>
                            <th style="padding: 1em;">Order Date</th>
                            <th style="padding: 1em;">Total</th>
                        </tr>
                        <?php
                        if (mysqli_num_rows($result) > 0) {
                            $oid = 1;
                            while ($data = mysqli_fetch_assoc($result)) {
                        ?>
                                <tr>
                                    <td style="padding: .5em;"><?php echo $oid; ?> </td>
                                    <td style="padding: .5em;"><?php echo $data['Customer Name']; ?> </td>
                                    <td style="padding: .5em;"><?php echo $data['Order_Date']; ?> </td>
                                    <td style="padding: .5em;"><?php echo $data['Total_Dollars']; ?> </td>
                                <tr>
                                <?php
                                $oid++;
                            }
                        } else { ?>
                                <tr>
                                    <td colspan="8" style="padding: .5em;">No data found</td>
                                </tr>

                            <?php } ?>

                    </table>

                    <a id="returnHomeButton" href="html/index.html" style="text-decoration: none; color: #317e56; margin-bottom: 1em;">Return Home</a>
                </section>
            </div>

            <footer id="footer">
                <p>&copy; 2022 ThePlantShop</p>
            </footer>
        </div>
    </body>
</html>
    