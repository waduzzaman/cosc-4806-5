<?php require_once 'app/views/templates/header.php'; ?>
<main class="container mx-auto px-4 py-12">
  <div class="max-w-6xl mx-auto bg-white shadow-md rounded-lg p-6">
    <h1 class="text-3xl font-bold text-center text-blue-700 mb-10">All Users' Reminders Report</h1>

    <?php if (!empty($grouped)) : ?>
      <?php foreach ($grouped as $username => $reminders): ?>
        <div class="mb-10 border border-gray-200 rounded-lg overflow-hidden">
          <div class="bg-gray-100 px-4 py-3 font-semibold text-lg text-gray-700">
            <?= htmlspecialchars($username) ?>
          </div>

          <div class="overflow-x-auto">
            <table class="min-w-full table-auto">
              <thead class="bg-blue-600 text-white">
                <tr>
                  <th class="px-4 py-2 text-left">Reminder</th>
                  <th class="px-4 py-2 text-left">Completed</th>
                  <th class="px-4 py-2 text-left">Created At</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($reminders as $reminder): ?>
                  <tr class="border-b hover:bg-gray-50">
                    <td class="px-4 py-2"><?= htmlspecialchars($reminder['subject']) ?></td>
                    <td class="px-4 py-2">
                      <?= $reminder['completed'] ? '<span class="text-green-600 font-semibold">Yes</span>' : '<span class="text-red-500 font-semibold">No</span>' ?>
                    </td>
                    <td class="px-4 py-2"><?= htmlspecialchars($reminder['created_at']) ?></td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      <?php endforeach; ?>
    <?php else: ?>
      <p class="text-gray-500 text-center">No reminders found.</p>
    <?php endif; ?>
  </div>
</main>
<?php require_once 'app/views/templates/footer.php'; ?>
