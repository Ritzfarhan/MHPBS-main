<!DOCTYPE html>
<html>

<head>
    <title>Rooms</title>
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
        <!-- Required meta tags-->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="au theme template">
        <meta name="author" content="Hau Nguyen">
        <meta name="keywords" content="au theme template">

        <!-- Title Page-->
        <title>Forms</title>

        <!-- Fontfaces CSS-->
        <link href="css/font-face.css" rel="stylesheet" media="all">
        <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
        <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
        <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

        <!-- Bootstrap CSS-->
        <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

        <!-- Vendor CSS-->
        <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
        <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
        <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
        <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
        <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
        <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
        <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

        <!-- Main CSS-->
        <link href="css/theme.css" rel="stylesheet" media="all">

    </head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="index.php">
                    <img src="images/icon/admindashboard.png" alt="Cool Admin" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="has-sub">
                            <a class="js-arrow" href="index.php">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list"></ul>
                        </li>
                        <li>
                            <a href="viewcust.php">
                                <i class="far fa-check-square"></i>Customer</a>
                        </li>
                        <li>
                            <a href="addroom.php">
                                <i class="fas fa-calendar-alt"></i>Add Rooms</a>
                        </li>
                        <li class="active">
                            <a href="viewroom.php">
                                <i class="fas fa-calendar-alt"></i>View Rooms</a>
                        </li>
                        <li>
                            <a href="viewbooking.php">
                                <i class="fas fa-calendar-alt"></i>View Bookings</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="" method="POST">
                                <input class="au-input au-input--xl" type="text" name="search" placeholder="Search for datas &amp; reports..." />
                                <button class="au-btn--submit" type="submit">
                                    <i class="zmdi zmdi-search"></i>
                                </button>
                            </form>
                            <div class="header-button">
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            <?php
                                            // $id = $_SESSION['id'];
                                            $connection = mysqli_connect("localhost", "root", "", "mhpbs");
                                            if (!$connection) {
                                                die("Database connection failed: " . mysqli_connect_error());
                                            }
                                            $query = "SELECT * FROM admin_users WHERE id = ?";
                                            $stmt = mysqli_prepare($connection, $query);
                                            mysqli_stmt_bind_param($stmt, "i", $id);
                                            mysqli_stmt_execute($stmt);
                                            $resultpic = mysqli_stmt_get_result($stmt);
                                            if (!$resultpic) {
                                                die("Query execution failed: " . mysqli_error($connection));
                                            }
                                            $row = mysqli_fetch_assoc($resultpic);
                                            if ($row['image_admin'] == '') {
                                                echo "<img src='images/icon/avatar-01.jpg' alt='John Doe' />";
                                            } else {
                                                echo "<img src='uploads/" . $row['image_admin'] . "' alt='admin' />";
                                            }
                                            mysqli_stmt_close($stmt);
                                            //mysqli_close($connection);
                                            ?>
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#"><?php echo $_SESSION['username'] ?></a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">

                                                    <?php
                                                    // $id = $_SESSION['id'];
                                                    $connection = mysqli_connect("localhost", "root", "", "mhpbs");
                                                    if (!$connection) {
                                                        die("Database connection failed: " . mysqli_connect_error());
                                                    }
                                                    $query = "SELECT * FROM admin_users WHERE id = ?";
                                                    $stmt = mysqli_prepare($connection, $query);
                                                    mysqli_stmt_bind_param($stmt, "i", $id);
                                                    mysqli_stmt_execute($stmt);
                                                    $resultpic = mysqli_stmt_get_result($stmt);
                                                    if (!$resultpic) {
                                                        die("Query execution failed: " . mysqli_error($connection));
                                                    }
                                                    $row = mysqli_fetch_assoc($resultpic);
                                                    if ($row['image_admin'] == '') {
                                                        echo "<img src='images/icon/avatar-01.jpg' alt='John Doe' />";
                                                    } else {
                                                        echo "<img src='uploads/" . $row['image_admin'] . "' alt='admin' />";
                                                    }
                                                    mysqli_stmt_close($stmt);
                                                    //mysqli_close($connection);
                                                    ?>
                                                    <!-- <img src="images/icon/avatar-01.jpg" alt="John Doe" />-->

                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#"><?php echo $_SESSION['firstname'] ?></a>
                                                    </h5>
                                                    <span class="email"><?php echo $_SESSION['email'] ?></span>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="profile.php">
                                                        <i class="zmdi zmdi-account"></i>Account</a>
                                                </div>
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-settings"></i>Setting</a>
                                                </div>
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-money-box"></i>Billing</a>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="../../Customer/home.php">
                                                    <i class="zmdi zmdi-power"></i>Logout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-6">
                                <link rel="stylesheet" href="table.css">
                                <h3>Deluxe Guest Room</h3>
                                <table class="content-table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Room Number</th>
                                            <th scope="col">Room Type</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Update Status</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $conn = $connection;
                                        // Check connection
                                        if ($conn->connect_error) {
                                            die("Connection failed: " . $conn->connect_error);
                                        }
                                        $sql = "SELECT name, room_number, price, status FROM rooms WHERE name = 'Deluxe Guest Room'";
                                        $result = $conn->query($sql);

                                        if ($result->num_rows > 0) {
                                            // output data of each row
                                            while ($row = $result->fetch_assoc()) {
                                                echo "<tr>";
                                                echo "<td>" . $row['room_number'] . "</td>";
                                                echo "<td>" . $row['name'] . "</td>";
                                                echo "<td>" . $row['price'] . "</td>";

                                                if ($row['status']  == 0) {
                                                    echo "<td style='color:#00D100'>Available</td>";
                                                } else {
                                                    echo "<td style='color:#D10000'>Closed</td>";
                                                }

                                                $room_number = $row['room_number'];

                                                echo '<td><form action="function.php" method="POST">';

                                                echo '<input type="hidden" name="appToClose" 
												value="' . $room_number . '" >';
                                                echo '<button type="submit" value="Close Appointment" 
												name="closeAppointment" class="btn btn-icon btn-danger">
												<h7> Set Unavailable <h7></button>';

                                                echo '&nbsp;&nbsp;<input type="hidden" name="appToOpen" 
												value="' . $room_number . '" >';
                                                echo '<button type="submit" value="Open Appointment" 
												name="openAppointment" class="btn btn-icon btn-success">
												<h7> Set Available <h7></button>';
                                                echo '</form></td>';

                                                echo '<td>';


                                                echo '<form action="function.php" method="post" >';
                                                echo '<input type="hidden" value="' . $room_number . '" name="RoomToDelete">';
                                                echo '<button class="btn btn-success"><a href="updateroom.php?updateroom_number=' . $room_number . '" class="text-light">Update</a></button>'; ?>&nbsp; <?php
                                                                                                                                                                                                        echo '<input type="submit" class="btn btn-danger" name="deleteRoom" value="Delete">';
                                                                                                                                                                                                        echo '</form>';
                                                                                                                                                                                                        echo '</td>';
                                                                                                                                                                                                    }
                                                                                                                                                                                                    echo "</table>";
                                                                                                                                                                                                } else {
                                                                                                                                                                                                    echo "0 results";
                                                                                                                                                                                                }
                                                                                                                                                                                                $conn->close();
                                                                                                                                                                                                        ?>

                                    </tbody>
                                </table>
                                <br>
                                <h3>Executive Deluxe Guest Room</h3>
                                <table class="content-table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Room Number</th>
                                            <th scope="col">Room Type</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Update Status</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $conn = mysqli_connect("localhost", "root", "", "MHPBS");
                                        // Check connection
                                        if ($conn->connect_error) {
                                            die("Connection failed: " . $conn->connect_error);
                                        }
                                        $sql = "SELECT name, room_number, price, status FROM rooms WHERE name = 'Executive Deluxe Guest Room'";
                                        $result = $conn->query($sql);

                                        if ($result->num_rows > 0) {
                                            // output data of each row
                                            while ($row = $result->fetch_assoc()) {
                                                echo "<tr>";
                                                echo "<td>" . $row['room_number'] . "</td>";
                                                echo "<td>" . $row['name'] . "</td>";
                                                echo "<td>" . $row['price'] . "</td>";

                                                if ($row['status']  == 0) {
                                                    echo "<td style='color:#00D100'>Available</td>";
                                                } else {
                                                    echo "<td style='color:#D10000'>Closed</td>";
                                                }

                                                $room_number = $row['room_number'];

                                                echo '<td><form action="function.php" method="POST">';

                                                echo '<input type="hidden" name="appToClose" 
												value="' . $room_number . '" >';
                                                echo '<button type="submit" value="Close Appointment" 
												name="closeAppointment" class="btn btn-icon btn-danger">
												<h7> Set Unavailable <h7></button>';

                                                echo '&nbsp;&nbsp;<input type="hidden" name="appToOpen" 
												value="' . $room_number . '" >';
                                                echo '<button type="submit" value="Open Appointment" 
												name="openAppointment" class="btn btn-icon btn-success">
												<h7> Set Available <h7></button>';
                                                echo '</form></td>';

                                                echo '<td>';

                                                echo '<form action="function.php" method="post" >';
                                                echo '<input type="hidden" value="' . $room_number . '" name="RoomToDelete">';
                                                echo '<button class="btn btn-success"><a href="updateroom.php?updateroom_number=' . $room_number . '" class="text-light">Update</a></button>'; ?>&nbsp; <?php
                                                                                                                                                                                                        echo '<input type="submit" class="btn btn-danger" name="deleteRoom" value="Delete">';
                                                                                                                                                                                                        echo '</form>';
                                                                                                                                                                                                        echo '</td>';
                                                                                                                                                                                                    }
                                                                                                                                                                                                    echo "</table>";
                                                                                                                                                                                                } else {

                                                                                                                                                                                                    echo "0 results";
                                                                                                                                                                                                }
                                                                                                                                                                                                $conn->close();
                                                                                                                                                                                                        ?>
                                    </tbody>
                                </table>

                                <br>
                                <h3>Executive Suite</h3>

                                <table class="content-table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Room Number</th>
                                            <th scope="col">Room Type</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Update Status</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $conn = mysqli_connect("localhost", "root", "", "MHPBS");
                                        // Check connection
                                        if ($conn->connect_error) {
                                            die("Connection failed: " . $conn->connect_error);
                                        }
                                        $sql = "SELECT name, room_number, price, status FROM rooms WHERE name = 'Executive Suite'";
                                        $result = $conn->query($sql);

                                        if ($result->num_rows > 0) {
                                            // output data of each row
                                            while ($row = $result->fetch_assoc()) {
                                                echo "<tr>";
                                                echo "<td>" . $row['room_number'] . "</td>";
                                                echo "<td>" . $row['name'] . "</td>";
                                                echo "<td>" . $row['price'] . "</td>";

                                                if ($row['status']  == 0) {
                                                    echo "<td style='color:#00D100'>Available</td>";
                                                } else {
                                                    echo "<td style='color:#D10000'>Closed</td>";
                                                }

                                                $room_number = $row['room_number'];

                                                echo '<td><form action="function.php" method="POST">';

                                                echo '<input type="hidden" name="appToClose" 
												value="' . $room_number . '" >';
                                                echo '<button type="submit" value="Close Appointment" 
												name="closeAppointment" class="btn btn-icon btn-danger">
												<h7> Set Unavailable <h7></button>';

                                                echo '&nbsp;&nbsp;<input type="hidden" name="appToOpen" 
												value="' . $room_number . '" >';
                                                echo '<button type="submit" value="Open Appointment" 
												name="openAppointment" class="btn btn-icon btn-success">
												<h7> Set Available <h7></button>';
                                                echo '</form></td>';

                                                echo '<td>';

                                                echo '<form action="function.php" method="post" >';
                                                echo '<input type="hidden" value="' . $room_number . '" name="RoomToDelete">';
                                                echo '<button class="btn btn-success"><a href="updateroom.php?updateroom_number=' . $room_number . '" class="text-light">Update</a></button>'; ?>&nbsp; <?php
                                                                                                                                                                                                        echo '<input type="submit" class="btn btn-danger" name="deleteRoom" value="Delete">';
                                                                                                                                                                                                        echo '</form>';
                                                                                                                                                                                                        echo '</td>';
                                                                                                                                                                                                    }
                                                                                                                                                                                                    echo "</table>";
                                                                                                                                                                                                } else {

                                                                                                                                                                                                    echo "0 results";
                                                                                                                                                                                                }
                                                                                                                                                                                                $conn->close();
                                                                                                                                                                                                        ?>
                                    </tbody>
                                </table>

                                <br>
                                <h3>Palace Suite</h3>

                                <table class="content-table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Room Number</th>
                                            <th scope="col">Room Type</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Update Status</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $conn = mysqli_connect("localhost", "root", "", "MHPBS");
                                        // Check connection
                                        if ($conn->connect_error) {
                                            die("Connection failed: " . $conn->connect_error);
                                        }
                                        $sql = "SELECT name, room_number, price, status FROM rooms WHERE name = 'Palace Suite'";
                                        $result = $conn->query($sql);

                                        if ($result->num_rows > 0) {
                                            // output data of each row
                                            while ($row = $result->fetch_assoc()) {
                                                echo "<tr>";
                                                echo "<td>" . $row['room_number'] . "</td>";
                                                echo "<td>" . $row['name'] . "</td>";
                                                echo "<td>" . $row['price'] . "</td>";

                                                if ($row['status']  == 0) {
                                                    echo "<td style='color:#00D100'>Available</td>";
                                                } else {
                                                    echo "<td style='color:#D10000'>Closed</td>";
                                                }

                                                $room_number = $row['room_number'];

                                                echo '<td><form action="function.php" method="POST">';

                                                echo '<input type="hidden" name="appToClose" 
												value="' . $room_number . '" >';
                                                echo '<button type="submit" value="Close Appointment" 
												name="closeAppointment" class="btn btn-icon btn-danger">
												<h7> Set Unavailable <h7></button>';

                                                echo '&nbsp;&nbsp;<input type="hidden" name="appToOpen" 
												value="' . $room_number . '" >';
                                                echo '<button type="submit" value="Open Appointment" 
												name="openAppointment" class="btn btn-icon btn-success">
												<h7> Set Available <h7></button>';
                                                echo '</form></td>';

                                                echo '<td>';

                                                echo '<form action="function.php" method="post" >';
                                                echo '<input type="hidden" value="' . $room_number . '" name="RoomToDelete">';
                                                echo '<button class="btn btn-success"><a href="updateroom.php?updateroom_number=' . $room_number . '" class="text-light">Update</a></button>'; ?>&nbsp; <?php
                                                                                                                                                                                                        echo '<input type="submit" class="btn btn-danger" name="deleteRoom" value="Delete">';
                                                                                                                                                                                                        echo '</form>';
                                                                                                                                                                                                        echo '</td>';
                                                                                                                                                                                                    }
                                                                                                                                                                                                    echo "</table>";
                                                                                                                                                                                                } else {

                                                                                                                                                                                                    echo "0 results";
                                                                                                                                                                                                }
                                                                                                                                                                                                $conn->close();
                                                                                                                                                                                                        ?>
                                    </tbody>
                                </table>
                                </link>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>



    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="js/main.js"></script>

</body>

</html>
<!-- end document-->