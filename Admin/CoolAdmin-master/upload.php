<?php
session_start();
require_once 'database.php';
//checks if the 'upload_image_admin' variable is set in the $_POST array. If it is set, it performs the following actions: 
if (isset($_POST['upload_image_admin'])) {
  // It moves the uploaded image file to the "uploads" folder on the server.
  // It takes the temporary file path of the uploaded file ($_FILES['image_admin']['tmp_name'])
  // and the desired destination path ("uploads/".$_FILES['image_admin']['name']) as arguments.
  move_uploaded_file($_FILES['image_admin']['tmp_name'], "uploads/" . $_FILES['image_admin']['name']);
  // It establishes a connection to the MySQL database.
  $connection = mysqli_connect("localhost", "root", "", "mhpbs");
  if (!$connection) {
    throw new Exception(mysqli_connect_error());
    // or
    // log the error message using a logging mechanism
  } else {
    // If the connection is successful, it retrieves the user's ID from the session.
    $id = $_SESSION['id'];
    // It updates the 'image_admin' field in the 'admin_users' table with the name of the uploaded image file, for the user with the retrieved ID.
    $stmt = mysqli_prepare($connection, "UPDATE admin_users SET image_admin = ? WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "si", $_FILES['image_admin']['name'], $id);
    mysqli_stmt_execute($stmt);
    echo "<script>
        window.location.href='profile.php';
        </script>";
  }
}
