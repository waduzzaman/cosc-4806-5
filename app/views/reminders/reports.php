<?php require_once 'app/views/templates/header.php'; ?>
<main class="container mx-auto px-4 py-12">
  <div class="max-w-6xl mx-auto bg-white shadow-md rounded-lg p-6">
    <h1 class="text-2xl font-bold text-center text-blue-600 mb-6">Reminders Report</h1>

    <?php if (!empty($grouped)) : ?>
      <?php foreach ($grouped as $username => $reminders): ?>
        <div class="mb-8">
          <h2 class="text-lg font-semibold text-gray-700 mb-2">
            <?= htmlspecialchars($reminders[0]['name']) ?> (<?= htmlspecialchars($username) ?>)
          </h2>

          <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-700 border">
              <thead class="bg-gray-100 text-gray-900">
                <tr>
                  <th class="px-4 py-2">#</th>
                  <th class="px-4 py-2">Subject</th>
                  <th class="px-4 py-2">Created At</th>
                  <th class="px-4 py-2">Status</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($reminders as $index => $reminder): ?>
                  <tr class="border-b">
                    <td class="px-4 py-2"><?= $index + 1 ?></td>
                    <td class="px-4 py-2"><?= htmlspecialchars($reminder['subject']) ?></td>
                    <td class="px-4 py-2"><?= htmlspecialchars($reminder['created_at']) ?></td>
                    <td class="px-4 py-2">
                      <?php if ($reminder['completed']): ?>
                        <span class="text-green-600 font-semibold">Completed</span>
                      <?php else: ?>
                        <span class="text-yellow-600 font-semibold">Pending</span>
                      <?php endif; ?>
                    </td>
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
