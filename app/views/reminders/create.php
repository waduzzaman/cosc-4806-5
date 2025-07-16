<?php require_once 'app/views/templates/header.php'; ?>
<main class="container mx-auto px-4 py-12 max-w-xl">
  <div class="bg-white p-8 rounded shadow">
    <h2 class="text-xl font-semibold text-blue-600 mb-6">Create Reminder</h2>

    <form method="POST">
      <label class="block text-gray-700 font-medium mb-2">Subject</label>
      <input
        type="text"
        name="subject"
        class="w-full border border-gray-300 px-3 py-2 rounded mb-4"
        required
      />

      <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-800">
        Create
      </button>

      <a href="/reminders" class="ml-4 text-gray-600 hover:underline">Cancel</a>
    </form>
  </div>
</main>
<?php require_once 'app/views/templates/footer.php'; ?>
