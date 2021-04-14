<?php
class Movie
{
    private $connection;
    private $db_name = 'movies';

    public $id;
    public $name;
    public $favorite;

    /**
     * __construct function
     */
    public function __construct($db)
    {
        $this->connection = $db;
    }

    /**
     * List of movies
     */
    public function list()
    {
        $query = 'select * from ' . $this->db_name;
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    /**
     * List of favorite movies
     */
    public function listByFavorite()
    {
        $query = 'select * from ' . $this->db_name . ' WHERE favorite=true';
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    /**
     * Specific movie detail 
     */
    public function getDetailByID()
    {
        $query = 'select * from ' . $this->db_name . ' WHERE id=?';
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(1, $this->id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->name = $row['name'];
        $this->favorite = $row['favorite'];
    }
}
?>