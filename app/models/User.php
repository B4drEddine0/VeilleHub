<?php 
require_once(__DIR__.'/../config/db.php');

class User extends Db {

public function __construct()
{
    parent::__construct();
}

public function register($user) {
   
    try {
        $checkEmail = $this->conn->prepare("SELECT user_id FROM users WHERE email = ?");
        $checkEmail->execute([$user[2]]);
        if ($checkEmail->fetch()) {
            throw new Exception('Email already exists');
        }

        // Check if username already exists
        $checkUsername = $this->conn->prepare("SELECT user_id FROM users WHERE username = ?");
        $checkUsername->execute([$user[0]]);
        if ($checkUsername->fetch()) {
            throw new Exception('Username already exists');
        }

        // Prepare and execute the insertion query
        $result = $this->conn->prepare("INSERT INTO users (username, password, email, role) VALUES (?, ?, ?, ?)");
        $result->execute($user);
        return $this->conn->lastInsertId();
        
       
    } catch (PDOException $e) {
        throw new Exception($e->getMessage());
    }
}

public function login($userData){
    
    try {
        $result = $this->conn->prepare("SELECT * FROM users WHERE email=?");
        $result->execute([$userData[0]]);
        $user = $result->fetch(PDO::FETCH_ASSOC);

        if($user && password_verify($userData[1], $user["password"])){
           

           return  $user ;
        
        }
        return false;
    } catch (PDOException $e) {
        throw new Exception($e->getMessage());
    }
}

public function storeRememberToken($userId, $token) {
    try {
        $result = $this->conn->prepare("UPDATE users SET remember_token = ? WHERE user_id = ?");
        return $result->execute([$token, $userId]);
    } catch (PDOException $e) {
        throw new Exception($e->getMessage());
    }
}

public function getUserByRememberToken($token) {
    try {
        $result = $this->conn->prepare("SELECT * FROM users WHERE remember_token = ?");
        $result->execute([$token]);
        return $result->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        throw new Exception($e->getMessage());
    }
}

public function getStatistics() {
    try {
        $statistics = [];

        // Total number of users
        $query = $this->conn->prepare("SELECT COUNT(*) AS total_users FROM users");
        $query->execute();
        $statistics['total_users'] = $query->fetch(PDO::FETCH_ASSOC)['total_users'];

        // Users by role
        $query = $this->conn->prepare("SELECT role, COUNT(*) as count FROM users GROUP BY role");
        $query->execute();
        $statistics['users_by_role'] = $query->fetchAll(PDO::FETCH_ASSOC);

        return $statistics;
    } catch (PDOException $e) {
        throw new Exception($e->getMessage());
    }
}

public function getAllUsers($filter, $userToSearch =''){
    try {
      
        $query = "SELECT * FROM users WHERE role != 1"; 
        
        // add filter to query
        if ($filter == 'clients') {
            $query .= " AND role = 2";
        } elseif ($filter == 'freelancers') {
            $query .= " AND role = 3";
        }
        
        // add search condition to query
        if ($userToSearch) {
            $query .= " AND username LIKE ?";
        }
        
        $resul = $this->conn->prepare($query);
        $resul->execute($userToSearch ? ["%$userToSearch%"] : []);
        
        // Fetch and return results
        $users = $resul->fetchAll(PDO::FETCH_ASSOC);
        return $users;
   

    } catch (PDOException $e) {
        throw new Exception($e->getMessage());
    }
}

}