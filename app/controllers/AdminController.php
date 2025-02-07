<?php

class AdminController {
    private $userModel;
    private $subjectModel;

    public function __construct() {
        require_once '../app/models/User.php';
        require_once '../app/models/Subject.php';
        $this->userModel = new User();
        $this->subjectModel = new Subject();
    }

    public function dashboard() {
        $users = $this->userModel->getAllUsers();
        $subjects = $this->subjectModel->getAllSuggestions();
        $this->render('admin/dashboard', ['users' => $users, 'subjects' => $subjects]);
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