<?php

class Login extends Controller {

    public function index() {		
	    $this->view('login/index');
    }
    
	public function verify()
	{
			$username = $_REQUEST['username'];
			$password = $_REQUEST['password'];

			$user = $this->model('User');
			$auth = $user->authenticate($username, $password); 

			if ($auth) {
					
					$_SESSION['auth'] = true;
					$_SESSION['username'] = $username;
					$_SESSION['toast_success'] = "Login successful!";
					header('Location: /home');
					exit;
			} else {
					//  Track failed attempts here if needed
					$_SESSION['toast_error'] = "Invalid username or password.";
					header('Location: /login');
					exit;
			}
	}


}
