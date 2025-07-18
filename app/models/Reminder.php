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

    // public function get_all_reminders_with_users() {
    //     $db = db_connect();
    //     $stmt = $db->prepare("
    //         SELECT reminders.*, users.username 
    //         FROM reminders 
    //         JOIN users ON reminders.user_id = users.id
    //         ORDER BY reminders.date DESC
    //     ");
    //     $stmt->execute();
    //     return $stmt->fetchAll(PDO::FETCH_ASSOC);
    // }

    public function get_all_reminders_with_users() {
        $db = db_connect();
        $sql = "SELECT reminders.*, users.name AS user_name 
                FROM reminders 
                JOIN users ON reminders.user_id = users.id";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    

 
    


    
}


?>

