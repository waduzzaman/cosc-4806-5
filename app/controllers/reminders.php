<?php

class Reminders extends Controller {
  public function index() {
    $R = $this->model('Reminder');
    $list_of_reminders = $R->get_all_reminders();
    $this->view('reminders/index',['reminders' => $list_of_reminders]);
  }

  // create reminder  
  public function create() {
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $subject = trim($_POST['subject']);
      $user_id = $_SESSION['userid']; 

      if (!empty($subject)) {
          $db = db_connect();
          $stmt = $db->prepare("INSERT INTO reminders (subject, user_id) VALUES     (:subject, :user_id)");
          $stmt->bindValue(':subject', $subject);
          $stmt->bindValue(':user_id', $user_id);
          $stmt->execute();
        $_SESSION['flash_message'] = "Reminder created!";
        $_SESSION['flash_color'] = "linear-gradient(to right, #22c55e, #16a34a)"; 
          header('Location: /reminders');
          exit;
      }
  }
    $this->view('reminders/create');
  }
  // update reminder

  public function update($id) {
      $R = $this->model('Reminder');

      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
          $subject = trim($_POST['subject']);
          $reminder = $R->get_reminder_by_id($id);
          // prevent update if already completed
          if ($reminder['completed']) {
              $_SESSION['flash_message'] = "Cannot update a completed reminder.";
              $_SESSION['flash_color'] = "linear-gradient(to right, #facc15, #f59e0b)"; 
            echo '<script>window.location.href="/reminders";</script>'; 
              exit;
          }
          $R->update_reminder($id, $subject);
          $_SESSION['flash_message'] = "Reminder updated successfully!";
          $_SESSION['flash_color'] = "linear-gradient(to right, #3b82f6, #2563eb)";
          header('Location: /reminders');echo '<script>window.location.href="/reminders";</script>'; 
          exit;
      }
      $reminder = $R->get_reminder_by_id($id);
      $this->view('reminders/update', ['reminder' => $reminder]);
  }

  // delete reminder 
  public function delete($id) {
    $R = $this->model('Reminder');
    $R->delete_reminder($id);
    // header('Location: /reminders');    
     $_SESSION['flash_message'] = "Reminder Deleted!";
    $_SESSION['flash_color'] = "linear-gradient(to right, #f87171, #ef4444)"; 
    echo '<script>window.location.href="/reminders";</script>';
    exit;  
  }

  // complete reminder
  public function complete($id) {
    $R = $this->model('Reminder');
    $R->complete_reminder($id);
    // header('Location: /reminders');
    $_SESSION['flash_message'] = "Task completed!";
     echo '<script>window.location.href="/reminders";</script>';
    exit;
  }

  
  
}
