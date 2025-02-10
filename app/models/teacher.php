<?php
require_once(__DIR__.'/../config/db.php');
class Teacher extends Db {

            public function __construct()
        {
            parent::__construct();
        }
    
        
        public function getAllUsers(){
            
            $query = "SELECT * FROM users WHERE role <> 'teacher' "; 
            $resul = $this->conn->prepare($query);
            $resul->execute();
            
            $users = $resul->fetchAll(PDO::FETCH_ASSOC);
            return $users;
        }

        public function getActiveUsers(){
        
        $query = "SELECT * FROM users WHERE status = 'active' and role <> 'teacher' "; 
        $resul = $this->conn->prepare($query);
        $resul->execute();

        $users = $resul->fetchAll(PDO::FETCH_ASSOC);
        return $users;
        }

        public function updateStatus($userId, $status) {
            $stmt = $this->conn->prepare("UPDATE users SET status = ? WHERE user_id = ?");
            return $stmt->execute([$status, $userId]);
        }
            
    }?>