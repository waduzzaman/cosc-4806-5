<?php require_once 'app/views/templates/header.php' ?>

<div class="max-w-3xl mx-auto px-4 py-12">
    <h1 class="text-4xl font-bold text-gray-800 mb-4">About Me</h1>

    <p class="text-gray-700 text-lg mb-6">
        Hi 👋 <?= isset($_SESSION['username']) ? htmlspecialchars($_SESSION['username']) : 'Guest'; ?>!<br>
        Welcome to the About Me page of this web app. This project uses PHP MVC structure with secure login, session management, and TailwindCSS styling.
    </p>

    <ul class="list-disc list-inside text-gray-700 text-lg mb-6">
        <li>Secure authentication system</li>
        <li>Login attempt tracking</li>
        <li>Personalized experience</li>
        <li>Clean UI with TailwindCSS</li>
    </ul>

    <div class="mt-6">
        <a href="/home" 
           class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-lg transition">
            ← Back to Home
        </a>
    </div>
</div>

<?php require_once 'app/views/templates/footer.php' ?>
