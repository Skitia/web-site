<?php 
$ini = parse_ini_file('database.ini');
$db=mysqli_connect($ini['db_host'],$ini['db_username'],$ini['db_password'],$ini['db_name']);
