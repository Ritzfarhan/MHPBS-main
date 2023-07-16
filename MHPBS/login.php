                    <!-- LOG IN 80% COMPLETED -->
                    <!-- For Ridhwan BackEnd Devs-->
                    <!-- 1. NEED TO ADD RESET PASSWORD FEATURE INTO LOGIN / LOGOUT FEATURE-->
                    <!-- AKMAL LAST UPDATED ON 9/10/2021 1:30 AM-->



                    <?php
					session_start();

					$error = NULL;

					if (isset($_POST['submit'])) {
						//Connect to the Database
						$username = $_POST['username'];
						$password = $_POST['password'];

						$mysqli = new MySQLi('localhost', 'root', '654321', 'mhpbs');

						//Get form data
						$username = $mysqli->real_escape_string($_POST['username']);
						$password = $mysqli->real_escape_string($_POST['password']);
						$password = md5($password);

						//Query the database
						$resultSet = $mysqli->query("SELECT * FROM users WHERE username = '$username' AND password = '$password' LIMIT 1");

						if ($resultSet->num_rows != 0) {
							//Process Login
							$row = $resultSet->fetch_assoc();
							$verified = $row['verified'];
							$email = $row['email'];
							$date = $row['createdate'];
							$date = strtotime($date);
							$date = date('M d Y', $date);


							if ($verified == 1) {
								//Continue Processing
								echo "Your account was verified and you have been logged in";

								$_SESSION['loggedin'] = TRUE;
								$_SESSION['user'] = $username;

								header('location:index.php');
								die;
							} else {
								$error = "This account has not yet been verified. An email was sent to $email on $date";
							}
						} else {
							//Invalid Credentials
							$error = "The Username Or Password you entered is incorect";
						}
					}
					?>

                    <html>

                    <head>
                    	<meta charset="utf-8">
                    	<title>Login Form Design</title>
                    	<link rel="icon" type="image/png" href="Pictures/Icon Logo/UTM-LOGO.png" />
                    	<link rel="stylesheet" type="text/css" href="style.css">

                    </head>

                    <body>

                    	<div class="loginbox">
                    		<img src="Pictures/Login Customer/avatar.jpg" class="avatar">
                    		<h1>Log In Here</h1>
                    		<form method="POST" action="">
                    			<p>Username</p>
                    			<input id="text" type="text" name="username" placeholder="Enter Username">
                    			<p>Password</p>
                    			<input id="text" type="password" name="password" placeholder="Enter Password">
                    			<input id="button " type="submit" name="submit" value="Login">



                    		</form>
                    		<a href="forgot.php">Forgot Password?</a>
                    		<?php echo $error  ?>
                    	</div>

                    	<center>
                    	</center>
                    </body>

                    </html>