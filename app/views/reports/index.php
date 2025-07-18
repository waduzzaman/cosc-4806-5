<?php
// Optional debug (comment out in production)
// echo '<pre>'; print_r($allReminders); echo '</pre>';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Admin Reports</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdn.jsdelivr.net/npm/daisyui@5/dist/full.css" rel="stylesheet" />
</head>
<body class="bg-gray-50 min-h-screen p-6">

  <div class="max-w-7xl mx-auto">
    <h1 class="text-3xl font-bold mb-6 text-center text-indigo-700">Admin Reports</h1>

    <?php if (!empty($allReminders)): ?>
      <div class="overflow-x-auto shadow-lg rounded-lg border border-gray-200 bg-white">
        <table class="table w-full min-w-max table-auto">
          <thead class="bg-indigo-600 text-white">
            <tr>
              <th class="p-3 text-left">ID</th>
              <th class="p-3 text-left">Subject</th>
              <th class="p-3 text-left">Created At</th>
              <th class="p-3 text-left">User</th>
              <th class="p-3 text-left">Completed</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($allReminders as $reminder): ?>
              <tr class="border-b border-gray-200 hover:bg-indigo-50">
                <td class="p-3"><?= htmlspecialchars($reminder['id']) ?></td>
                <td class="p-3"><?= htmlspecialchars($reminder['subject']) ?></td>
                <td class="p-3"><?= htmlspecialchars($reminder['created_at']) ?></td>
                <td class="p-3"><?= htmlspecialchars($reminder['username']) ?></td>
                <td class="p-3">
                  <?php if ($reminder['completed']): ?>
                    <span class="badge badge-success">Yes</span>
                  <?php else: ?>
                    <span class="badge badge-warning">No</span>
                  <?php endif; ?>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    <?php else: ?>
      <p class="text-center text-gray-600 mt-12 text-lg">No reminders found.</p>
    <?php endif; ?>
  </div>

</body>
</html>
