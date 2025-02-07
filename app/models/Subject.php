<?php
require_once(__DIR__.'/../config/db.php');
class Subject extends Db {

            public function __construct()
        {
            parent::__construct();
        }


    public function getAllSuggestions() {
        $query = "SELECT s.*,u.username FROM subjects s join users u on s.suggested_by = u.user_id WHERE s.status = 'pending'";
        return $this->conn->query($query)->fetchAll();
    }


    public function updateStatus($subjectId, $action) {
        $status = ($action === 'approve') ? 'approved' : 'declined';
        $query = $this->conn->prepare("UPDATE subjects SET status = ? WHERE sub_id = ?");
        return $query->execute([$status, $subjectId]);
    }

 
    public function schedulePresentation($data) {
        $query = "INSERT INTO presentations (subject_id, date_time) VALUES (?, ?)";
        $success = $this->conn->query($query, [$data['subject_id'], $data['date_time']]);
        
        if ($success) {
            $presentationId = $this->conn->lastInsertId();
            
            foreach ($data['presenters'] as $userId) {
                $query = "INSERT INTO presentation_presenters (presentation_id, user_id) VALUES (?, ?)";
                $this->conn->query($query, [$presentationId, $userId]);
            }
            
            return true;
        }
        
        return false;
    }
}
