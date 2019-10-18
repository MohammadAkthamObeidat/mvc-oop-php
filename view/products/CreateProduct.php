<?php
include('../layout/header.php');
include('../../database/Database.php');
include('../../model/Product.php');
include('../../model/Category.php');

// Connect To Database.
$conn = new Database();
$connection = $conn->connect();

// Instance From Category Class.
$categories = new Category($connection);

$is_created_new_products = '';

// Check If 'POST' has data or not.
if (isset($_POST['add-product'])) {
    // Instance From Category Class.
    $product = new Product($connection);
    // Send Form Data To Product Class.
    $product->setName($_POST['name']);
    $product->setDescription($_POST['description']);
    $product->setPrice($_POST['price']);
    $product->setCategoryId($_POST['category']);

    $is_created_new_products = $product->create();

}
?>

<div class="container mt-3 w-75">
    <h2 class="text-muted text-center">Add product</h2>
    <?php
    if ($is_created_new_products != "") {
        if ($is_created_new_products) {
            echo "<div class='alert alert-success'>Product was created.</div>";
        } else {
            echo "<div class='alert alert-warning'>Unable to create a new product.</div>";
        }
    }
    ?>
    <form class="w-50 p-3 mx-auto" method="POST" action="<?php $_SERVER['PHP_SELF'] ?>">
        <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input name="name" type="text" class="form-control" id="exampleInputEmail1"
                   aria-describedby="emailHelp" placeholder="The Name Of Product">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Description</label>
            <input name="description" type="text" class="form-control"
                   id="exampleInputPassword1"
                   placeholder="Description Here">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Price</label>
            <input name="price" type="number" class="form-control" id="exampleInputPassword1"
                   placeholder="Here You Need To Enter The Price">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Category</label>
            <select name="category" id="">
                <?php
                foreach ($categories as $value) {
                    $id = $value['id'];
                    $name = $value['name'];

                    echo "<option value='$id' class='text-capitalize'>$name</option>";
                }
                ?>
            </select>
        </div>
        <button name="add-product" value="Login" type="submit" class="btn btn-primary">Submit
        </button>
    </form>
</div>


<?php

?>

<?php include('../layout/footer.php') ?>

