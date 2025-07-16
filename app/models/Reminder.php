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
        // create reminder
            // public function create_reminder($subject, $user_id) {
            // $db = db_connect();
            // $stmt = $db->prepare("INSERT INTO reminders (subject, user_id) VALUES (?,                ?)");
            // return $stmt->execute([$subject, $user_id]);
            // }

    public function create_reminder($subject, $user_id) {
        $db = db_connect();
        $stmt = $db->prepare("INSERT INTO reminders (subject, user_id) VALUES (:subject, :user_id)");
        $stmt->bindValue(':subject', $subject);
        $stmt->bindValue(':user_id', $user_id);
        return $stmt->execute();
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
        
    

 
    


    
}


?>

