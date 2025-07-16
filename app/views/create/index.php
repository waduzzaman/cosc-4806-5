
<?php require_once 'app/views/templates/headerPublic.php'; ?>
<main class="container mx-auto px-4 py-10">
    <div class="max-w-md mx-auto bg-white shadow-md rounded-lg p-6">
        <h1 class="text-xl font-bold text-center text-blue-600 mb-6">Create a New Account</h1>

        <?php if (isset($error)) : ?>
            <p class="text-red-600 text-sm mb-4 text-center"><?= $error; ?></p>
        <?php endif; ?>

        <!-- New user registration form start -->

        <form action="/create/store" method="POST" class="space-y-5">
            <div>
                <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                <input type="text" name="username" id="username" required
                       class="w-full px-4 py-2 mt-1 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" name="password" id="password" required
                       class="w-full px-4 py-2 mt-1 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div>
                <label for="confirm_password" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                <input type="password" name="confirm_password" id="confirm_password" required
                       class="w-full px-4 py-2 mt-1 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div>
                <button type="submit"
                        class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 transition">
                    Register
                </button>
            </div>
        </form>
        <!-- New user registration form end -->
    </div>
</main>
<!-- common footer -->
<?php require_once 'app/views/templates/footer.php'; ?>
