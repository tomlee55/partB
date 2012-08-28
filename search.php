<?php
		require 'db.php';
    @$conn = mysql_connect(DB_HOST, DB_USER, DB_PW);
    if(!$conn) exit;
    mysql_select_db(DB_NAME, $conn);

	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>WineStore</title>

<style type="text/css">
h1{text-align:center}
</style>
<meta name="keywords" content="" />
</head>
<body>

<h1>Wine Store Searching</h1>

<form action="result.php" method="GET">
<table border="5" cellspadding="20" align="center">

     <tr>
         <td>Wine Name:</td>
         <td><input type="text" name="winename" /></td>
     </tr>
     <tr>
         <td>Winery Name:</td>
         <td><input type="text" name="wineryname" /></td>
     </tr>
     <tr>
         <td>Region Name:</td>
         <td><select name="regionname">
		 <?php $distinctQuery = "SELECT DISTINCT * FROM region order BY region_name ";

	$result=mysql_query($distinctQuery,$conn);
	while ($row=mysql_fetch_array($result)){ ?>
	       <option value="<?php
			echo $row ['region_name'];
			?>"><?php
			echo $row ['region_name'];
			?></option>
<?php
		}
		?>
	</select></td>
     </tr>
	 <tr>
		<td>Grape Variety:</td>
		<td><select name="grapevariety">
			 <?php $distinctQuery = "SELECT DISTINCT * FROM grape_variety order BY variety ";

	$result=mysql_query($distinctQuery,$conn);
	while ($row=mysql_fetch_array($result)){ ?>
	       <option value="<?php
			echo $row ['variety'];
			?>"><?php
			echo $row ['variety'];
			?></option>
<?php
		}
		?></select></td>
	</tr>
     <tr>
         <td>Start year:</td>
         <td><select name="startyear">
		 		 <?php 

 $distinctQuery = "SELECT DISTINCT year FROM wine order BY year";

	$result=mysql_query($distinctQuery,$conn);
	while ($row=mysql_fetch_array($result)){ ?>
	       <option value="<?php
			echo $row ['year'];
			?>"><?php
			echo $row ['year'];
			?></option>
<?php
		}
		?></select></select></td>
     </tr>
     <tr>
         <td>End Year:</td>
         <td><select name="endyear">
		 		 <?php 

 $distinctQuery = "SELECT DISTINCT year FROM wine order BY year ";

	$result=mysql_query($distinctQuery,$conn);
	while ($row=mysql_fetch_array($result)){ ?>
	       <option value="<?php
			echo $row ['year'];
			?>"><?php
			echo $row ['year'];
			?></option>
<?php
		}
		?></select></td>
     </tr>
     <tr>
         <td>Minimum Wine In Stock:</td>
         <td><input type="text" name="minimumstock" /></td>
     </tr>
	 <tr>
		<td>Minimum Wine in Ordered:</td>
		<td><input type="text" name="minimumInOrder"></td>
	 </tr>
     <tr>
         <td>Minimum Cost:</td>
         <td><input type="text" name="minimumcost" /></td>
     </tr>
     <tr>
         <td>Maximum Cost:</td>
         <td><input type="text" name="maximumcost" /></td>
     </tr>
     <tr>
         <td><input type="submit" name="submit" value="submit" /></td>
     </tr>

</table></form>
</body>
</html>
