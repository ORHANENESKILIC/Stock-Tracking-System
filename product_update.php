<?php
include("database.php");
$id=$_GET["id"];
$sql=$db->prepare('select * from products where id= ?');
$sql->execute([$id]);
$products=$sql-> fetchAll(PDO::FETCH_OBJ);


?>

<?php error_reporting(0); $connect = @new mysqli('localhost', 'root', '', 'stock_tracking'); $connect->set_charset("utf8");

 if ($connect->connect_errno) 
 {
  die("Connection Failed: " . $connect->connect_error);
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Stock Tracking System</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/style.css">

</head>
<body>

<div class="header">
  <h1>Stock Tracking System</h1>
  <p>Stock Registration</p>
</div>

<div class="navbar">
  <a style="background-color: #1abc9c;">Stock Edit</a>
</div>

<div class="row">
  <div class="side">
 
            <table>
            <tr>
                <th>No</th>
                <th>Product Name</th>
                <th>Delete</th>
                
                
            </tr>
            <?php 
    foreach($products as $product){?>
			  
			<tr>
              <td><?= $product->id ?></td>
			  <td><?= $product->Product_Name ?></td>
              <td> 
              <a href="product_delete.php?id=<?php echo $product->id; ?>">
              <button style="background:#ff0000; width:80px; height:30px" >Delete</button></a>
              </td>
              <?php } ?>
            </table>
  </div>
  <div class="main">
    <div class="form-style-6">
        <h1 style="background-color:green;">Update: <?php echo $product->Product_Name ; ?></h1>
        <form action="" method="POST">
        <input type="text" id="Name" name="Name" value="<?php echo $product->Product_Name; ?>"/>
        <input type="text" id="Brand" name="Brand" value="<?php echo $product->Product_Brand; ?>"/>
        <input type="text" id="Price" name="Price" value="<?php echo $product->Product_Price; ?>₺" />
        <select id="Categorie" name="Categorie">
            <option value="Select Categorie"><?php echo $product->Product_Categorie; ?></option>
              <option value="Phone">Phone</option>
              <option value="Tablet">Tablet</option>
              <option value="PC">PC</option>
              <option value="Notebook ">Notebook </option>
            </select>
        <input type="text" id="Code" name="Code" value="<?php echo $product->Product_Code; ?>" />
        <input type="text" id="Stock" name="Stock" value="<?php echo $product->Product_Quantity;?>" />
        <input style="background-color:green;" type="submit" value="UPDATE" />
        </form>
        </div>
    </div>
</body>
</html>



<?php

$db = new PDO("mysql:host=localhost;dbname=stock_tracking;charset=utf8", "root", "");

$id = $_GET["id"];
$Name = $_POST['Name'];
$Brand = $_POST['Brand'];
$Price = $_POST['Price'];
$Categorie = $_POST['Categorie'];
$Code = $_POST['Code'];
$Stock = $_POST['Stock'];


if (!$Name || !$Brand || !$Price || !$Categorie || !$Code || !$Stock ) {
    die("there are empty fields !.");
}

$add = $db->prepare("UPDATE products SET Product_Name = ?, Product_Brand = ?, Product_Price = ?, Product_Categorie = ?, Product_Code = ?, Product_Quantity = ? where id= ?");
$add->execute([$Name, $Brand, $Price, $Categorie, $Code, $Stock, $id]);

if ($add) {
    echo '<script>alert("transaction successful")</script>';
    header("refresh:1; url=index.php");
}else {
    echo "there was a mistake :( ";
}

?>
