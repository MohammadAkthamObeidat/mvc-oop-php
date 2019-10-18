<?php
include('../layout/header.php');
include('../../database/Database.php');
include('../../model/Product.php');
include('../../model/Category.php');

// Connect To Database.
$conn = new Database();
$connection = $conn->connect();

// Instance From Category Class.
$category = new Category($connection);

// Check If 'POST' has data or not.
$has_created_new_category = "";

if (isset($_POST['add-category'])) {
    $category->setName($_POST['name']);
    $has_created_new_category = $category->createCategory();
}
?>
<div class="container mt-3 w-75">
    <h2 class="text-muted text-center">Create Category</h2>
    <?php
    if($has_created_new_category != "") {
        if($has_created_new_category) {
            echo "<div class=\"alert alert-success\">Category added successfully</div>";
        } else {
            echo "<div class=\"alert alert-warning\">Unable to create a category</div>";
        }
    }
    ?>
    <form method="POST">
        <div class="form-group">
            <label for="name">Name</label>
            <input name="name" type="name" class="form-control" id="name" aria-describedby="name"
                   placeholder="Enter name">
        </div>
        <button name="add-category" type="submit" class="btn btn-primary">Add Category</button>
    </form>
</div>


<?php

?>

<?php include('../layout/footer.php') ?>

