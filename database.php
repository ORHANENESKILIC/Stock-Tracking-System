<?php
try{ 
$host='localhost'; $databasename='stock_tracking'; $user='root'; $pw=''; $db=new
PDO("mysql:host=$host;dbname=$databasename;charset=UTF8","$user",$pw);
}

catch(PDOException $e){
	print $e->getmessage();
}
?>