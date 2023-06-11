<?php
class Database
{

    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $db = "nicolas_db";
    
    
    function connect()
    {
        $connection = mysqli_connect($this->host, $this->username, $this->password, $this->db);
        return $connection;
    }
    
    // Read data from the database
    function read($query)
    {
        $conn = $this->connect();
        $result = mysqli_query($conn, $query);
        
        if (!$result) {
            return false;
        } else {
            $data = false;
            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
            }
            return $data;
        }
    }
    
    // Save data to the database
    function save($query)
    {
        $conn = $this->connect();
        $result = mysqli_query($conn, $query);

        if (!$result) {
            return false;
        } else {
            return true;
        }
    }
}
?>
