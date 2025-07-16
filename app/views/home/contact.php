<?php require_once 'app/views/templates/header.php'; ?>

<div class="max-w-3xl mx-auto px-4 py-12">
    <div class="mb-10 text-center">
        <h1 class="text-4xl font-bold text-gray-800 mb-4">Get in Touch</h1>
        <p class="text-gray-600 text-lg">
            Have a question, idea, or project you’d like to discuss? Fill out the form below or email me directly. I’ll get back to you as soon as possible.
        </p>
    </div>
    <!--  Contact form start-->

    <form action="/contact" method="POST" class="bg-white shadow-md rounded-lg p-8 space-y-6">
        <div>
            <label for="name" class="block text-gray-700 font-medium mb-2">Name</label>
            <input type="text" id="name" name="name" required
                   class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
        </div>

        <div>
            <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
            <input type="email" id="email" name="email" required
                   class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
        </div>

        <div>
            <label for="message" class="block text-gray-700 font-medium mb-2">Message</label>
            <textarea id="message" name="message" rows="5" required
                      class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500"></textarea>
        </div>

        <div class="text-right">
            <button type="submit"
                    class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold px-6 py-3 rounded-md shadow-md transition duration-300">
                Send Message
            </button>
        </div>
    </form>
    <!--  Contact form end-->
</div>

<?php require_once 'app/views/templates/footer.php'; ?>
