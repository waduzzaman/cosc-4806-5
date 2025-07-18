<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


class Reports extends Controller {

    private function requireAdmin() {
        if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
            $_SESSION['flash_message'] = "Admins only.";
            $_SESSION['flash_color'] = "linear-gradient(to right, #ef4444, #b91c1c)";
            header('Location: /reminders');
            exit;
        }
    }

    public function index() {
        $this->requireAdmin();

        $R = $this->model('Reminder');
        $allReminders = $R->get_all_reminders_with_users();

        // check whether the data is getting from the db:
        // echo "<pre>"; print_r($allReminders); echo "</pre>"; exit;

        $this->view('reports/index', ['allReminders' => $allReminders]);
    }

}

