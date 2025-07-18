<?php
require_once '../config/database.php';
require_once '../models/Reminder.php';
session_start();

// Redirect non-admin users
if (!isset($_SESSION['auth']) || $_SESSION['role'] !== 'admin') {
    header('Location: /home');
    exit;
}

$reminderModel = new Reminder();
$allReminders = $reminderModel->get_all_reminders_with_users();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Reports</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
</head>
<body class="bg-gray-50">
    <?php include '../partials/nav.php'; ?>

    <div class="max-w-6xl mx-auto p-6">
        <h1 class="text-3xl font-bold mb-4">Admin Report: All Reminders</h1>

        <?php if (count($allReminders) > 0): ?>
            <div class="overflow-x-auto bg-white rounded-lg shadow-md">
                <table class="table w-full">
                    <thead class="bg-base-200">
                        <tr>
                            <th>User</th>
                            <th>Title</th>
                            <th>Message</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($allReminders as $reminder): ?>
                            <tr>
                                <td><?= htmlspecialchars($reminder['username']) ?></td>
                                <td><?= htmlspecialchars($reminder['title']) ?></td>
                                <td><?= htmlspecialchars($reminder['message']) ?></td>
                                <td><?= htmlspecialchars($reminder['date']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <p class="text-gray-500 mt-4">No reminders found.</p>
        <?php endif; ?>
    </div>
</body>
</html>
