<?php
$db_host = 'localhost';
$db_name = 'Skitia';
$db_username = 'root';
$db_password = 'Vulpesune2!';

$dsn = "mysql:host=$db_host;dbname=$db_name"; 

try{
$db_connection = new PDO($dsn, $db_username, $db_password);
}
catch (Exception $e){echo "There was a failure - " . $e->getMessage();}

$username = "Skitia";
  $password = "Vulpesune2!";
$date = date('Y-m-d');
$sql = "SELECT * FROM User WHERE  username =:username";
$statement = $db_connection->prepare($sql);
$statement->bindValue(':username', $username);
$statement->execute();
while( $row = $statement->fetch()) {
	if(password_verify($password,$row['password']))
  {
    echo "Yay";
  }
  else {
    echo "NANI?!";
  }
  
}
/*
$sql=$db_connection->prepare("INSERT into User (username, password, last_modified) values (:username, :password, :date)");
$sql->bindParam(":username",$username);
$sql->bindParam(":password",$hash);    
$sql->bindParam("date",$date);
$sql->execute();
*/