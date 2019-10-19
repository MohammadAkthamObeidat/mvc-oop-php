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

if(isset($_POST['delete-btn'])){
    $isDeleted = $product->deleteProduct($_POST['delete-product']);
    if($isDeleted){
        $product->getAll();
        echo'Product Deleted.';
    }
}

if(isset($_POST['update-btn'])){

    header("Location: EditProduct.php?id=".$_POST['update-btn']);

}
?>
<div class="btu-cont">
    <a href="../products/CreateProduct.php">
        <button class="btn btn-success add-button"> Add New Product</button>
    </a>
</div>
<table class="table table-hover pr-table">
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

    foreach ($products as $item) {
        $id = $item->id;
        $name = $item->name;
        $description = $item->description;
        $price = $item->price;
        $created = $item->created;
        $modified = $item->modified;
        $category_id = $item->category;

        echo "
                      <tr>
                        <td>$id</td>
                        <td>$name</td>
                        <td>$description</td>
                        <td>$price</td>
                        <td>$created</td>
                        <td>$modified</td>
                        <td>$category_id</td>
                        <td>
                        <form action='' method='POST'> 
                                <input type='hidden' value='$id' name='update-product'/>
                                <a href='../products/EditProduct.php'>
                                    <button class='btn btn-primary' name='update-btn'>Edit</button>
                                </a>
                        </form>
                        </td>
                        <td>
                        <form action='' method='POST'>
                            <input type='hidden' value='$id' name='delete-product'/>
                            <button class='btn btn-danger' name='delete-btn'>Delete</button>
                        </form>
                        </td>
                        
                    </tr>
                    ";
    }
    ?>
    </tbody>
</table>

<?php include('../layout/footer.php'); ?>
</html>

