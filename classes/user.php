<?php

class User
{
    //Retrieves user data by ID from the database.
    public function get_data($id)
    {
        $query = "SELECT * FROM users WHERE user_id = '$id' LIMIT 1";
        $DB = new Database();
        $result = $DB->read($query);

        if ($result) {
            $row = $result[0];
            return $row;
        } else {
            return false;
        }
    }

    //Retrieves a specific user by ID from the database.
    public function get_user($id)
    {
        $query = "SELECT * FROM users WHERE user_id = '$id' LIMIT 1";
        $DB = new Database();
        $result = $DB->read($query);

        if ($result) {
            return $result[0];
        } else {
            return false;
        }
    }

    //Retrieves a list of friends (excluding the given user) from the database.
    public function get_friends($id)
    {
        $query = "SELECT * FROM users WHERE user_id != '$id'";
        $DB = new Database();
        $result = $DB->read($query);

        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

    //Retrieves all users from the database.
    public function get_all($id)
    {
        $query = "SELECT * FROM users";
        $DB = new Database();
        $result = $DB->read($query);

        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

    //Retrieves the user ID.
    public function getId()
    {
        if (isset($this->user['user_id'])) {
            return $this->user['user_id'];
        } else {
            return null;
        }
    }

    public function updateUsername($id, $new_username)
    {
        $query = "UPDATE users SET username = '$new_username' WHERE user_id = '$id'";
    }
}

?>
