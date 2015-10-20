<?php include '../dbconn.php' ?>
<?php
try {
    $dbh = new PDO('sqlsrv:server=127.0.0.1;Database=toys');
    $sql = "INSERT INTO category (cat_id,category) VALUES (NULL, '" . $_GET['q'] . "');";
    $sth = $dbh->prepare($sql);	
    $sth->execute();
    echo $dbh->lastInsertId();
    $dbh = null;
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>
