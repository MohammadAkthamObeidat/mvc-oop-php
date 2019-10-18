<!doctype html>
<html lang="en">
<?php
include('../layout/header.php');
include('../../database/Database.php');
include('../../model/Product.php');


// Connection To The Database.
$db = new Database();
$conn = $db->connect();

// Instance Of Product Class.
$product = new Product($conn);
$products = $product->getAll();
?>
<div class="btu-cont">
    <a href="../products/CreateProduct.php"><button class="btn btn-success add-button"> Add New Product</button></a>
</div>
<table  class="table table-hover pr-table">
    <thead>
    <tr>
        <th scope="col">Id</th>
        <th scope="col">Name</th>
        <th scope="col">Description</th>
        <th scope="col">Price</th>
        <th scope="col">Created</th>
        <th scope="col">Modified</th>
        <th scope="col">Category</th>
        <th scope="col">Edit</th>
        <th scope="col">Delete</th>
    </tr>
    </thead>
    <tbody>
    <?php

    foreach ($products as $row) {
        $id = $row->id;
        $name = $row->name;
        $description = $row->description;
        $price = $row->price;
        $created = $row->created;
        $modified = $row->modified;
        $category_id = $row->category;

        echo "
                      <tr>
                        <td>$id</td>
                        <td>$name</td>
                        <td>$description</td>
                        <td>$price</td>
                        <td>$created</td>
                        <td>$modified</td>
                        <td>$category_id</td>
                        <td><button class='btn btn-success'>Edit</button></td>
                        <td><button name='delete_product' class='btn btn-danger'>Delete</button></td>
                        
                    </tr>
                    ";
    }
    ?>
    </tbody>
</table>

<?php include('../layout/footer.php'); ?>
</html>

