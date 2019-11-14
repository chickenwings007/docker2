<?php 
 $cn=mysql_connect("localhost","root","") or die("Mysql not connected");
 mysql_select_db("db_mastermind",$cn) or die("Database Not Found") ;
 session_start();
?>