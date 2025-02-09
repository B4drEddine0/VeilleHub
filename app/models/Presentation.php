<?php
require_once(__DIR__.'/../config/db.php');

class Presentation extends Db{

    public function __construct() {
        parent::__construct();
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


    public function getAllPresentations() {
            $query = "SELECT p.*, s.title as subject_title, 
                      GROUP_CONCAT(u.username SEPARATOR ', ') as presenters
                      FROM presentations p
                      JOIN subjects s ON p.subject_id = s.sub_id
                      JOIN presentation_participants pp ON p.present_id = pp.presentation_id
                      JOIN users u ON pp.user_id = u.user_id
                      GROUP BY p.present_id
                      ORDER BY p.presentation_date";
            
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            $presentationResults = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return array_map(function($presentation) {
                return [
                    'id' => $presentation['present_id'],
                    'title' => $presentation['subject_title'],
                    'date' => date('Y-m-d', strtotime($presentation['presentation_date'])),
                    'presenters' => $presentation['presenters'],
                    'time' => date('H:i', strtotime($presentation['presentation_date'])),
                    'status' => $presentation['status']
                ];
            }, $presentationResults);
    }

    public function deletePresentations($id){
        $query = "delete from presentations where present_id = ?" ;
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$id]);
    }

    public function updatePresentationStatus($status, $presentation_id){
        $query = "UPDATE presentations SET status = ? WHERE present_id = ?";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$status, $presentation_id]);
    }



    public function getUserPresentations($id) {
        $query = "SELECT p.*, s.title as subject_title, 
                  GROUP_CONCAT(u.username SEPARATOR ', ') as presenters
                  FROM presentations p
                  JOIN subjects s ON p.subject_id = s.sub_id
                  JOIN presentation_participants pp1 ON p.present_id = pp1.presentation_id
                  JOIN presentation_participants pp2 ON p.present_id = pp2.presentation_id
                  JOIN users u ON pp2.user_id = u.user_id
                  WHERE pp1.user_id = ?
                  GROUP BY p.present_id
                  ORDER BY p.presentation_date";
        
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$id]);
        $presentationResults = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return array_map(function($presentation) {
            return [
                'id' => $presentation['present_id'],
                'title' => $presentation['subject_title'],
                'date' => date('Y-m-d', strtotime($presentation['presentation_date'])),
                'presenters' => $presentation['presenters'],
                'time' => date('H:i', strtotime($presentation['presentation_date'])),
                'status' => $presentation['status']
            ];
        }, $presentationResults);
    }


    public function getUpcomingPresentations($studentId) {
        $sql = "SELECT p.*, s.title as subject_title, GROUP_CONCAT(u.username SEPARATOR ', ') as presenters
                FROM presentations p
                JOIN subjects s ON p.subject_id = s.sub_id
                JOIN presentation_participants pp ON p.present_id = pp.presentation_id
                JOIN users u ON pp.user_id = u.user_id
                WHERE p.presentation_date >= CURDATE()

                AND (pp.user_id = :student_id OR p.present_id IN (
                    SELECT presentation_id 
                    FROM presentation_participants 
                    WHERE user_id = :student_id
                ))
                GROUP BY p.present_id
                ORDER BY p.presentation_date ASC";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':student_id' => $studentId]);
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

public function getPastPresentations($studentId) {
        $sql = "SELECT p.*, s.title as subject_title, GROUP_CONCAT(u.username SEPARATOR ', ') as presenters
                FROM presentations p
                JOIN subjects s ON p.subject_id = s.sub_id
                JOIN presentation_participants pp ON p.present_id = pp.presentation_id
                JOIN users u ON pp.user_id = u.user_id
                WHERE p.presentation_date < CURDATE()

                AND (pp.user_id = :student_id OR p.present_id IN (
                    SELECT presentation_id 
                    FROM presentation_participants 
                    WHERE user_id = :student_id
                ))
                GROUP BY p.present_id
                ORDER BY p.presentation_date DESC";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':student_id' => $studentId]);
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
} 