<?php include 'dbconn.php' ?>
<?php
session_start();
$q = $_REQUEST['q'];
try {
	$dbh = new PDO('sqlsrv:server=127.0.0.1;Database=toys');
	$sql = "SELECT COUNT(*) FROM cart WHERE user_id = " . $q . ";";
	if ($res = $dbh->query($sql)) {
		if ($res->fetchColumn() > 0) {
			unset($_SESSION['cart']);
			unset($_SESSION['cart2']);
			$_SESSION['cart'] = array();
			$_SESSION['cart2'] = array();
			$sql = "SELECT item_id,qty FROM cart WHERE user_id = " . $q . ";";
			foreach($dbh->query($sql) as $row) {
				array_push($_SESSION['cart'],$row['item_id']);
				array_push($_SESSION['cart2'],$row['qty']);
			}
			echo count($_SESSION['cart']);
		}
		else echo 0;
	}
    $dbh = null;
    $res = null;
}
catch (PDOException $e) {
	print "Error!: " . $e->getMessage() . "<br/>";
	die();
}
?>