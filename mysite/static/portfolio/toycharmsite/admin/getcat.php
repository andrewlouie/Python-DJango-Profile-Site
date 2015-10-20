<?php include '../dbconn.php' ?>
<?php
try {
    $dbh = new PDO('sqlsrv:server=127.0.0.1;Database=toys');
    foreach($dbh->query('SELECT * FROM category') as $row) {
	echo $row["cat_id"];
	echo "||";
	echo $row["category"];
	echo "||";
    }
    $dbh = null;
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>
