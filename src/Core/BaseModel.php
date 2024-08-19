<?php
namespace Core;

use PDO;
use PDOException;

class BaseModel
{
    protected $table;
    protected $db;

    public function __construct()
    {
        $this->db = $this->connect();
    }
    private function connect()
    {
        $config = require __DIR__ . '/../config/config.php';

        $host = $config['database']['host'];
        $port = $config['database']['port'];
        $dbname = $config['database']['dbname'];
        $username = $config['database']['username'];
        $password = $config['database']['password'];
        $charset = $config['database']['charset'];

        $dsn = "mysql:host=$host;port=$port;dbname=$dbname;charset=$charset";
        try {
            $pdo = new PDO($dsn, $username, $password, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ]);
        } catch (PDOException $e) {
            die('Database connection failed: ' . $e->getMessage());
        }
        try {
            $config = require __DIR__ . '/../config/config.php';
            $dsn = "mysql:host=" . $host . ";dbname=" . $dbname;
            $pdo = new PDO($dsn, $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            die("Database connection failed: " . $e->getMessage());
        }
    }
    public function getAll()
    {
        $stmt = $this->db->prepare("SELECT * FROM " . $this->table);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function findById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM " . $this->table . " WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function save($data)
    {
        $columns = implode(", ", array_keys($data));
        $values = ":" . implode(", :", array_keys($data));

        $sql = "INSERT INTO " . $this->table . " ($columns) VALUES ($values)";
        $stmt = $this->db->prepare($sql);

        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }
        return $stmt->execute();
    }
    public function update($id, $data)
    {
        $set = "";
        foreach ($data as $key => $value) {
            $set .= "$key = :$key, ";
        }
        $set = rtrim($set, ", ");

        $sql = "UPDATE " . $this->table . " SET $set WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id);

        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }

        return $stmt->execute();
    }
    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM " . $this->table . " WHERE id = :id");
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
    // Untuk Form login
    public function getUserByUsername($username, $a) {
        $veal = $a;
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE $veal = :user");
        $stmt->bindParam(':user', $username);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}