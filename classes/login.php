<?php
class Login
{
    // Error is initially empty
    private $error = "";

    // Evaluating Data
    public function evaluate($data)
    {
        // addslashes avoids any injections
        $email = addslashes($data['email']);
        $password = addslashes($data['password']);

        // Check Email in the Database
        // LIMIT 1 ensures that only one record is returned
        $query = "SELECT * FROM users WHERE email = '$email' LIMIT 1";

        // Creates a new Database object
        $DB = new Database();

        // Read from the database
        $result = $DB->read($query);

        // Check if result is not empty
        if ($result) {
            // Get the first row
            $row = $result[0];

            // If password matches the input password
            if ($password == $row['password']) {
                // Create SESSION Data
                // SESSION Register user -> User no longer needs to login again
                $_SESSION['user_id'] = $row['user_id'];
            } else {
                // Output error message
                $this->error .= "Wrong Password<br>";
            }
        } else {
            // If email is not found in the database
            $this->error .= "No such email was found<br>";
        }

        // If inputted email/password is wrong, return the error
        return $this->error;
    }

    public function change_pass($data, $id)
    {
        // Check if the user ID exists in the database
        $query = "SELECT user_id FROM users WHERE user_id = '$id' LIMIT 1";

        $password = addslashes($data['password']);
        $password = addslashes($data['newpassword']);

        $DB = new Database();
        $result = $DB->read($query);

        $row = $result[0];
        if ($result) {
            if ($password == $row['password']) {
                $newpassword = $data['newpassword'];
                $query = "UPDATE users SET password = '$newpassword' WHERE user_id = '$id' LIMIT 1";
                $DB = new Database();
                $DB->save($query);
            } else {
                $this->error .= "Wrong Password<br>";
            }
        } else {
            return false;
        }
    }

    public function check_login($id)
    {
        // Check if the user ID exists in the database
        $query = "SELECT user_id FROM users WHERE user_id = '$id' LIMIT 1";

        $DB = new Database();
        $result = $DB->read($query);

        if ($result) {
            return true;
        }

        return false;
    }
}
