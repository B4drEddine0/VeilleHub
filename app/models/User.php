<?php 
require_once(__DIR__.'/../config/db.php');

class User extends Db {

public function __construct()
{
    parent::__construct();
}

public function register($username, $password, $email, $role) {
        $stmt = $this->conn->prepare("INSERT INTO users (username, password, email, role) VALUES (?, ?, ?, ?)");
        if ($stmt->execute([$username, $password, $email, $role])) {
            return ['success' => true, 'user_id' => $this->conn->lastInsertId()];
        } else {
            return ['error' => 'Failed to create account'];
        }
}

public function login($userData){

        $result = $this->conn->prepare("SELECT * FROM users WHERE email=?");
        $result->execute([$userData[0]]);
        $user = $result->fetch(PDO::FETCH_ASSOC);

        if($user && password_verify($userData[1], $user["password"])){
           return  $user ;
        }
        return false;
}


public function getAllUsers(){
      
        $query = "SELECT * FROM users WHERE role <> 'teacher' "; 
        $resul = $this->conn->prepare($query);
        $resul->execute();
        
        $users = $resul->fetchAll(PDO::FETCH_ASSOC);
        return $users;
}

public function updateStatus($userId, $status) {
        $stmt = $this->conn->prepare("UPDATE users SET status = ? WHERE user_id = ?");
        return $stmt->execute([$status, $userId]);
}


}