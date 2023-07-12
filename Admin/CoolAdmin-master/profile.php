<?php
session_start();
if (!(isset($_SESSION['username']) && $_SESSION['username'] != '')) {
  header("index.php");
}

require "database.php";

//$id = $_SESSION['id'];
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
$image = $row['image_admin']


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <!--  This file has been downloaded from bootdey.com @bootdey on twitter -->
  <!--  All snippets are MIT license http://bootdey.com/license -->
  <title>Profile</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
  <div class="container">
    <div class="main-body">

      <!-- Breadcrumb -->
      <nav aria-label="breadcrumb" class="main-breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Back</a></li>
        </ol>
      </nav>
      <!-- /Breadcrumb -->

      <div class="row gutters-sm">
        <div class="col-md-4 mb-3">
          <div class="card">
            <div class="card-body">
              <div class="d-flex flex-column align-items-center text-center">

                <!-- Php image -->
                <?php
                // $id = $_SESSION['id'];
                // $connection = mysqli_connect("localhost", "root", "", "mhpbs");
                if (!$connection) {
                  die("Database connection failed: " . mysqli_connect_error());
                }
                $query = "SELECT * FROM admin_users WHERE id = ?";
                $stmt = mysqli_prepare($connection, $query);
                mysqli_stmt_bind_param($stmt, "i", $id);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                if (!$result) {
                  die("Query execution failed: " . mysqli_error($connection));
                }
                $row = mysqli_fetch_assoc($result);
                if ($row['image_admin'] == '') {
                  echo "<img src='uploads/default.png' alt='admin' class='rounded-circle' width='150'>";
                } else {
                  echo "<img src='uploads/" . $row['image_admin'] . "' alt='admin' class='rounded-circle' width='150'>";
                }
                mysqli_stmt_close($stmt);
                mysqli_close($connection);
                ?>

                <div class="mt-3">
                  <h4><?php echo $_SESSION['username'] ?></h4>
                  <p class="text-secondary mb-1">Administrator</p>
                </div>
              </div>
            </div>
          </div>

        </div>
        <hr>
        <div class="col-md-8">
          <div class="card mb-3">
            <div class="card-body">
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">First Name</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <?php echo $firstname ?>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Last Name</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <?php echo $lastname ?>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Email</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <?php echo $email ?>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Phone Number</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <?php echo $phone ?>
                </div>
              </div>
              <hr>


              <!--Upload image button -->
              <div class="row">
                <div class="col-sm-12">
                  <form action="upload.php" method="post" enctype="multipart/form-data">
                    <input type="file" name="image_admin">
                    <input type="submit" name="upload_image_admin" value="Upload" class="btn btn-primary">
                  </form>

                </div>
              </div>


              <div class="row">
                <div class="col-sm-12">
                  <a class="btn btn-info" href="edit_profile_admin.php">Edit Details</a>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
    <footer class="footer">
      <div class="" style="text-align: center">
        &copy; Copyright <strong><span>Marriott</span></strong>
      </div>
    </footer>
  </div>





  <style type="text/css">
    body {
      margin-top: 20px;
      color: #1a202c;
      text-align: left;
      background-color: #e2e8f0;
    }

    .main-body {
      padding: 15px;
    }

    .card {
      box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
    }

    .card {
      position: relative;
      display: flex;
      flex-direction: column;
      min-width: 0;
      word-wrap: break-word;
      background-color: #fff;
      background-clip: border-box;
      border: 0 solid rgba(0, 0, 0, .125);
      border-radius: .25rem;
    }

    .card-body {
      flex: 1 1 auto;
      min-height: 1px;
      padding: 1rem;
    }

    .gutters-sm {
      margin-right: -8px;
      margin-left: -8px;
    }

    .gutters-sm>.col,
    .gutters-sm>[class*=col-] {
      padding-right: 8px;
      padding-left: 8px;
    }

    .mb-3,
    .my-3 {
      margin-bottom: 1rem !important;
    }

    .bg-gray-300 {
      background-color: #e2e8f0;
    }

    .h-100 {
      height: 100% !important;
    }

    .shadow-none {
      box-shadow: none !important;
    }
  </style>

  <script type="text/javascript">

  </script>
</body>

</html>