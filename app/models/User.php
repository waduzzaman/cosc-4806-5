<?php

class User {

    public $username;
    public $password;
    public $auth = false;

    public function __construct() {
        // Optional initialization
    }

    public function test() {
        $db = db_connect();
        $statement = $db->prepare("SELECT * FROM users;");
        $statement->execute();
        $rows = $statement->fetch(PDO::FETCH_ASSOC);
        return $rows;
    }

    // public function authenticate($username, $password) {
    //     $username = strtolower($username);
    //     $db = db_connect();

    //     // Check if user is locked out (3 or more bad attempts within last 60 seconds)
    //     $lockout_check = $db->prepare("
    //         SELECT COUNT(*) AS failed_count, MAX(attempt_time) AS last_attempt
    //         FROM login_attempts
    //         WHERE username = :username AND attempt = 'bad' AND attempt_time > (NOW() - INTERVAL 60 SECOND)
    //     ");
    //     $lockout_check->bindValue(':username', $username);
    //     $lockout_check->execute();
    //     $result = $lockout_check->fetch(PDO::FETCH_ASSOC);

    //     if ($result['failed_count'] >= 3) {
    //         $last_attempt_time = strtotime($result['last_attempt']);
    //         $lockout_end_time = $last_attempt_time + 60;
    //         $current_time = time();

    //         if ($current_time < $lockout_end_time) {
    //             // User locked out: set session message and redirect
    //             $_SESSION['lockout'] = "Too many failed attempts. Please wait " . ($lockout_end_time - $current_time) . " seconds.";
    //             header('Location: /login');
    //             die;
    //         }
    //     }

    //     // Fetch user record
    //     $statement = $db->prepare("SELECT * FROM users WHERE username = :name;");
    //     $statement->bindValue(':name', $username);
    //     $statement->execute();
    //     $user = $statement->fetch(PDO::FETCH_ASSOC);

    //     // Verify password and log attempt
    //     if ($user && password_verify($password, $user['password'])) {
    //         // Successful login: log good attempt
    //         $log = $db->prepare("INSERT INTO login_attempts (username, attempt) VALUES (:username, 'good')");
    //         $log->bindValue(':username', $username);
    //         $log->execute();

    //         $_SESSION['auth'] = 1;
    //         $_SESSION['username'] = ucwords($username);
    //         $_SESSION['userid'] = $rows['userid'];
    //         unset($_SESSION['failedAuth']);
    //         unset($_SESSION['lockout']);
    //         header('Location: /home');
    //         die;
    //     } else {
    //         // Failed login: log bad attempt
    //         $log = $db->prepare("INSERT INTO login_attempts (username, attempt) VALUES (:username, 'bad')");
    //         $log->bindValue(':username', $username);
    //         $log->execute();

    //         if (isset($_SESSION['failedAuth'])) {
    //             $_SESSION['failedAuth']++;
    //         } else {
    //             $_SESSION['failedAuth'] = 1;
    //         }

    //         header('Location: /login');
    //         die;
    //     }
    // }
    public function authenticate($username, $password) {
        $username = strtolower($username);
        $db = db_connect();

        // 🔒 Check lockout
        $lockout_check = $db->prepare("
            SELECT COUNT(*) AS failed_count, MAX(attempt_time) AS last_attempt
            FROM login_attempts
            WHERE username = :username AND attempt = 'bad' AND attempt_time > (NOW() - INTERVAL 60 SECOND)
        ");
        $lockout_check->bindValue(':username', $username);
        $lockout_check->execute();
        $result = $lockout_check->fetch(PDO::FETCH_ASSOC);

        if ($result['failed_count'] >= 3) {
            $last_attempt_time = strtotime($result['last_attempt']);
            $lockout_end_time = $last_attempt_time + 60;
            $current_time = time();

            if ($current_time < $lockout_end_time) {
                $_SESSION['lockout'] = "Too many failed attempts. Please wait " . ($lockout_end_time - $current_time) . " seconds.";
                $_SESSION['toast_error'] = $_SESSION['lockout'];
                header('Location: /login');
                exit;
            }
        }

        // ✅ Verify user
        $statement = $db->prepare("SELECT * FROM users WHERE username = :name;");
        $statement->bindValue(':name', $username);
        $statement->execute();
        $user = $statement->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            // 🎉 Good login
            $log = $db->prepare("INSERT INTO login_attempts (username, attempt) VALUES (:username, 'good')");
            $log->bindValue(':username', $username);
            $log->execute();

            $_SESSION['auth'] = 1;
            $_SESSION['username'] = ucwords($username);
            $_SESSION['userid'] = $user['id']; 
            // add role to session
            $_SESSION['role'] = $user['role'];


            unset($_SESSION['failedAuth'], $_SESSION['lockout']);
            $_SESSION['toast_success'] = "Welcome back, " . ucwords($username) . "!";

            header('Location: /home');
            exit;
        } else {
            // ❌ Bad login
            $log = $db->prepare("INSERT INTO login_attempts (username, attempt) VALUES (:username, 'bad')");
            $log->bindValue(':username', $username);
            $log->execute();

            $_SESSION['failedAuth'] = ($_SESSION['failedAuth'] ?? 0) + 1;
            $_SESSION['toast_error'] = "Invalid username or password.";

            header('Location: /login');
            exit;
        }
    }

    // method to check if user is authenticated
    public function isAuthenticated() {
        return isset($_SESSION['auth']) && $_SESSION['auth'] === 1;
    }
}
