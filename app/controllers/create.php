<?php

class Create extends Controller {

    public function index() {		
        $this->view('create/index');
    }

    public function store() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = trim($_POST['username']);
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];

            // Check if passwords match
            if ($password !== $confirm_password) {
                $data['error'] = "Passwords do not match.";
                return $this->view('create/index', $data);
            }

            // Check if username already exists
            $db = db_connect();
            $stmt = $db->prepare("SELECT * FROM users WHERE username = :username");
            $stmt->bindValue(':username', strtolower($username));
            $stmt->execute();
            $existingUser = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($existingUser) {
                $data['error'] = "Username already taken.";
                return $this->view('create/index', $data);
            }

            // Hash password and insert
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $insert = $db->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
            $insert->bindValue(':username', strtolower($username));
            $insert->bindValue(':password', $hashed_password);

            if ($insert->execute()) {
                header("Location: /login");
                exit;
            } else {
                $data['error'] = "Error creating account. Try again.";
                return $this->view('create/index', $data);
            }
        } else {
            header("Location: /create");
            exit;
        }
    }
}
