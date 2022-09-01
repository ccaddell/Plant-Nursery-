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

        <section>
          <table style="margin: 3em;">
            <tr>
              <th style="padding: 1em;">Cid</th>
              <th style="padding: 1em;">Customer Name</th>
              <th style="padding: 1em;">Phone Number</th>
              <th style="padding: 1em;">Address</th>
              <th style="padding: 1em;">Discount</th>
              <th style="padding: 1em;">Beginning Date</th>
            </tr>
            <?php
            if (mysqli_num_rows($result) > 0) {
              $cid = 1;
              while ($data = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
              <td style="padding: .5em;"><?php echo $cid; ?> </td>
              <td style="padding: .5em;"><?php echo $data['Customer Name']; ?> </td>
              <td style="padding: .5em;"><?php echo $data['Phone_Number']; ?> </td>
              <td style="padding: .5em;"><?php echo $data['Address']; ?> </td>
              <td style="padding: .5em;"><?php echo $data['Discount']; ?> </td>
              <td style="padding: .5em;"><?php echo $data['Beginning_Date']; ?> </td>
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
          <a id="returnHomeButton" href="html/index.html" style="text-decoration: none; color: #317e56; margin-bottom: 1em;">Return Home</a>
        </section>
      </div>

      <footer id="footer">
        <p>&copy; 2022 ThePlantShop</p>
      </footer>
    </div>
  </body>
  
</html>