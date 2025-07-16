<?php require_once 'app/views/templates/header.php' ?>

<div class="max-w-6xl mx-auto px-4 py-12">
    <h1 class="text-4xl font-bold text-gray-800 mb-8 text-center">My Portfolio</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <!-- Project Card 1 -->
        <div class="card bg-base-100 shadow-xl">
            <figure><img src="https://i.ibb.co/6ctL4Y7B/project1.jpg" alt="Project 1" class="rounded-t-lg" /></figure>
            <div class="card-body">
                <h2 class="card-title">Project One</h2>
                <p>A responsive travel blog site built with React and Node.js.</p>
                <div class="card-actions justify-end">
                    <a href="#" target="_blank" class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">View Code</a>
                    <a href="https://top-tourism-management.netlify.app/" target="_blank" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">Live Demo</a>
                </div>
            </div>
        </div>

        <!-- Project Card 2 -->
        <div class="card bg-base-100 shadow-xl">
            <figure><img src="https://i.ibb.co/ynTWLJ9p/project2.jpg" alt="Project 2" class="rounded-t-lg" /></figure>
            <div class="card-body">
                <h2 class="card-title">Project Two</h2>
                <p>A community library app with MERN Stack </p>
                <div class="card-actions justify-end">
                    <a href="#" target="_blank" class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">View Code</a>
                    <a href="https://community-library-d20f8.web.app/" target="_blank" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">Live Demo</a>
                </div>
            </div>
        </div>

        <!-- Project Card 3 -->
        <div class="card bg-base-100 shadow-xl">
            <figure><img src="https://i.ibb.co/wZf2p07C/project3.jpg" alt="Project 3" class="rounded-t-lg" /></figure>
            <div class="card-body">
                <h2 class="card-title">Project Three</h2>
                <p>A markeing company portfolio website build with NextJS</p>
                <div class="card-actions justify-end">
                    <a href="#" target="_blank" class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">View Code</a>
                    <a href="https://www.akmarketings.com/" target="_blank" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">Live Demo</a>
                </div>
            </div>
        </div>

       
    </div>
</div>

<?php require_once 'app/views/templates/footer.php' ?>
