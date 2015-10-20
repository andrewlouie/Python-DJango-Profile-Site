<?php include '../dbconn.php' ?>
<?php
$q = $_REQUEST["q"];
try {
	$dbh = new PDO('sqlsrv:server=127.0.0.1;Database=toys');
	$sql = "DELETE FROM toys WHERE item = " . $q;
	$sth = $dbh->prepare($sql);	
	$sth->execute();
	$dbh = null;
}
catch (PDOException $e) {
	print "Error!: " . $e->getMessage() . "<br/>";
	die();
}
?>