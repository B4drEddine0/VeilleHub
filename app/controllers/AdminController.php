<?php

class AdminController extends BaseController {
    private $userModel;
    private $subjectModel;
    private $presentationModel;
    private $teacherModel;
    private $db;

    public function __construct() {
        require_once '../app/models/User.php';
        require_once '../app/models/Subject.php';
        require_once '../app/models/Presentation.php';
        require_once '../app/models/teacher.php';
        $this->userModel = new User();
        $this->subjectModel = new Subject();
        $this->presentationModel = new Presentation();
        $this->teacherModel = new Teacher();
        $this->db = new PDO('mysql:host=localhost;dbname=veillehub', 'root', '');
    }

    public function dashboard() {
        $presentations = $this->presentationModel->getAllPresentations();
        $users = $this->teacherModel->getAllUsers();
        $active = $this->teacherModel->getActiveUsers();
        $subjects = $this->subjectModel->getPendingSuggestions();
        $subjectss = $this->subjectModel->getAllSuggestions();

        $data = [
            'presentations' => $presentations,
            'users' => $users,
            'subjects' => $subjects,
            'subjectss' => $subjectss,
            'active' => $active
        ];

        $this->render('admin/dashboard', $data);
    }

    public function updateUserStatus() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $userId = $_POST['user_id'];
            $newStatus = $_POST['status'];
            
            $this->teacherModel->updateStatus($userId, $newStatus);
            
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
            
            $_SESSION['message'] = "Subject " . $action . "d successfully";
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
            
            $this->presentationModel->schedulePresentation($data);
            
            $_SESSION['message'] = "Presentation scheduled successfully";
            header("Location: /admin/dashboard");
            exit();
        }
    }

    public function deletePresentation() {
        if (!isset($_POST['presentation_id'])) {
            $_SESSION['error'] = 'Invalid presentation ID';
            header('Location: /admin/dashboard');
            return;
        }

        $presentationId = $_POST['presentation_id'];
        $success = $this->presentationModel->deletePresentations($presentationId);
         if ($success) {
            $_SESSION['message'] = 'Presentation deleted successfully';
            } else {
                  $_SESSION['error'] = 'Failed to delete presentation';
            }
            
            header('Location: /admin/dashboard');
            exit();
    }

    public function updatePresentationStatus() {
        if (!isset($_POST['presentation_id']) || !isset($_POST['status'])) {
            $_SESSION['message'] = "Invalid request";
            header('Location: /admin/dashboard');
            return;
        }

        $presentation_id = $_POST['presentation_id'];
        $status = $_POST['status'];

        $success = $this->presentationModel->updatePresentationStatus($status,$presentation_id);
         if ($success) {
            $_SESSION['message'] = 'Presentation status updated successfully';
            } else {
                  $_SESSION['error'] = 'Error updating presentation status';
            }

        header('Location: /admin/dashboard');
    }
}