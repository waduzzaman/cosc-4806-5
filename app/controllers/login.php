<?php

class Login extends Controller
{
		public function index()
		{
				$this->view('login/index');
		}

		public function verify()
		{
				$username = $_REQUEST['username'];
				$password = $_REQUEST['password'];

				$userModel = $this->model('User');
				$user = $userModel->authenticate($username, $password);

				if ($user) {
						// ✅ Set essential session variables
						$_SESSION['auth'] = true;
						$_SESSION['username'] = $user['username'];
						$_SESSION['userid'] = $user['id'];

						$_SESSION['toast_success'] = "Login successful!";
						header('Location: /home');
						exit;
				} else {
						$_SESSION['toast_error'] = "Invalid username or password.";
						header('Location: /login');
						exit;
				}
		}
}
