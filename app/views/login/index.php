

<?php require_once 'app/views/templates/headerPublic.php' ?>
<main role="main" class="container mx-auto px-4 py-12">

	<!-- login attemp -->
	<!-- Show lockout message if set -->
	<?php if (isset($_SESSION['lockout'])) : ?>
			<p class="text-red-600 text-center mb-4"><?= $_SESSION['lockout']; ?></p>
			<?php unset($_SESSION['lockout']); ?>
	<?php endif; ?>

		<div class="max-w-xl mx-auto bg-white shadow-md rounded-lg p-8">
			<h1 class="text-2xl  font-bold text-center text-blue-600 mb-6">
					Welcome! <br/> Please log in to access the full site.
			</h1>


			<!-- Show lockout message if set -->
				<?php if (isset($_SESSION['lockout'])) : ?>
						<p class="text-red-600 text-center mb-4"><?= $_SESSION['lockout']; ?></p>
						<?php unset($_SESSION['lockout']); ?>
				<?php endif; ?>

			<!-- login form -->
				<form action="/login/verify" method="post" class="space-y-6">
						<div>
								<label for="username" class="block text-sm font-medium text-gray-700 mb-1">Username</label>
								<input required type="text" name="username" id="username"
										class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
						</div>

						<div>
								<label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
								<input required type="password" name="password" id="password"
										class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
						</div>
				
						<div class="pt-4">
								<button type="submit"
										class="w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 transition-colors duration-300">
										Login
								</button>
						</div>
				</form>

				<!-- New user prompt -->
				<div class="mt-6 text-center text-gray-600">
						<p>Not registered yet?</p>
						<a href="/create" 
							 class="inline-block mt-2 px-6 py-2 text-blue-600 border border-blue-600 rounded-md hover:bg-blue-600 hover:text-white transition-colors duration-300">
								Create an Account
						</a>
				</div>
		</div>
</main>
<?php require_once 'app/views/templates/footer.php' ?>

