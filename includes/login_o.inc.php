<?php
if(isset($_POST['login-submit'])){


	require'dbh.inc.php';


	$mailuid = $_POST['mailuid'];
	$password = $_POST['pwd'];

	if (empty($mailuid) || empty($password)){

		header("Location: ../index.php?error=emptyfields");
		exit();
	}
	else{

		$sql = "SELECT * FROM ownerusers WHERE ouidUsers=? OR oemailUsers=?;";
		$stmt = mysqli_stmt_init($conn);

		if(!mysqli_stmt_prepare($stmt, $sql)){

			header("Location ../index.php?error=sqlerror");
			exit();
		}

		else{

			mysqli_stmt_bind_param($stmt, "ss", $mailuid, $mailuid );
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);
			if($row = mysqli_fetch_assoc($result)){
				$pwdCheck = password_verify($password, $row['opwdUsers']);

				if($pwdCheck == false){

				header("Location: ../index.php?error=wrongpwd");
				exit();
				}
			
				elseif($pwdCheck==true){


			

				session_start();
				$_SESSION['ouserId'] = $row['oidUsers'];
				$_SESSION['ouserUid'] = $row['ouidUsers'];
				//$_SESSION['result'] = $result;


				header("Location: ../index.php?login=success");
				exit();


				}
				

				

			}
			else{

					header("Location: ../index.php?error=Nouserfound");
				exit();

			}	
		}

	
	}



}
else{

	header("Location: ../index.php");
	exit();
}