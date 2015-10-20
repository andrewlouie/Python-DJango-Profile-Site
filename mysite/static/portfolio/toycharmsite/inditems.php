<?php include 'dbconn.php' ?>
<?php 
try {
	if (isset($_GET['cat'])) $cat = $_GET['cat']; else $cat = 0;
	if (isset($_GET['featured'])) $feat = $_GET['featured']; else $feat = "n";
	if (isset($_GET['skip'])) $skip = $_GET['skip']; else $skip = 0;
	if (isset($_GET['sort'])) $sort = $_GET['sort']; else $sort = 0;
	if (isset($_GET['bestsellers'])) $best = $_GET['bestsellers']; else $best = 0;
	if (isset($_GET['sale'])) $sale = $_GET['sale']; else $sale = 0;
	if (isset($_GET['searchbox'])) $searchbox = $_GET['searchbox']; else $searchbox = 0;
	switch ($sort) {
	case 0: $sortby = "featured"; break;
	case 1: $sortby = "price DESC"; break;
	case 2: $sortby = "price ASC"; break;
	case 3: $sortby = "title"; break;
	case 4: $sortby = "date DESC";
	}
	if ($searchbox != "0")  $sql="SELECT TOP 20 item,title,iif(charindex(',', pics)=0,pics,left(pics,charindex(',', pics)-1)) pics,price,saleprice,(SELECT COUNT(*) FROM toys WHERE visible = 1 AND title LIKE '%" . $searchbox . "%') 'rowcount' FROM toys WHERE visible = 1 AND title LIKE '%" . $searchbox . "%' ORDER BY " . $sortby . ";";
	elseif ($feat === "y") $sql="SELECT TOP 20 item,title,iif(charindex(',', pics)=0,pics,left(pics,charindex(',', pics)-1)) pics,price,saleprice,(SELECT COUNT(*) FROM toys WHERE visible = 1 AND featured = 1) 'rowcount' FROM toys WHERE visible = 1 AND featured = 1 ORDER BY " . $sortby . ";";
	elseif ($best === "y") $sql="SELECT TOP 20 item,title,iif(charindex(',', pics)=0,pics,left(pics,charindex(',', pics)-1)) pics,price,saleprice,(SELECT COUNT(*) FROM toys WHERE visible = 1 AND bestseller = 1) 'rowcount' FROM toys WHERE visible = 1 AND bestseller = 1 ORDER BY " . $sortby . ";"; 
	elseif ($sale === "y") $sql="SELECT TOP 20 item,title,iif(charindex(',', pics)=0,pics,left(pics,charindex(',', pics)-1)) pics,price,saleprice,(SELECT COUNT(*) FROM toys WHERE visible = 1 AND saleprice IS NOT NULL) 'rowcount' FROM toys WHERE visible = 1 AND saleprice IS NOT NULL ORDER BY " . $sortby . ";";	
	elseif ($cat != 0) $sql="SELECT TOP 20 t.item,t.title,iif(charindex(',', t.pics)=0,t.pics,left(pics,charindex(',', t.pics)-1)) pics,t.price,t.saleprice,category,(SELECT COUNT(*) FROM toys WHERE visible = 1 AND cat_id = " . $cat . ") 'rowcount' FROM toys t JOIN category ON t.cat_id = category.cat_id WHERE visible = 1 AND t.cat_id = " . $cat . " ORDER BY " . $sortby . ";";
	else $sql="SELECT TOP 20 item,title,iif(charindex(',', pics)=0,pics,left(pics,charindex(',', pics)-1)) pics,price,saleprice,(SELECT COUNT(*) FROM toys WHERE visible = 1) 'rowcount' FROM toys WHERE visible = 1 ORDER BY " . $sortby . ";";
	//echo $sale;
	//echo $sql;
	$found = 0;
	$rowct = 0;
	$rowct2 = 0;
	$dbh = new PDO('sqlsrv:server=127.0.0.1;Database=toys');
	foreach($dbh->query($sql) as $row) {
		$found = 1;
		echo "<div class='col-sm-3'><div class='aafeatbox'><div class='center-block'><a href='item.php?id=";
		echo $row['item'];
		echo "'><img src='images/";
		echo $row['pics'];
		echo "' alt='";
		echo $row['title'];
		echo "'/></a></div><span class='aabottom'><span class='aalabel2'><a href='item.php?id=";
		echo $row['item'];
		echo "'>";
		echo $row['title'];
		echo "</a></span><span class='aaprice'>";
		if (!is_null($row['saleprice'])) {
		echo "<s>";
		echo "$";
		echo $row['price'];
		echo "</s> $";
		echo $row['saleprice'];
		}
		else {
		echo "$";
		echo $row['price'];	
		}
		echo "</span></span></div></div>";
		if (($cat != 0) && ($rowct != 1)) { $catn = $row['category']; $rowct = 1; }
		if ($rowct2 == 0) { $_SESSION['totalcount'] = $row['rowcount']; $rowct2 = 1; }
	}
	$dbh = null;
}
catch (PDOException $e) {
	echo "Error!: " . $e->getMessage();
	die();
}
	if ($found == 0) echo "NO RESULTS FOUND";
	elseif ($cat != 0) echo "<script>document.title = '" . "Toy Store - " . $catn . "'</script>"
?>