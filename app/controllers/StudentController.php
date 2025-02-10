<?php
require_once(__DIR__ . '/../models/Subject.php');
require_once(__DIR__ . '/../models/Presentation.php');
require_once(__DIR__ . '/../models/student.php');

class StudentController extends BaseController {
    private $subjectModel;
    private $presentationModel;
    private $studentModel;

    public function __construct() {
        if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'student') {
            header('Location: /login');
            exit;
        }
        $this->subjectModel = new Subject();
        $this->presentationModel = new Presentation();
    }

    public function dashboard() {
        $Suggestions = $this->studentModel->getUsersSuggestions($_SESSION['user_id']);
        $presentations = $this->presentationModel->getUserPresentations($_SESSION['user_id']);
        $upcomingPresentations = $this->presentationModel->getUpcomingPresentations($_SESSION['user_id']);
        $pastPresentations = $this->presentationModel->getPastPresentations($_SESSION['user_id']);
        $countsuggest = $this->studentModel->getloginUserSuggestions($_SESSION['user_id']);

        $this->render('student/dashboard',['Suggestions' => $Suggestions,'presentations' => $presentations, 'upcomingPresentations' => $upcomingPresentations, 'pastPresentations' => $pastPresentations, 'countsuggest' => $countsuggest]);
    }

    public function suggest() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = trim($_POST['title'] ?? '');
            
            if (empty($title)) {
                $_SESSION['error'] = 'Subject title is required';
                header('Location: /student/dashboard');
                exit();
            }

            $data = [
                'title' => $title,
                'id' => $_SESSION['user_id']
            ];

            if ($this->subjectModel->createSuggestion($data)) {
                $_SESSION['success'] = 'Subject suggestion submitted successfully';
            } else {
                $_SESSION['error'] = 'Failed to submit suggestion';
            }

            header('Location: /student/dashboard');
            exit();
        }
    }

}
