<?php
require_once(__DIR__ . '/../models/Subject.php');

class StudentController extends BaseController {
    private $subjectModel;

    public function __construct() {
        // if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'student') {
        //     header('Location: /login');
        //     exit;
        // }
        $this->subjectModel = new Subject();
    }

    public function dashboard() {
        // Get statistics
        // $stats = [
        //     'suggestions_count' => $this->subjectModel->getStudentSuggestionsCount($_SESSION['user_id']),
        //     'upcoming_presentations' => $this->subjectModel->getUpcomingPresentationsCount($_SESSION['user_id']),
        //     'completed_presentations' => $this->subjectModel->getCompletedPresentationsCount($_SESSION['user_id'])
        // ];

        // Get recent suggestions
        // $recentSuggestions = $this->subjectModel->getRecentSuggestions($_SESSION['user_id']);

        // Render dashboard view
        $this->render('student/dashboard');
    }

    public function suggest() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405);
            echo json_encode(['success' => false, 'error' => 'Method not allowed']);
            exit;
        }

        // Validate input
        $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
        $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
        $category = filter_input(INPUT_POST, 'category', FILTER_SANITIZE_STRING);

        if (empty($title) || empty($description) || empty($category)) {
            http_response_code(422);
            echo json_encode(['success' => false, 'error' => 'All fields are required']);
            exit;
        }

        // Validate category
        $validCategories = ['web', 'mobile', 'ai', 'data', 'security', 'cloud'];
        if (!in_array($category, $validCategories)) {
            http_response_code(422);
            echo json_encode(['success' => false, 'error' => 'Invalid category']);
            exit;
        }

        try {
            $suggestion = [
                'title' => $title,
                'description' => $description,
                'category' => $category,
                'student_id' => $_SESSION['user_id'],
                'status' => 'pending'
            ];

            $result = $this->subjectModel->createSuggestion($suggestion);

            if ($result) {
                echo json_encode([
                    'success' => true,
                    'message' => 'Subject suggestion submitted successfully'
                ]);
            } else {
                throw new Exception('Failed to create suggestion');
            }
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode([
                'success' => false,
                'error' => 'An error occurred while submitting your suggestion'
            ]);
        }
    }

    public function presentations() {
        // Get all presentations for the student
        $presentations = $this->subjectModel->getStudentPresentations($_SESSION['user_id']);

        // Render presentations view
        $this->render('student/presentations', [
            'presentations' => $presentations
        ]);
    }
}
