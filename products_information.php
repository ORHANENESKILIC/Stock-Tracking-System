<?php
include("database.php");

$sql=$db->prepare('select * from products');
$sql->execute();
$products=$sql-> fetchAll(PDO::FETCH_OBJ);


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
  <p>Products Information</p>
</div>

<div class="navbar">
  <a href="index.php" >Stock Registration</a>
  <a href="products_information.php" style="background-color: #1abc9c;">Product Information</a>
</div>

<div class="row">
  <div class="side">
    <h2>ALL PRODUCTS</h2>
            <table>
            <tr>
                <th>NO</th>
                <th>Product Name</th>
                <th>Brand </th>
                <th>Price (₺)</th>
                <th>Categorie</th>
                <th>Code</th>
                <th>Stock</th>
                
            </tr>
            <?php 
    foreach($products as $product){?>
			  
			<tr>
        <td><?= $product->id ?></td>
			  <td><?= $product->Product_Name ?></td>
              <td><?= $product->Product_Brand?></td>
              <td><?= $product->Product_Price ?></td>
              <td><?= $product->Product_Categorie ?></td>
              <td><?= $product->Product_Code ?></td>
              <td><?= $product->Product_Quantity ?></td>
              <?php } ?>
              
            </table>
  </div>
  
</body>
</html>
