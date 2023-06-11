<?php

class Signup
{   
    private $error = "";
    public function evaluate($data)
    {
        // Check each Data/Key
        // Sets Data/Key into Value
        foreach ($data as $key => $value) {
            // If Data/Key Doesn't have value
            if(empty($value))
            {
                $this->error = $this->error . $key . " is empty!<br>";
            }

            // Checks Data/Key value of Email
            if ($key == "email")
            {
                // If Value is incorrect/invalid
                if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$value)) {
                    $this->error = $this->error . $key . "Invalid email!<br>";
                }
            }

            // Checks Data/Key value of First Name
            if ($key == "names")
            {
                // If Value in the beginning have a number
                if (is_numeric($value)) {
                    $this->error = $this->error . $key . "First name cant have a number<br>";
                }
                // If Value in the beginning have a space " "
                if (strstr($value, " ")) {
                    $this->error = $this->error . $key . "First name cant have a space<br>";
                }
            }
        }
        // Post the Value into the Database
        if($this->error == "")
        {
            // no error
            $this->create_user($data);
        }else
        {
            return $this->error;
        }
    }
    public function create_user($data)
    {
        // Sets Data/Key Value
        $name = ucfirst($data['name']);
        $email = $data['email'];
        $password = $data['password'];
        
        $profile_image = 'upload/iftikhar.png';

        // Auto Integrated
        $url_address = strtolower($name);
        $user_id  = $this->create_user_id ();

        // Inserts Value to Database
        $query = "INSERT INTO users 
        (user_id , name, email, password, url_address, profile_image) 
        VALUES 
        ('$user_id ', '$name', '$email', '$password', '$url_address', '$profile_image')";

        $DB = new Database();
        $DB->save($query);
    }
    private function create_user_id ()
    {
        // Creates Unique user ID
        $length = rand(4, 19);
        $number = "";
        for ($i=0; $i < $length; $i++)
        {
            $new_rand = rand(0,9);
            $number = $number . $new_rand;
        }
        return $number;
    }
}
?>