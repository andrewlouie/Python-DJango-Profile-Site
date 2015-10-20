<?php include '../dbconn.php' ?>
<?php
try {
    $dbh = new PDO('sqlsrv:server=127.0.0.1;Database=toys');
    foreach($dbh->query('SELECT item,title FROM toys ORDER BY date DESC') as $row) {
	echo $row["item"];
	echo "||";
	echo $row["title"];
	echo "||";
    }
    $dbh = null;
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>
