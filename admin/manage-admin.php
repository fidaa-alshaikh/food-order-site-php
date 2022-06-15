<?php
echo "";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Food Order Website - Homepage</title>
  <link rel="stylesheet" href="../css/admin.css">
</head>

<body>
  <!-- Menu section -->
  <?php include("partials/menu.php"); ?>
  <!-- End Menu section -->
  <!-- Main content section -->
  <div class="content">
    <div class="wrapper">
      <div class="wrapper-inner">
        <h1>Manage Admin</h1>
        <br>

        <?php
        if (isset($_SESSION["add"])) {
          echo $_SESSION['add'];
          unset($_SESSION["add"]); // remove session message
        }
        ?>

        <a href="add-admin.php">
          <h3>Add admin</h3>
        </a>
        <table>
          <tr>
            <th>S.N.</th>
            <th>Full Name</th>
            <th>Username</th>
            <!-- <th>Email Address</th> -->
            <th>Action</th>
          </tr>
          <?php



          // Display all admins.
          $sql = "SELECT * FROM tbl_admin";
          // Execute query
          $res = mysqli_query($conn, $sql);

          // Check if execute

          if ($res) {

            $count = mysqli_num_rows($res);
            $sn = 1; // to count the admins 

            if ($count > 0) { // check if there is data to display

              while ($row = mysqli_fetch_array($res)) {

                // Get individual DATA
                $id = $row['id'];
                $full_name = $row['full_name'];
                $username = $row['username'];

          ?>

                <!-- Display in Table -->
                 <tr>
                  <td><?php  echo $sn++ ?> </td>
                  <td><?php  echo $full_name ?></td>
                  <td><?php  echo $username ?></td>
                  <td>
                    <button>Update</button>
                    <button>Delete</button>
                  </td>
                </tr>


          <?php

              }
            } else {
              echo '<h3>No data</h3>';
            }
          } else {
          }


          ?>


        </table>

      </div>
    </div>
    <!-- End main content section -->
    <!-- Footer section -->
    <?php include("partials/footer.php"); ?>
    <!-- End footer section -->
</body>

</html>