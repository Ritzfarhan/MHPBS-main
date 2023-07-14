<?php
session_start();
require_once 'database.php';
if (!(isset($_SESSION['username']) && $_SESSION['username'] != '')) {
  header("index.php");
}




$username = $_SESSION['username'];

$sql = "SELECT * FROM admin_users WHERE username = '$username'";
$result =  mysqli_query($connection, $sql);
$row = mysqli_fetch_assoc($result);


$username = $row['username'];
$id = $row['id'];;
$email = $row['email'];
$firstname = $row['firstname'];
$lastname = $row['lastname'];
$phone = $row['phone'];
$image = $row['image_admin'];
//checks if the 'upload_image_admin' variable is set in the $_POST array. If it is set, it performs the following actions: 
if (isset($_POST['upload_image_admin'])) {
  // Check for file upload errors
  if ($_FILES['image_admin']['error'] !== UPLOAD_ERR_OK) {
    switch ($_FILES['image_admin']['error']) {
      case UPLOAD_ERR_INI_SIZE:
        $error = "The uploaded file exceeds the upload_max_filesize directive in php.ini.";
        break;
      case UPLOAD_ERR_FORM_SIZE:
        $error = "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form.";
        break;
      case UPLOAD_ERR_PARTIAL:
        $error = "The uploaded file was only partially uploaded.";
        break;
      case UPLOAD_ERR_NO_FILE:
        $error = "No file was uploaded.";
        break;
      case UPLOAD_ERR_NO_TMP_DIR:
        $error = "Missing a temporary folder. Check the 'upload_tmp_dir' directive in php.ini.";
        break;
      case UPLOAD_ERR_CANT_WRITE:
        $error = "Failed to write file to disk. Check the permissions for the upload folder.";
        break;
      case UPLOAD_ERR_EXTENSION:
        $error = "A PHP extension stopped the file upload. Check the 'upload_max_filesize' and 'post_max_size' directives in php.ini.";
        break;
      default:
        $error = "An unknown error occurred during file upload.";
        break;
    }

    $stmt = mysqli_prepare($connection, "UPDATE admin_users SET image_admin = ? WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "si", $error, $id);
    mysqli_stmt_execute($stmt);
    echo "<script>
          window.location.href='profile.php';
        </script>";
  } else {
    // Move the uploaded image file to the "uploads" folder on the server
    move_uploaded_file($_FILES['image_admin']['tmp_name'], "uploads/" . $_FILES['image_admin']['name']);

    // Establish a connection to the MySQL database
    $connection = mysqli_connect("localhost", "root", "654321", "mhpbs");
    if (!$connection) {
      // Handle connection error
      throw new Exception(mysqli_connect_error());
      // or log the error message using a logging mechanism
    } else {
      // Retrieve the user's ID from the session

      // Update the 'image_admin' field in the 'admin_users' table with the name of the uploaded image file for the user with the retrieved ID
      $stmt = mysqli_prepare($connection, "UPDATE admin_users SET image_admin = ? WHERE id = ?");
      mysqli_stmt_bind_param($stmt, "si", $_FILES['image_admin']['name'], $id);
      mysqli_stmt_execute($stmt);
      echo "<script>
          window.location.href='profile.php';
        </script>";
    }
  }
}
