<?php

class AdminController {
    private $userModel;
    private $subjectModel;
    private $db;

    public function __construct() {
        require_once '../app/models/User.php';
        require_once '../app/models/Subject.php';
        $this->userModel = new User();
        $this->subjectModel = new Subject();
        $this->db = new PDO('mysql:host=localhost;dbname=veillehub', 'root', '');
    }

    public function dashboard() {
        try {
            // Get presentations from database using your existing table structure
            $query = "SELECT p.*, s.title as subject_title, 
                      GROUP_CONCAT(u.username SEPARATOR ', ') as presenters
                      FROM presentations p
                      JOIN subjects s ON p.subject_id = s.sub_id
                      JOIN presentation_participants pp ON p.present_id = pp.presentation_id
                      JOIN users u ON pp.user_id = u.user_id
                      GROUP BY p.present_id
                      ORDER BY p.presentation_date";
            
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            $presentationResults = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Format presentations for the calendar
            $presentations = array_map(function($presentation) {
                return [
                    'title' => $presentation['subject_title'],
                    'date' => date('Y-m-d', strtotime($presentation['presentation_date'])),
                    'presenters' => $presentation['presenters'],
                    'time' => date('H:i', strtotime($presentation['presentation_date'])),
                    'status' => $presentation['status']
                ];
            }, $presentationResults);

        } catch (PDOException $e) {
            // If there's an error or no presentations, initialize empty array
            $presentations = [];
        }

        $users = $this->userModel->getAllUsers();
        $subjects = $this->subjectModel->getPendingSuggestions();
        $subjectss = $this->subjectModel->getAllSuggestions();

        // Pass data to view
        $data = [
            'presentations' => $presentations,
            'users' => $users,
            'subjects' => $subjects,
            'subjectss' => $subjectss
        ];

        $this->render('admin/dashboard', $data);
    }

    public function updateUserStatus() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $userId = $_POST['user_id'];
            $newStatus = $_POST['status'];
            
            $this->userModel->updateStatus($userId, $newStatus);
            
            $_SESSION['message'] = "User status updated successfully";
            header("Location: /admin/dashboard");
            exit();
        }
    }

    public function handleSubject() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $subjectId = $_POST['subject_id'];
            $action = $_POST['action'];
            
            $this->subjectModel->updateStatus($subjectId, $action);
            
            $_SESSION['message'] = "Subject " . ucfirst($action) . "d successfully";
            header("Location: /admin/dashboard");
            exit();
        }
    }

    public function schedulePresentation() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'subject_id' => $_POST['subject_id'],
                'presenters' => $_POST['presenters'],
                'date_time' => $_POST['date_time']
            ];
            
            $this->subjectModel->schedulePresentation($data);
            
            $_SESSION['message'] = "Presentation scheduled successfully";
            header("Location: /admin/dashboard");
            exit();
        }
    }

    private function render($view, $data = []) {
        // Extract data to make it available in the view
        extract($data);
        
        // Include the view file
        require_once "../app/views/$view.php";
    }
}