<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <title>List of Suppliers</title>

    <link rel="stylesheet" href="html/css/style.css">
    <?php
    include('config.php');
    $query = "SELECT * FROM supplier";
    $result = mysqli_query($conn, $query);
    ?>
  </head>

  <body>
    <div id="page-container">
      <div id="content-wrap">
        <header>
          <h1><u>Suppliers</u></h1>
        </header>

        <section>
          <table style="margin: 3em;">
            <tr>
              <th style="padding: 1em;">Sid</th>
              <th style="padding: 1em;">Company Name</th>
              <th style="padding: 1em;">Shipment Cost</th>
              <th style="padding: 1em;">Address</th>
              <th style="padding: 1em;">Phone Number</th>
            </tr>
            <?php
            if (mysqli_num_rows($result) > 0) {
              $sid = 1;
              while ($data = mysqli_fetch_assoc($result)) {
            ?>
                <tr>
                  <td style="padding: .5em;"><?php echo $sid; ?> </td>
                  <td style="padding: .5em;"><?php echo $data['Company_Name']; ?> </td>
                  <td style="padding: .5em;"><?php echo $data['Shipment_Cost']; ?> </td>
                  <td style="padding: .5em;"><?php echo $data['Address']; ?> </td>
                  <td style="padding: .5em;"><?php echo $data['Phone_Number']; ?> </td>
                <tr>
                <?php
                $sid++;
              }
            } else { ?>
                <tr>
                  <td colspan="8" style="padding: .5em;">No data found</td>
                </tr>

              <?php } ?>

          </table>
          <a id="returnHomeButton" href="html/index.html" style="text-decoration: none; color: #317e56">Return Home</a>
        </section>
      </div>

      <footer id="footer">
        <p>&copy; 2022 ThePlantShop</p>
      </footer>
    </div>
  </body>
</html>