<?php
require_once(__DIR__.'/../config/db.php');
class Subject extends Db {

            public function __construct()
        {
            parent::__construct();
        }


    public function getPendingSuggestions() {
        $query = "SELECT s.*,u.username FROM subjects s join users u on s.suggested_by = u.user_id WHERE s.status = 'pending'";
        return $this->conn->query($query)->fetchAll();
    }

    public function getAllSuggestions() {
        $query = "SELECT * from subjects WHERE status = 'approved' and sub_id not in (select subject_id from presentations)";
        return $this->conn->query($query)->fetchAll();
    }

    public function updateStatus($subjectId, $action) {
        $status = ($action === 'approve') ? 'approved' : 'declined';
        $query = $this->conn->prepare("UPDATE subjects SET status = ? WHERE sub_id = ?");
        return $query->execute([$status, $subjectId]);
    }

    public function createSuggestion($data) {
        $sql = "INSERT INTO subjects (title, suggested_by) VALUES (:title, :id)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            'title' => $data['title'],
            'id' => $data['id']
        ]);

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
 
    
}
