<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

class Reminders extends Controller {

  // ✅ Protect routes
  private function requireLogin() {
    if (!isset($_SESSION['userid']) || !$_SESSION['auth']) {
      $_SESSION['flash_message'] = "You must be logged in to access that page.";
      $_SESSION['flash_color'] = "linear-gradient(to right, #ef4444, #b91c1c)";
      header('Location: /login');
      exit;
    }
  }

  public function index() {
    $this->requireLogin();

    $R = $this->model('Reminder');
    $reminders = $R->get_all_reminders();
    $this->view('reminders/index', ['reminders' => $reminders]);
  }

  public function create() {
    $this->requireLogin();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $subject = trim($_POST['subject'] ?? '');
      $user_id = $_SESSION['userid'] ?? null;

      if (!empty($subject) && !empty($user_id)) {
        $R = $this->model('Reminder');
        $success = $R->create_reminder($subject, $user_id);

        if ($success) {
          $_SESSION['flash_message'] = "Reminder created!";
          $_SESSION['flash_color'] = "linear-gradient(to right, #22c55e, #16a34a)";
        } else {
          $_SESSION['flash_message'] = "Failed to create reminder.";
          $_SESSION['flash_color'] = "linear-gradient(to right, #ef4444, #b91c1c)";
        }

        // header('Location: /reminders');
        // exit;

        header('Location: /reminders');echo '<script>window.location.href="/reminders";</script>'; 
        exit;

      }

      $_SESSION['flash_message'] = "Subject and User ID are required.";
      $_SESSION['flash_color'] = "linear-gradient(to right, #facc15, #f59e0b)";
    }

    $this->view('reminders/create');
  }

  public function update($id) {
    $this->requireLogin();

    $R = $this->model('Reminder');
    $reminder = $R->get_reminder_by_id($id);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $subject = trim($_POST['subject'] ?? '');

      if ($reminder['completed']) {
        $_SESSION['flash_message'] = "Cannot update a completed reminder.";
        $_SESSION['flash_color'] = "linear-gradient(to right, #facc15, #f59e0b)";
        header('Location: /reminders');
        exit;
      }

      if (!empty($subject)) {
        $R->update_reminder($id, $subject);
        $_SESSION['flash_message'] = "Reminder updated!";
        $_SESSION['flash_color'] = "linear-gradient(to right, #3b82f6, #2563eb)";
        // header('Location: /reminders');
        // exit;

        header('Location: /reminders');echo '<script>window.location.href="/reminders";</script>'; 
        exit;
      }

      $_SESSION['flash_message'] = "Subject cannot be empty.";
      $_SESSION['flash_color'] = "linear-gradient(to right, #facc15, #f59e0b)";
    }

    $this->view('reminders/update', ['reminder' => $reminder]);
  }

  public function delete($id) {
    $this->requireLogin();

    $R = $this->model('Reminder');
    $R->delete_reminder($id);

    $_SESSION['flash_message'] = "Reminder deleted!";
    $_SESSION['flash_color'] = "linear-gradient(to right, #f87171, #ef4444)";
    // header('Location: /reminders');
    // exit;
    header('Location: /reminders');echo '<script>window.location.href="/reminders";</script>'; 
    exit;
  }

  public function complete($id) {
    $this->requireLogin();

    $R = $this->model('Reminder');
    $R->complete_reminder($id);

    $_SESSION['flash_message'] = "Reminder marked as completed!";
    $_SESSION['flash_color'] = "linear-gradient(to right, #22c55e, #16a34a)";
    // header('Location: /reminders');
    header('Location: /reminders');echo '<script>window.location.href="/reminders";</script>'; 
    exit;
    exit;
  }
// helper function to check if the user is an admin
  private function requireAdmin() {
      if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
          $_SESSION['flash_message'] = "Admins only.";
          $_SESSION['flash_color'] = "linear-gradient(to right, #ef4444, #b91c1c)";
          header('Location: /reminders');
          exit;
      }
  }


  public function reports() {
    $this->requireLogin();

    $R = $this->model('Reminder');
    $grouped = $R->get_reminders_with_usernames();

    $this->view('reminders/reports', ['grouped' => $grouped]);
  }
}
