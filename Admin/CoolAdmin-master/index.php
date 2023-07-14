<?php
session_start();
include 'database.php';
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
    <title>Dashboard</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
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
                <a href="index.html">
                    <img src="images/icon/admindashboard.png" alt="Cool Admin" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="active has-sub">
                            <a class="js-arrow" href="index.php">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list"></ul>
                        </li>
                        <li>
                            <a href="viewcust.php">
                                <i class="far fa-check-square"></i>Customers</a>
                        </li>
                        <li>
                            <a href="addroom.php">
                                <i class="fas fa-calendar-alt"></i>Add Rooms</a>
                        </li>
                        <li>
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

                                </button>
                            </form>
                            <div class="header-button">
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            <?php
                                            // $id = $_SESSION['id']
                                            if ($row['image_admin'] == '') {
                                                echo "<img src='images/icon/avatar-01.jpg' alt='John Doe' />";
                                            } else {
                                                echo "<img src='uploads/" .  $image . "' alt='admin' />";
                                            }
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
                                                    if ($row['image_admin'] == '') {
                                                        echo "<img src='images/icon/avatar-01.jpg' alt='John Doe' />";
                                                    } else {
                                                        echo "<img src='uploads/" .  $image . "' alt='admin' />";
                                                    }
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
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="logout.php">
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

                    <div class="row">
                        <div class="col-md-12">
                            <div class="overview-wrap">

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="au-card au-card--no-shadow au-card--no-pad m-b-40">
                                <div class="au-card-title" style="background-image:url('images/bg-title-01.jpg');">
                                    <div class="bg-overlay bg-overlay--blue"></div>
                                    <h3>
                                        <i class="zmdi zmdi-account-calendar"></i>Reminders
                                    </h3>
                                </div>
                                <div class="au-task js-list-load">
                                    <div class="au-task-list js-scrollbar3">
                                        <div class="au-task__item au-task__item--danger">
                                            <div class="au-task__item-inner">
                                                <h5 class="task">
                                                    <a>All Administrators Must Log Out After Shift Ends</a>
                                                </h5>
                                            </div>
                                        </div>
                                        <div class="au-task__item au-task__item--warning">
                                            <div class="au-task__item-inner">
                                                <h5 class="task">
                                                    <a>Be Diligent of Customer's Bookings</a>
                                                </h5>
                                            </div>
                                        </div>
                                        <div class="au-task__item au-task__item--primary">
                                            <div class="au-task__item-inner">
                                                <h5 class="task">
                                                    <a>Make No Mistake While Updating</a>
                                                </h5>
                                            </div>
                                        </div>
                                        <div class="au-task__item au-task__item--success">
                                            <div class="au-task__item-inner">
                                                <h5 class="task">
                                                    <a href="#">Any Form of Complaints Received From Customers Will Result In Deduction of Pay</a>
                                                </h5>
                                            </div>
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
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
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