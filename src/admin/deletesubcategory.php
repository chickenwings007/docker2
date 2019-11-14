<?php
header('Content-type:application/json');

include 'connection.php';

$res=mysql_query("delete from tbl_subcategory where subcat_id='".$_REQUEST["did"]."'")or die (mysql_error());


if($res)
	{
 	echo '{"msg":"Success"}';
	}
	else
	{
	 echo '{"msg":"Error"}';
	}
?>

