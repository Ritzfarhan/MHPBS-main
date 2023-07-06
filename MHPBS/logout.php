                                             <!-- LOG OUT 100% COMPLETED -->
<!-- NO NEED TO CHANGE ANYTHING SINCE THIS CODE IS TO DESTROY ANY USER'S IN THE SESSION TO MAKE SURE THEY ARE LOG OUT FROM ANY SESSION-->
                                            <!-- AKMAL LAST UPDATED ON 9/4/2021 5:30 AM-->

<?php
session_start();
session_destroy();

echo"You have been logged out.";
?>