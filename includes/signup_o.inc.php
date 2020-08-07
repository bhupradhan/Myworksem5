<?php

if(isset($_POST['signup-submit'])){
	require"dbh.inc.php";

	$username = $_POST['uid'];
	$email = $_POST['mail'];
	$password = $_POST['pwd'];
	$passwordRepeat = $_POST['pwd-repeat'];
	
	
	if($password !== $passwordRepeat){

		header("Location: ../signup_o.php?error=passwordcheckuid".$username."&mail=".$email);
		exit();
	}
	else{

		$sql = "SELECT ouidusers FROM ownerusers WHERE ouidUsers=?";
		$stmt = mysqli_stmt_init($conn);

		if(!mysqli_stmt_prepare($stmt, $sql)){

			header("Location: ../signup_o.php?error=sqlerror");
		exit();
		}
		else{

			mysqli_stmt_bind_param($stmt, "s", $username);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_store_result($stmt);
			$resultCheck = mysqli_stmt_num_rows($stmt);
			if($resultCheck >0){
				header("Location: ../signup_o.php?error=userTaken&mail=".$email);
		exit();
	}
		else{
			$sql = "INSERT INTO ownerusers (ouidUsers, oemailUsers, opwdUsers ) VALUES (?, ?, ?)";
			$stmt = mysqli_stmt_init($conn);
			if(!mysqli_stmt_prepare($stmt, $sql)){

				header("Location: ../signup_o.php?error=sqlError");
		exit();
	}
			else{
				$hashedPwd = password_hash($password, PASSWORD_DEFAULT);
			mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedPwd );
			mysqli_stmt_execute($stmt);

				header("Location: ../signup_o.php?signup=success");
				exit();

			}
			}



		}
			
		}
		

	
	


mysqli_stmt_close($stmt);
mysqli_close($conn);


}
else{
	header("Location ../signup.php");
	exit();
}