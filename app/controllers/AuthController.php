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

    public function showLogin() {
        $this->render('auth/login');
    }
    
    public function handleRegister() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                $username = $_POST['username'];
                $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $email = $_POST['email'];
                $role = $_POST['role'] ?? 'student'; 

                if (empty($username) || empty($password) || empty($email)) {
                    $_SESSION['error'] = 'All fields are required';
                    header('Location: /register');
                    exit();
                }

                $result = $this->UserModel->register($username, $password, $email, $role);

                if (isset($result['error'])) {
                    $_SESSION['error'] = $result['error'];
                    header('Location: /register');
                    exit();
                }

                $_SESSION['success'] = 'Account created successfully! Please login.';
                header('Location: /register');
                exit();
        }
        
        $this->render('auth/register');
    }

    public function handleLogin() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $errors = [];
            
            $email =  $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';

            if (empty($email)) {
                $errors['email'] = 'email is required';
            }

            if (empty($password)) {
                $errors['password'] = 'Password is required';
            }

            if (empty($errors)) {
                    $user = $this->UserModel->login([$email, $password]);
                    if ($user) {
                        $_SESSION['user_id'] = $user['user_id'];
                        $_SESSION['user_role'] = $user['role'];
                        $_SESSION['username'] = $user['username'];

                        if($_SESSION['user_role'] === 'student'){
                            header('Location: /student/dashboard');
                        }elseif($_SESSION['user_role'] === 'teacher'){
                            header('Location: /admin/dashboard');
                        }
                        

        }}}
    }

    public function logout() {
        session_destroy();
        header('Location: /login');
        exit;
    }
}