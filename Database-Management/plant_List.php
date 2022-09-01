<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>List of Plants</title>

    <link rel="stylesheet" href="html/css/style.css">
    <?php
    include('config.php');
    $query = "SELECT * FROM plants";
    $result = mysqli_query($conn, $query);
    ?>
  </head>
  
  <body>
    <div id="page-container">
      <div id="content-wrap">
        <header>
          <h1><u>Plants</u></h1>
        </header>

        <section>
          <table style="margin: 3em;">
            <tr>
              <th style="padding: 1em;">Pid</th>
              <th style="padding: 1em;">Plant Name</th>
              <th style="padding: 1em;">Aisle</th>
              <th style="padding: 1em;">Price</th>
              <th style="padding: 1em;">Amount in Stock</th>
              <th style="padding: 1em;">Max Quantity</th>
              <th style="padding: 1em;">Country of Origin</th>
              <th style="padding: 1em;">Water Requirement</th>
              <th style="padding: 1em;">Sunlight Requirement</th>
              <th style="padding: 1em;">Indoor</th>
              <th style="padding: 1em;">Outdoor </th>
              <th style="padding: 1em;">Poisonous </th>
              <th style="padding: 1em;">Edible </th>
            </tr>
            <?php
            if (mysqli_num_rows($result) > 0) {
              $pid = 1;
              while ($data = mysqli_fetch_assoc($result)) {
            ?>
                <tr>
                  <td style="padding: .5em;"><?php echo $pid; ?> </td>
                  <td style="padding: .5em;"><?php echo $data['Name']; ?> </td>
                  <td style="padding: .5em;"><?php echo $data['Aisle']; ?> </td>
                  <td style="padding: .5em;"><?php echo $data['Price']; ?> </td>
                  <td style="padding: .5em;"><?php echo $data['Amt_in_Stock']; ?> </td>
                  <td style="padding: .5em;"><?php echo $data['Max_Quantity']; ?> </td>
                  <td style="padding: .5em;"><?php echo $data['Country_of_Origin']; ?> </td>
                  <td style="padding: .5em;"><?php echo $data['Water_Requirement']; ?> </td>
                  <td style="padding: .5em;"><?php echo $data['Sunlight_Requirement']; ?> </td>
                  <td style="padding: .5em;"><?php echo $data['is_Indoor']; ?> </td>
                  <td style="padding: .5em;"><?php echo $data['is_Outdoor']; ?> </td>
                  <td style="padding: .5em;"><?php echo $data['is_Poisonous']; ?> </td>
                  <td style="padding: .5em;"><?php echo $data['is_Edible']; ?> </td>
                <tr>
                <?php
                $pid++;
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