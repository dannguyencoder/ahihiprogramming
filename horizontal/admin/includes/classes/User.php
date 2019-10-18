<?php

class User {

    private $db;

    public $username;
    public $password;
    public $email;
    public $phone_number;
    public $full_name;
    public $title;
    public $avatar;
    public $description;


    public function __construct($db)
    {
        $this->db = $db;
    }

    public function get_all_users() {
        $sql = "SELECT * FROM users";

        return $this->db->query($sql)->fetchAll();
    }

    public function get_user_by_id($user_id) {
        $sql = "SELECT * FROM users WHERE id = $user_id";

        return $this->db->query($sql)->fetch();
    }

    public function add_user() {
        $sql = "INSERT INTO users(username, password, email, phone_number, full_name, title, avatar, description) VALUES ('$this->username', '$this->password', '$this->email', '$this->phone_number', '$this->full_name', '$this->title', '$this->avatar', '$this->description')";

        return $this->db->query($sql);
    }

    public function update_user($user_id) {
        $sql = "UPDATE users SET username = '$this->username', password = '$this->password', email = '$this->email', phone_number = '$this->phone_number', title = '$this->title', avatar = '$this->avatar', description = '$this->description' WHERE id = $user_id";

        return $this->db->query($sql);
    }

    public function delete_user($user_id) {
        $sql = "DELETE FROM users WHERE id = $user_id";

        return $this->db->query($sql);
    }

    public function getUserByUsernameAndPassword($username, $password) {
        $password = md5($password);

        $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";

        return $this->db->query($sql)->fetch();
    }


}


?>