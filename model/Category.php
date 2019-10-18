<?php


class Category
{
    private $connection;
    private $name;
    private $created;


    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getCreated()
    {
        return $this->created;
    }

    private function setCreated()
    {
        $date = new DateTime('2000-1-1');
        $dateTime = $date->format('y-m-d H:i:s');
        $this->created = $dateTime;
    }

    // Add New Category.
    public function createCategory()
    {
        $this->setCreated();

        $sql = "INSERT INTO categories (name, created)
                VALUES ('$this->name', '$this->created')";

        if ($this->connection->exec($sql)) {
            echo "New Record Added";
        } else {
            echo "No Record Added";
        }

    }

    // Fetch All Categories From The Database.
    public function getAll()
    {
        $query = $this->connection->prepare("SELECT id, name, modified, created FROM categories");
        $query->execute();

        $result = $query->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    // Update Specific Category.
    public function updateCategory()
    {

    }

    // Delete Specific Category.
    public function deleteCategory()
    {

    }
}