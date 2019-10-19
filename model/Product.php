<?php


class Product
{
    private $connection;
    private $name;
    private $description;
    private $price;
    private $category_id;
    private $created;


    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function getCategoryId()
    {
        return $this->category_id;
    }

    public function setCategoryId($category_id)
    {
        $this->category_id = $category_id;
    }

    public function getCreated()
    {
        return $this->created;
    }

    public function setCreated($created)
    {
        $this->created = $created;
    }

    public function getName()
    {
        return $this->name;
    }


    public function setName($name)
    {
        $this->name = $name;
    }


    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }


    public function getPrice()
    {
        return $this->price;
    }


    public function setPrice($price)
    {
        $this->price = $price;
    }

    // Method To Format The Date & Time.
    private function setCreate()
    {
        $date = new DateTime('2000-1-1');
        $dateTime = $date->format('y-m-d H:i:s');
        $this->created = $dateTime;
    }

    // Insert New Data In Database.
    function create()
    {
        $this->setCreate();

        $sql = "INSERT INTO products(name, price, description, created, category_id)
                VALUES ('$this->name', '$this->price', '$this->description', '$this->created', '$this->category_id')";

        if ($this->connection->exec($sql)) {
            echo "New Record Added";
        } else {
            echo "No Record Added";
        }
    }

    //Fetch All Products From Database.
    public function getAll()
    {
        $sql = "select products.*, categories.name as category from products inner join categories on products.category_id = categories.id";
        $query = $this->connection->prepare($sql);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    //Update Specific Product.
    public function updateProduct($id)
    {
        $query = "UPDATE products
                    SET
                        name = '$this->name',
                        description = '$this->description',
                        price = '$this->price',
                        category_id = '$this->category_id',
                    WHERE id = '$id'";

        $result = $this->connection->exec($query);
        return $result;
    }

    //Delete Specific Product From Database.
    public function deleteProduct($id)
    {
        // sql to delete a record
        $query = "DELETE FROM products WHERE id = '$id'";
        $result = $this->connection->exec($query);
        return $result;
    }

}