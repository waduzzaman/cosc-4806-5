<?php require_once 'app/views/templates/header.php'; ?>

<main role="main" class="container mx-auto px-4 py-12">
  <div class="max-w-xl mx-auto bg-white shadow-md rounded-lg p-8">
    <h1 class="text-2xl font-bold text-center text-blue-600 mb-6">Update Reminder</h1>

    <?php if ($data['reminder']['completed']): ?>
      <div class="bg-yellow-100 text-yellow-700 px-4 py-3 rounded mb-4">
        This reminder has already been marked as <strong>Completed</strong>. You cannot update it.
      </div>
      <div class="text-center">
        <a href="/reminders" class="text-blue-600 hover:underline">← Back to Reminders</a>
      </div>
    <?php else: ?>
      <form action="/reminders/update/<?= $data['reminder']['id'] ?>" method="POST" class="space-y-4">
        <div>
          <label for="subject" class="block text-gray-700 font-medium">Reminder Subject:</label>
          <input 
            type="text" 
            id="subject" 
            name="subject" 
            required
            value="<?= htmlspecialchars($data['reminder']['subject']) ?>" 
            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500"
          >
        </div>

        <div>
          <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            Update Reminder
          </button>
          <a href="/reminders" class="ml-3 text-gray-600 hover:underline">Cancel</a>
        </div>
      </form>
    <?php endif; ?>
  </div>
</main>

<?php require_once 'app/views/templates/footer.php'; ?>
