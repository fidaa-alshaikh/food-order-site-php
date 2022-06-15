<?php include("partials/menu.php"); ?>
<div class="content">
  <div class="wrapper">
    <div class="wrapper-inner">
      <h1>Add Admin</h1>

      <?php
      if(isset($_SESSION["add"])){
        echo $_SESSION['add'];
        unset($_SESSION["add"]); // remove session message
      }
      ?>
      <!-- two type of methods: post & get -->
      <form method="POST" action="">

        <table>
          <tr>
            <td>Full Name:</td>
            <td>
              <input type="text" name="full_name" placeholder="Enter full name here">
            </td>
          </tr>

          <tr>
            <td>Username:</td>
            <td>
              <input type="text" name="username" placeholder="Enter username here">
            </td>
          </tr>

          <tr>
            <td>Password:</td>
            <td>
              <input type="password" name="password" placeholder="Enter password here">
            </td>
          </tr>

          <tr>
            <td>
              <input type="submit" name="submit" value="Add Admin" />
            </td>
          </tr>



        </table>

      </form>



    </div>
  </div>
</div>
<?php include("partials/footer.php"); ?>


<?php
// Process the value from form into database

// Check the button
if (isset($_POST['submit'])) {
  // button clicked
  // 1. Get data from form
  $full_name = $_POST['full_name']; // from name property
  $username = $_POST['username'];
  $password = md5($_POST['password']); // encrypted password

  //2. SQL query to save data into database
  $sql = "INSERT INTO tbl_admin SET full_name='$full_name', username='$username', password='$password' ";
  // execute the query into database
  $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));

  //Check if query succeeded
  //echo ($res==true) ? 'Data saved successfully' : 'Data not saved successfully';


  if ($res) {
    // Create session variable display message
    // name the var of session (add)
    $_SESSION['add'] = "Admin added successfully";
    //Redirect page
    header('location:' . SITE_URL . "admin/manage-admin.php");
  } else {
    $_SESSION['add'] = "Failed to add admin";
    //Redirect page
    header('location:' . SITE_URL . "admin/add-admin.php");
  }
}


?>