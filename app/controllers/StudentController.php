<?php
require_once(__DIR__ . '/../models/Subject.php');
require_once(__DIR__ . '/../models/Presentation.php');

class StudentController extends BaseController {
    private $subjectModel;
    private $presentationModel;

    public function __construct() {
        if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'student') {
            header('Location: /login');
            exit;
        }
        $this->subjectModel = new Subject();
        $this->presentationModel = new Presentation();
    }

    public function dashboard() {
        // Get statistics
        // $stats = [
        //     'suggestions_count' => $this->subjectModel->getStudentSuggestionsCount($_SESSION['user_id']),
        //     'upcoming_presentations' => $this->subjectModel->getUpcomingPresentationsCount($_SESSION['user_id']),
        //     'completed_presentations' => $this->subjectModel->getCompletedPresentationsCount($_SESSION['user_id'])
        // ];

        // Get recent suggestions
        $Suggestions = $this->subjectModel->getUsersSuggestions($_SESSION['user_id']);
        $presentations = $this->presentationModel->getUserPresentations($_SESSION['user_id']);
        $upcomingPresentations = $this->presentationModel->getUpcomingPresentations($_SESSION['user_id']);
        $pastPresentations = $this->presentationModel->getPastPresentations($_SESSION['user_id']);
        $countsuggest = $this->subjectModel->getloginUserSuggestions($_SESSION['user_id']);

        // Render dashboard view
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
