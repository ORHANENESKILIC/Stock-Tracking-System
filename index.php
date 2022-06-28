<?php
include("database.php");

$sql=$db->prepare('select * from products');
$sql->execute();
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
  <a href="index.php" style="background-color: #1abc9c;">Stock Registration</a>
  <a href="products_information.php">Product Information</a>
</div>

<div class="row">
  <div class="side">
    <h2>Entered Records</h2>
            <table>
            <tr>
                <th>ID</th>
                <th>Product Name</th>
                <th>Edit</th>
                
            </tr>
            <?php 
    foreach($products as $product){?>
			  
			<tr>
        <td><?= $product->id ?></td>
			  <td><?= $product->Product_Name ?></td>
              <td> 
              <a href="product_update.php?id=<?php echo $product->id; ?>"> 
              <button style="background:#e55609; width:80px; height:30px">Edit</button></a></td>
              <?php } ?>
            </table>
  </div>
  <div class="main">
    <div class="form-style-6">
        <h1>ADD Product</h1>
        <form action="product_save.php" method="POST">
        <input type="text" id="Name" name="Name" placeholder="Product Name"/>
        <input type="text" id="Brand" name="Brand" placeholder="Product Brand"/>
        <input type="text" id="Price" name="Price" placeholder="Price (₺)" />
        <select id="Categorie" name="Categorie">
            <option value="Select Categorie">Select Categorie</option>
              <option value="Phone">Phone</option>
              <option value="Tablet">Tablet</option>
              <option value="PC">PC</option>
              <option value="Notebook ">Notebook </option>
            </select>
        <input type="text" id="Code" name="Code" placeholder="Product Code (123456)" />
        <input type="text" id="Stock" name="Stock" placeholder="Product Stock Quantity" />
        <input type="submit" value="ADD" />
        </form>
        </div>
    </div>
</body>
</html>
