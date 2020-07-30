<?php
require "header.php";
?>
<?php
require "includes/dbh.inc.php";
?>

<main>

	





<?php


	 if(isset($_SESSION['userId'])){
/*
	 	echo $_SESSION['userId'];
	 	$idUsers = $_SESSION['userId'];

	 	$sql = "SELECT * FROM users WHERE idUsers = ? ";
	 	$stmt = mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmt, $sql)){

			header("Location: ../signup.php?error=sqlerror");
		exit();
		}
		else{
	 	mysqli_stmt_bind_param($stmt, "s", $idUsers);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_store_result($stmt);

	 	$result = mysqli_query($conn, $sql);
	 	$resultCheck = mysqli_stmt_num_rows($stmt);
	 	if($resultCheck >0){
	 		while($row = mysqli_fetch_assoc($result)){
	 			foreach($row as $x => $x_value) {
 				echo $x_value;
  				echo "<br>";
		} 
	 		}
	 		
	 	}    */

	 	
			echo ' feature: user can see his enquiries<h1>SITE 1 </h1>

			<a href="details1.php"><img src="images/test.jpg" width="25%"></a>
			<h1>SITE 2 </h1>

			<a href="details1.php"><img src="images/test.jpg" width="25%"></a>';

			
		}
	

/*
		if(isset($_SESSION['userId'])){
				echo '<form action="includes/logout.inc.php" method="post">
				
				<button type="submit" name="logout-submit">Logout</button>
			</form><p> You are logged in </p>';
			}
		
		else{
			echo '<p> You are logged out</p>';
		}

*/
	?>
	

</main>
<pre>













































	</pre>
<?php
require "footer.php";
?>






