<footer class="bg-gray-900 text-white py-6 mt-12">
  <div class="max-w-7xl mx-auto px-4 flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
    <p class="text-sm md:text-base text-center md:text-left">
      &copy; <?= date('Y'); ?> Md Mahbub E Waduzzaman. All rights reserved.
    </p>

    <div class="flex space-x-6">
      <a href="https://facebook.com" target="_blank" class="hover:text-blue-500" aria-label="Facebook">
        <!-- SVG Icon -->
      </a>
      <a href="https://twitter.com" target="_blank" class="hover:text-sky-400" aria-label="Twitter">
        <!-- SVG Icon -->
      </a>
      <a href="https://linkedin.com" target="_blank" class="hover:text-blue-300" aria-label="LinkedIn">
        <!-- SVG Icon -->
      </a>
    </div>
  </div>
</footer>

<!-- Toastify CDN -->
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

<script>
  <?php if (isset($_SESSION['toast_success'])): ?>
    Toastify({
      text: <?= json_encode($_SESSION['toast_success']) ?>,
      duration: 4000,
      gravity: "top",
      position: "right",
      backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
      stopOnFocus: true
    }).showToast();
    <?php unset($_SESSION['toast_success']); ?>
  <?php endif; ?>

  <?php if (isset($_SESSION['toast_error'])): ?>
    Toastify({
      text: <?= json_encode($_SESSION['toast_error']) ?>,
      duration: 4000,
      gravity: "top",
      position: "right",
      backgroundColor: "linear-gradient(to right, #ef4444, #f87171)",
      stopOnFocus: true
    }).showToast();
    <?php unset($_SESSION['toast_error']); ?>
  <?php endif; ?>

  <?php if (isset($_SESSION['flash_message'])): ?>
    Toastify({
      text: <?= json_encode($_SESSION['flash_message']) ?>,
      duration: 3000,
      gravity: "top",
      position: "right",
      backgroundColor: <?= json_encode($_SESSION['flash_color'] ?? "linear-gradient(to right, #4ade80, #22c55e)") ?>,
      stopOnFocus: true
    }).showToast();
    <?php 
      unset($_SESSION['flash_message']);
      unset($_SESSION['flash_color']);
    ?>
  <?php endif; ?>
</script>

</body>
</html>
