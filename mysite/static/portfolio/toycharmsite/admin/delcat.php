<?php include '../dbconn.php' ?>
<?php
try {
    $dbh = new PDO('sqlsrv:server=127.0.0.1;Database=toys');
    $sql = "DELETE FROM category WHERE cat_id = " . $_GET['q'] . ";";
echo $sql;
    $sth = $dbh->prepare($sql);	
    $sth->execute();
    echo $dbh->lastInsertId();
    $dbh = null;
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>
