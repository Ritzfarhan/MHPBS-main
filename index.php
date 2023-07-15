                    <!-- INDEX PAGE 10% COMPLETED -->
                    <!-- AFTER CUSTOMER LOG IN, THEY WILL BE DIRECTED TO THIS PAGE -->
                    <!-- For FrontEnd Devs-->
                    <!-- 1.NEED TO ADD FEATURES AND DESIGN FOR CUSTOMER TO NAVIGATE IN THE PAGE-->
                    <!-- 2. !!!DO NOT DELETE THE PHP CODING!!!-->


                    <?php
                        session_start();

                        // Check if the user is logged in
                        if (!isset($_SESSION['user'])) {
                                // Redirect to the specific file
                                header('Location:Customer/home.php');
                                exit;
                        } else {
                                header('Location:Customer/home.php');
                                exit;
                        }
