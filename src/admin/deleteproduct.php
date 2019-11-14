<?php
header('Content-type:application/json');

include 'connection.php';

$res=mysql_query("delete from tbl_products where product_id='".$_REQUEST["did"]."'")or die (mysql_error());


if($res)
	{
 	echo '{"msg":"Success"}';
	}
	else
	{
	 echo '{"msg":"Error"}';
	}
?>

