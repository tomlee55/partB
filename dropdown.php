
<?php
require 'db.php';
function selectDistinct ($tableName, $attributeName,$pulldownName, $defaultValue){
echo "dddd";

  @$conn = mysql_connect(DB_HOST, DB_USER, DB_PW);
    if(!$conn) exit;
    mysql_select_db(DB_NAME, $conn);


	$defaultSet = FALSE;
	// Query to find distinct values of $attributeName in $tableName
	$distinctQuery = "SELECT DISTINCT {$attributeName}
	      			  FROM {$tableName}  
	                  order by {$attributeName}";
	// Run the distinctQuery on the databaseName
	if (!($resultId = @ mysql_query ($distinctQuery, $connection)))
	showerror( );
	echo "\n<select name=\"{$pulldownName}\">";
print(	$resultId);
	while ($row = @ mysql_fetch_array($resultId))
	{
		$result = $row[$attributeName];
		if (isset($defaultvalue) && ($result == $defaultValue))
		echo "\n\t<option selected value=\"{$result}\">{$result}";
		else echo "\n\t<option value=\"{$result}\">{$result}";
		echo "</option>";
	}
	echo "\n</select>";
}
?>
