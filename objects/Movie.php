<?php
class Movie
{
    private $connection;
    private $tb_name = 'movies';

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
    public function list($keyword)
    {
        $query = 'select * from ' . $this->tb_name;
        // search by name 
        if (!empty($keyword)) {
            $keyword = '%'.$keyword.'%';
            $query = $query . ' where name like :keyword';
            $stmt = $this->connection->prepare($query);
            $stmt->bindParam(':keyword', $keyword, PDO::PARAM_STR);
        } else {
            $stmt = $this->connection->prepare($query);
        }
        $stmt->execute();
        return $stmt;
    }

    /**
     * List of favorite movies
     */
    public function listByFavorite()
    {
        $query = 'select * from ' . $this->tb_name . ' WHERE favorite=true';
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    /**
     * Specific movie detail 
     */
    public function getDetailByID()
    {
        $query = 'select * from ' . $this->tb_name . ' WHERE id=?';
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(1, $this->id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->name = $row['name'];
        $this->favorite = $row['favorite'];
    }

    /**
     * Add favorite movie 
     *
     * @return void
     */
    public function addFavorite()
    {
        $query = 'update ' . $this->tb_name . ' set favorite=true where id=?';
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(1, $this->id);
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}

?>