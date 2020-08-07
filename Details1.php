<?php  
require 'header.php';
require "includes/dbh.inc.php";
?>

hello world

<pre>
	

<?php
$sql = "SELECT * FROM prop ";
	 

	 	$result = mysqli_query($conn, $sql);
	 	
	 	$resultCheck = mysqli_num_rows($result);

	 	$row=mysqli_fetch_array($result);

	 	$img = $row[0];

	 	echo '<img src="images/test.jpg" width="25%">';
	 	

	 	?>
























</pre>
<?php  
require 'footer.php';

?>