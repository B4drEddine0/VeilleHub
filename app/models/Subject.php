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
        $query = "SELECT s.*,u.username FROM subjects s join users u on s.suggested_by = u.user_id";
        return $this->conn->query($query)->fetchAll();
    }

    public function updateStatus($subjectId, $action) {
        $status = ($action === 'approve') ? 'approved' : 'declined';
        $query = $this->conn->prepare("UPDATE subjects SET status = ? WHERE sub_id = ?");
        return $query->execute([$status, $subjectId]);
    }

 
    public function schedulePresentation($data) {
            $stmt = $this->conn->prepare("INSERT INTO presentations (subject_id, presentation_date) VALUES (:subject_id, :date_time)");
            $stmt->execute([
                ':subject_id' => $data['subject_id'],
                ':date_time' => $data['date_time']
            ]);
            
            $presentation_id = $this->conn->lastInsertId();
            
            $stmt = $this->conn->prepare("INSERT INTO presentation_participants (presentation_id, user_id) VALUES (:presentation_id, :user_id)");
            
            foreach ($data['presenters'] as $presenter_id) {
                $stmt->execute([
                    ':presentation_id' => $presentation_id,
                    ':user_id' => $presenter_id
                ]);
            }
            return true;
    }
}
