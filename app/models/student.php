<?php
require_once(__DIR__.'/../config/db.php');
class Student extends Db {

            public function __construct()
        {
            parent::__construct();
        }

        public function getUsersSuggestions() {
            $stmt = $this->conn->prepare("SELECT s.*,u.username FROM subjects s join users u on s.suggested_by = u.user_id");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    
        public function getloginUserSuggestions($id) {
            $stmt = $this->conn->prepare("SELECT s.*,u.username FROM subjects s join users u on s.suggested_by = u.user_id where u.user_id = ?");
            $stmt->execute([$id]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }


    }?>