<?php
class Database
{
    private $host = '127.0.0.1';
    private $db_name = 'api_db';
    private $username = 'root';
    private $password = '123456';

    /**
     * PDO
     *
     * @return void
     */
    public function getConnection()
    {
        $this->connection = null;

        try{
            $this->connection = new PDO(
                'mysql:host=' . $this->host . ';dbname=' . $this->db_name,
                $this->username,
                $this->password
            );
        }catch(PDOException $exception){
            echo "DB connection error" . $exception->getMessage();
        }
        return $this->connection;

    }

}
?>