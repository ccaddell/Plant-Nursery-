<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>List of Customers</title>

    <link rel="stylesheet" href="html/css/style.css">
    <?php
    include('config.php');
    $query = "SELECT CID, CONCAT(First_Name, ' ', Last_Name) AS 'Customer Name', Phone_Number, Address, Discount, Beginning_Date FROM `Customer`";
    $result = mysqli_query($conn, $query);
    ?>
  </head>

  <body>
    <div id="page-container">
      <div id="content-wrap">
        <header>
          <h1>The Plant Shop.</h1>
        </header>

        <section id="mainSection">
          <table>
            <tr>
              <th>Cid</th>
              <th>Customer Name</th>
              <th>Phone Number</th>
              <th>Address</th>
              <th>Discount</th>
              <th>Beginning Date</th>
            </tr>
            <?php
            if (mysqli_num_rows($result) > 0) {
              $cid = 1;
              while ($data = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
              <td><?php echo $cid; ?> </td>
              <td><?php echo $data['Customer Name']; ?> </td>
              <td><?php echo $data['Phone_Number']; ?> </td>
              <td><?php echo $data['Address']; ?> </td>
              <td><?php echo $data['Discount']; ?> </td>
              <td><?php echo $data['Beginning_Date']; ?> </td>
              </tr>
              <?php
              $cid++;
            }
            } else { ?>
                <tr>
                  <td colspan="8">No data found</td>
                </tr>
              <?php } ?>

          </table>
        </section>
      </div>

      <footer id="footer">
        <p>&copy; 2022 ThePlantShop</p>
      </footer>
    </div>
  </body>
  
</html>