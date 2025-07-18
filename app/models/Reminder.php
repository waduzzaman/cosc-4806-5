<?php

class Reminder {

    public function __construct() {
        // Optional initialization
    }
    // get all reminders
    public function get_all_reminders() {
        $db = db_connect();
        $stmt = $db->prepare("SELECT * FROM reminders");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // get one reminder by id

    public function get_reminder_by_id($id) {
        $db = db_connect();
        $statement = $db->prepare("SELECT * FROM reminders WHERE id = ?");
        $statement->execute([$id]);
        return $statement->fetch(PDO::FETCH_ASSOC);
    }
    public function create_reminder($subject, $user_id) {
        $db = db_connect();
        $stmt = $db->prepare("INSERT INTO reminders (subject, user_id) VALUES (?, ?)");

        if (!$stmt->execute([$subject, $user_id])) {
            print_r($stmt->errorInfo());
            die("Failed to insert reminder.");
        }
        return true;
    }

    
    // udpate reminder    
        public function update_reminder($id, $subject) {
            $db = db_connect();
            $stmt = $db->prepare("UPDATE reminders SET subject = ? WHERE id = ?");
            return $stmt->execute([$subject, $id]);
        }

    //  delete reminder 
        public function delete_reminder($id) {
            $db = db_connect();
            $stmt = $db->prepare("DELETE FROM reminders WHERE id = ?");
            return $stmt->execute([$id]);
        }

       // complete reminder m

        public function complete_reminder($id) {
            $db = db_connect();
            $stmt = $db->prepare("UPDATE reminders SET completed = 1 WHERE id = ?");
            return $stmt->execute([$id]);
        }

   // get all reminders with users

    public function get_all_reminders_with_users() {
        $db = db_connect();

        $sql = "SELECT reminders.*, users.username
                FROM reminders
                JOIN users ON reminders.user_id = users.id";

        $stmt = $db->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    //  get user with most reminders

        public function get_user_with_most_reminders() {
            $db = db_connect();
            $stmt = $db->prepare("
                SELECT u.username, COUNT(r.id) as reminder_count 
                FROM reminders r 
                JOIN users u ON r.user_id = u.id 
                GROUP BY u.username 
                ORDER BY reminder_count DESC 
                LIMIT 1
            ");
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

    // get login counts by user
        public function get_login_counts_by_user() {
            $db = db_connect();
            $stmt = $db->prepare("
                SELECT username, COUNT(*) as login_count 
                FROM logins 
                GROUP BY username
            ");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }



    

 
    


    
}


?>

