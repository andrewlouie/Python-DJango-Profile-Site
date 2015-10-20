			<ul class="nav nav-pills nav-stacked">
           <li>Catagories</li>
<?php include 'dbconn.php' ?>
<?php 
try {
	$dbh = new PDO('sqlsrv:server=127.0.0.1;Database=toys');
	$rowcount = 0;
	$lastcat = "null";
	$sql="SELECT * FROM category;";
	foreach($dbh->query($sql) as $row) {
		echo "<li role='presentation'><a href='products.php?cat=";
		echo $row['cat_id'];
		echo "'>";
		echo $row['category'];
		echo "</a></li>";
	}
	$dbh = null;
}
catch (PDOException $e) {
	echo "Error!: " . $e->getMessage();
	die();
}
?>
            </ul>
