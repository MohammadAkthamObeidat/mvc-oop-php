<?php


class Database
{
    private $servername = 'localhost';
    private $username = 'root';
    private $password = "";
    private $dbname = "store";

    public function connect()
    {
        // Data Source Domain To Connect The Database.
        $dsn = 'mysql:host=' . $this->servername . ';dbname=' . $this->dbname;

        try {
            $conn = new PDO($dsn, $this->username, $this->password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo "Connected successfully";
            return $conn;
        } catch (PDOException $exception) {
            echo "Connection failed: " . $exception->getMessage();
        }
    }
}