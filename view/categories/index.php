<!doctype html>
<html lang="en">
<?php
include('../layout/header.php');
include('../../model/Category.php');
include('../../database/Database.php');

$connection = new Database();
$category = new Category($connection->connect());

?>
<div class="btu-cont">
    <a href="../categories/AddCategory.php">
        <button class="btn btn-success add-button"> Add New Category</button>
    </a>
</div>
<table class="table table-hover pr-table">
    <thead>
    <tr>
        <th scope="col">id</th>
        <th scope="col">name</th>
        <th scope="col">modified</th>
        <th scope="col">created</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($category->getAll() as $row) {
        echo "
                <tr>
                    <td>$row->id</td>
                    <td>$row->name</td>
                    <td>$row->modified</td>
                    <td>$row->created</td>
                    <td><button class='btn btn-success'>Edit</button>ess</td>
                    <td><button class='btn btn-danger'>Delete</button>ess</td>
                </tr>";
    }
    ?>
    </tbody>
</table>

<?php include('../layout/footer.php'); ?>
</html>

