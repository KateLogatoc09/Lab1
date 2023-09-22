<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Store</title>
</head>
<body>
    <center><h1>Store Inventory</h1></center>
    <form action="/save" method="post">
        <input type="hidden" name="id" value="<?php if (isset($pro['id'])) {echo $pro['id'];}?>">
        <label>Product Name</label>
        <input type="text" name="ProductName" value="<?php if (isset($pro['ProductName'])) {echo $pro['ProductName'];}?>"><br><br>
        <label>Product Description</label>
        <input type="text" name="ProductDescription" value="<?php if (isset($pro['ProductDescription'])) {echo $pro['ProductDescription'];}?>"><br><br>

        <label for="ProductCategory">Product Category</label>
        <select name="ProductCategory" id="ProductCategory">
        <option value="">Select a category</option>
        <?php $uniqueCategories = array(); 
             foreach ($category as $pr) {$category = $pr['ProductCategory'];
             if (!in_array($category, $uniqueCategories)) {$uniqueCategories[] = $category; 
             echo '<option value="' . $category . '">' . $category . '</option>';}}?> </select><br><br>

        <label>Product Quantity</label>
        <input type="number" name="ProductQuantity" value="<?php if (isset($pro['ProductQuantity'])) {echo $pro['ProductQuantity'];}?>"><br><br>
        <label>Product Price</label>
        <input type="number" name="ProductPrice" value="<?php if (isset($pro['ProductPrice'])) {echo $pro['ProductPrice'];}?>"><br><br>
        <input type="submit" value="insert"><br>
    </form>
    
    <h1>List of Products</h1>
            <ul>
                <?php foreach($product as $pr): ?>
                    <li>
                        <strong>Product Name:</strong> <?= $pr['ProductName'] ?><br>
                        <strong>Product Description:</strong> <?= $pr['ProductDescription'] ?><br>
                        <strong>Product Category:</strong> <?= $pr['ProductCategory'] ?><br>
                        <strong>Product Quantity:</strong> <?= $pr['ProductQuantity'] ?><br>
                        <strong>Product Price:</strong> <?= $pr['ProductPrice'] ?><br>
                        <strong>Action:</strong>
                        <a href="/delete/<?= $pr['id'] ?>">Delete</a> | <a href="/edit/<?= $pr['id'] ?>">Edit</a>
                    </li>
                <?php endforeach;?>
            </ul>

</body>
</html>