                                             <!-- Verification Coding 100% COMPLETED -->
<!-- NO NEED TO CHANGE ANYTHING SINCE THIS CODE IS FOR CHANGING VERIFIED STATUS IN DATABASE FROM 0 TO 1 AFTER CLICKING A LINK FROM REGISTERED EMAIL-->
                                            <!-- AKMAL LAST UPDATED ON 9/4/2021 5:30 AM-->

<?php
if(isset($_GET['vkey'])){
	//Verification Process
	$vkey = $_GET['vkey'];
	
	$mysqli = new MySQLi('localhost', 'fypmhpbs', 'iDRIS@976', 'sdmarrio_mhpbs');
	
	$resultSet = $mysqli->query("SELECT verified,vkey FROM users WHERE verified = 0 AND vkey = '$vkey' LIMIT 1");
	
	if($resultSet->num_rows == 1){
		//Validate The Email 
		$update = $mysqli->query("UPDATE USERS SET verified = 1 WHERE vkey = '$vkey' LIMIT 1");
		
		if($update){
		     header("Location: successverify.php");
		     exit;
		}else{
			echo $mysqli->error;	
		}
	}else{
		     header("Location: unsuccessverify.php");
		     exit;
	}
	
}else{
	die("Something whet wrong");
}

?>

<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
</body>
</html>