<?php

$db = new PDO("mysql:host=localhost;dbname=stock_tracking;charset=utf8", "root", "");


$Name = $_POST['Name'];
$Brand = $_POST['Brand'];
$Price = $_POST['Price'];
$Categorie = $_POST['Categorie'];
$Code = $_POST['Code'];
$Stock = $_POST['Stock'];


if (!$Name || !$Brand || !$Price || !$Categorie || !$Code || !$Stock) {
    die("there are empty fields !");
}

$add = $db->prepare("INSERT INTO products SET Product_Name = ?, Product_Brand = ?, Product_Price = ?, Product_Categorie = ?, Product_Code = ?, Product_Quantity = ?");
$add->execute([$Name, $Brand, $Price, $Categorie, $Code, $Stock]);

if ($add) {
    echo '<script>alert("transaction successful")</script>';
    header("refresh:1; url=index.php");
}else {
    echo "there was a mistake :( ";
}

?>
