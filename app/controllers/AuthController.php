<?php 
require_once (__DIR__.'/../models/User.php');

class AuthController extends BaseController {
    private $UserModel;
    
    public function __construct() {
        $this->UserModel = new User();
    }

    public function showRegister() {
        $this->render('auth/register');
    }

    public function showleLogin() {
        $this->render('auth/login');
    }
    
    public function handleRegister() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $errors = [];

            if (empty($username)) {
                $errors['username'] = 'Username is required';
            }

            if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = 'Valid email is required';
            }

            if (strlen($password) < 8) {
                $errors['password'] = 'Password must be at least 8 characters';
            }

            if ($password !== $password_confirm) {
                $errors['password_confirm'] = 'Passwords do not match';
            }

            if (!in_array($role, ['student', 'teacher'])) {
                $errors['role'] = 'Invalid role selected';
            }

            if (empty($errors)) {
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                $user = [
                    $username,
                    $hashed_password,
                    $email,
                    $role
                ];

                    $userId = $this->UserModel->register($user);
                    if ($userId) {
                        $_SESSION['user_id'] = $userId;
                        $_SESSION['user_role'] = $role;
                        $_SESSION['username'] = $username;

                       header('location: login');
                        exit;
                    }
            }
        }
    }

    public function handleLogin() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $errors = [];
            
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
            $password = $_POST['password'] ?? '';

            if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = 'Valid email is required';
            }

            if (empty($password)) {
                $errors['password'] = 'Password is required';
            }

            if (empty($errors)) {
                    $user = $this->UserModel->login([$email, $password]);
                    if ($user) {
                        $_SESSION['user_id'] = $user['id'];
                        $_SESSION['user_role'] = $user['role'];
                        $_SESSION['username'] = $user['nom_utilisateur'];
                        header('Location: /student/dashboard');

        }}}
    }

    public function logout() {
        session_destroy();
        header('Location: /login');
        exit;
    }
}