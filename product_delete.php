<?php
$servername = "localhost";
$username = "root";
$pw = "";
$dbname = "stock_tracking";

try {
    $cn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $pw);
    $cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "DELETE FROM products WHERE id='" . $_GET["id"] . "'";
    $cn->exec($sql);
    echo '<script>alert("transaction successful...")</script>';
    header("refresh:1; url=index.php");
    }
catch(PDOException $e)
    {
    echo $sql . "
" . $e->getMessage();
    }

$cn = null;
?>