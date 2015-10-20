<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="utf-8">
	<meta content="IE=edge" http-equiv="X-UA-Compatible">
	<meta content="width=device-width, initial-scale=1" name="viewport">

	<title>Toy Charm</title>
	<link href="css/bootstrap.css" rel="stylesheet">
	<link href="css/stylesheet2.css" rel="stylesheet" type="text/css">

	<link href="favicon.ico" rel="shortcut icon" type="image/x-icon">
	<link href="favicon.ico" rel="icon" type="image/x-icon">
	<script src="js/jquery-1.11.2.min.js"></script> <script src="js/bootstrap.js"></script>    
<!--<script src="js/jssor.slider.mini.js"></script>
<script>
    jQuery(document).ready(function ($) {
var options = {
            	$AutoPlay: true,
							$BulletNavigatorOptions: {
                $Class: $JssorBulletNavigator$,
                $ChanceToShow: 2,
				$AutoCenter: 1,
            }
        };
        var jssor_slider1 = new $JssorSlider$('slider1_container', options);
    });
</script>
--></head>

<body>
<?php include 'headnav.php' ?>
<br>
<!--<div class="container container-fluid">
<div class="col-sm-4"></div>
<div class="col-sm-8">
<div id="slider1_container" style="position: relative; top: 0px; left: 0px; width: 690px; height: 460px;">
<div class="container container-fluid">    <!-- Slides Container -->
<!--    <div u="slides" style="cursor: move; position: absolute; overflow: hidden; left: 0px; top: 0px; width: 690px; height: 460px;">
   <div><img u="image" src="include/slide for toycharm.jpg" /></div>
        <div><img u="image" src="include/slide for toycharm2.jpg" /></div>
        <div><img u="image" src="include/slide for toycharm3.jpg" /></div>
       </div>
        <style>
            /* jssor slider bullet navigator skin 03 css */
            /*
            .jssorb03 div           (normal)
            .jssorb03 div:hover     (normal mouseover)
            .jssorb03 .av           (active)
            .jssorb03 .av:hover     (active mouseover)
            .jssorb03 .dn           (mousedown)
            */
            .jssorb03 {
                position: absolute;
            }
            .jssorb03 div, .jssorb03 div:hover, .jssorb03 .av {
                position: absolute;
                /* size of bullet elment */
                width: 21px;
                height: 21px;
                text-align: center;
                line-height: 21px;
                color: white;
                font-size: 12px;
                background: url(include/b11.png) no-repeat;
                overflow: hidden;
                cursor: pointer;
            }
            .jssorb03 div { background-position: -5px -4px; }
            .jssorb03 div:hover, .jssorb03 .av:hover { background-position: -35px -4px; }
            .jssorb03 .av { background-position: -65px -4px; }
            .jssorb03 .dn, .jssorb03 .dn:hover { background-position: -95px -4px; }
        </style>
        <!-- bullet navigator container -->
        <!--<div u="navigator" class="jssorb03" style="bottom: 16px; right: 6px;">
            <!-- bullet navigator item prototype -->
           <!-- <div u="prototype"><div u="numbertemplate"></div></div>
        </div>-->
<!--</div></div></div></div>-->
<div class="main-container">
<div class="container container-fluid">
<?php 
try {
	$dbh = new PDO('sqlsrv:server=127.0.0.1;Database=toys');
	$rowcount = 0;
	$lastcat = "null";
	echo "<h2><a href='products.php?featured=y'>Featured Items</a></h2><div class='row'>";
	$sql="SELECT TOP 4 item,title,iif(charindex(',', pics)=0,pics,left(pics,charindex(',', pics)-1)) pics,price,saleprice FROM toys WHERE featured = 1 AND visible = 1 ORDER BY NEWID();";
	$sth = $dbh->prepare($sql);
	$sth->execute();
	$result = array();
	$result = $sth->fetchAll();
	foreach($result as $row) {		
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
	}
	echo "</div><hr><h2><a href='products.php?bestsellers=y'>Best Sellers</a></h2><div class='row'>";
	
	$sql="SELECT TOP 4 item,title,iif(charindex(',', pics)=0,pics,left(pics,charindex(',', pics)-1)) pics,price,saleprice FROM toys WHERE bestseller = 1 AND visible = 1 ORDER BY NEWID();";
	$sth = $dbh->prepare($sql);
	$sth->execute();
	$result = array();
	$result = $sth->fetchAll();
	foreach($result as $row) {		
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
	}
	
	echo "</div><hr><h2><a href='products.php?sort=4'>New Items</a></h2><div class='row'>";
	
	$sql="SELECT TOP 4 item,title,iif(charindex(',', pics)=0,pics,left(pics,charindex(',', pics)-1)) pics,price,saleprice FROM toys WHERE visible = 1 ORDER BY date DESC;";
	$sth = $dbh->prepare($sql);
	$sth->execute();
	$result = array();
	$result = $sth->fetchAll();
	foreach($result as $row) {		
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
	}
	
	echo "</div><hr><h2><a href='products.php?sale=y'>On Sale</a></h2><div class='row'>";

	$sql="SELECT TOP 4 item,title,iif(charindex(',', pics)=0,pics,left(pics,charindex(',', pics)-1)) pics,price,saleprice FROM toys WHERE saleprice IS NOT NULL AND visible = 1 ORDER BY NEWID();";
	$sth = $dbh->prepare($sql);
	$sth->execute();
	$result = array();
	$result = $sth->fetchAll();
	foreach($result as $row) {		
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
	}
	
	$dbh = null;
}
catch (PDOException $e) {
	echo "Error!: " . $e->getMessage();
	die();
}

?>

</div>    </div></div>
<?php include 'footer.php' ?>
</body>
</html>