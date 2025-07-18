<?php require_once 'app/views/templates/header.php' ?>

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

  <div class="max-w-7xl mx-auto p-6 bg-white shadow rounded mt-8">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">📊 Admin Reports Dashboard</h1>

    <!-- Who has the most reminders -->
    <div class="mb-8">
      <h2 class="text-xl font-semibold text-blue-700 mb-2">Top User by Reminders</h2>
      <?php if (!empty($topUser)): ?>
        <p class="text-gray-700">
          <strong class="text-blue-600"><?= htmlspecialchars($topUser['username']) ?></strong>
          has the most reminders (<?= $topUser['reminder_count'] ?>)
        </p>
      <?php else: ?>
        <p class="text-red-500">No reminders found.</p>
      <?php endif; ?>
    </div>

    <!-- Total logins by user -->
    <div class="mb-8">
      <h2 class="text-xl font-semibold text-green-700 mb-2">Total Logins by User</h2>
      <?php if (!empty($loginCounts)): ?>
        <div class="overflow-x-auto">
          <table class="min-w-full table-auto border border-gray-200">
            <thead class="bg-gray-100">
              <tr>
                <th class="px-4 py-2 text-left">Username</th>
                <th class="px-4 py-2 text-left">Login Count</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($loginCounts as $row): ?>
                <tr class="border-t">
                  <td class="px-4 py-2"><?= htmlspecialchars($row['username']) ?></td>
                  <td class="px-4 py-2"><?= htmlspecialchars($row['login_count']) ?></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      <?php else: ?>
        <p class="text-red-500">No login data found.</p>
      <?php endif; ?>
    </div>

    <!-- All Reminders -->
    <div class="mb-8">
      <h2 class="text-xl font-semibold text-purple-700 mb-2">All Reminders</h2>
      <?php if (!empty($allReminders)): ?>
        <div class="overflow-x-auto">
          <table class="min-w-full table-auto border border-gray-200">
            <thead class="bg-gray-100">
              <tr>
                <th class="px-4 py-2">ID</th>
                <th class="px-4 py-2">Subject</th>
                <th class="px-4 py-2">Created At</th>
                <th class="px-4 py-2">User</th>
                <th class="px-4 py-2">Completed</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($allReminders as $reminder): ?>
                <tr class="border-t">
                  <td class="px-4 py-2"><?= htmlspecialchars($reminder['id']) ?></td>
                  <td class="px-4 py-2"><?= htmlspecialchars($reminder['subject']) ?></td>
                  <td class="px-4 py-2"><?= htmlspecialchars($reminder['created_at']) ?></td>
                  <td class="px-4 py-2"><?= htmlspecialchars($reminder['username']) ?></td>
                  <td class="px-4 py-2"><?= $reminder['completed'] ? '✅' : '❌' ?></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      <?php else: ?>
        <p class="text-red-500">No reminders found.</p>
      <?php endif; ?>
    </div>

    <!-- Chart.js Section -->
    <div class="mb-8">
      <h2 class="text-xl font-semibold text-indigo-700 mb-2">Logins Chart</h2>
      <canvas id="loginChart" width="400" height="200" class="bg-white border border-gray-200 rounded"></canvas>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
    const ctx = document.getElementById('loginChart').getContext('2d');
    const loginChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: <?= json_encode(array_column($loginCounts, 'username')) ?>,
        datasets: [{
          label: 'Login Count',
          data: <?= json_encode(array_column($loginCounts, 'login_count')) ?>,
          backgroundColor: 'rgba(54, 162, 235, 0.5)',
          borderColor: 'rgba(54, 162, 235, 1)',
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          y: { beginAtZero: true }
        }
      }
    });
  </script>

</body>
</html>

<?php require_once 'app/views/templates/footer.php' ?>