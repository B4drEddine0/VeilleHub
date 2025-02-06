<?php
require_once(__DIR__.'/../config/db.php');

class Subject extends Db {
    protected $conn;

    public function __construct()
    {
        parent::__construct();
    }

    public function createSuggestion($suggestion) {
        try {
            $stmt = $this->conn->prepare("
                INSERT INTO subject_suggestions (title, description, category, student_id, status, created_at)
                VALUES (?, ?, ?, ?, ?, NOW())
            ");

            return $stmt->execute([
                $suggestion['title'],
                $suggestion['description'],
                $suggestion['category'],
                $suggestion['student_id'],
                $suggestion['status']
            ]);
        } catch (PDOException $e) {
            error_log("Error creating subject suggestion: " . $e->getMessage());
            return false;
        }
    }

    public function getStudentSuggestionsCount($studentId) {
        try {
            $stmt = $this->conn->prepare("
                SELECT COUNT(*) FROM subject_suggestions
                WHERE student_id = ?
            ");
            $stmt->execute([$studentId]);
            return $stmt->fetchColumn();
        } catch (PDOException $e) {
            error_log("Error getting student suggestions count: " . $e->getMessage());
            return 0;
        }
    }

    public function getUpcomingPresentationsCount($studentId) {
        try {
            $stmt = $this->conn->prepare("
                SELECT COUNT(*) FROM presentations
                WHERE student_id = ? AND presentation_date > NOW()
            ");
            $stmt->execute([$studentId]);
            return $stmt->fetchColumn();
        } catch (PDOException $e) {
            error_log("Error getting upcoming presentations count: " . $e->getMessage());
            return 0;
        }
    }

    public function getCompletedPresentationsCount($studentId) {
        try {
            $stmt = $this->conn->prepare("
                SELECT COUNT(*) FROM presentations
                WHERE student_id = ? AND presentation_date <= NOW()
            ");
            $stmt->execute([$studentId]);
            return $stmt->fetchColumn();
        } catch (PDOException $e) {
            error_log("Error getting completed presentations count: " . $e->getMessage());
            return 0;
        }
    }

    public function getRecentSuggestions($studentId) {
        try {
            $stmt = $this->conn->prepare("
                SELECT title, description, status, created_at
                FROM subject_suggestions
                WHERE student_id = ?
                ORDER BY created_at DESC
                LIMIT 5
            ");
            $stmt->execute([$studentId]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error getting recent suggestions: " . $e->getMessage());
            return [];
        }
    }

    public function getStudentPresentations($studentId) {
        try {
            $stmt = $this->conn->prepare("
                SELECT p.*, s.title as subject_title, s.description as subject_description
                FROM presentations p
                JOIN subjects s ON p.subject_id = s.id
                WHERE p.student_id = ?
                ORDER BY p.presentation_date DESC
            ");
            $stmt->execute([$studentId]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error getting student presentations: " . $e->getMessage());
            return [];
        }
    }
}
