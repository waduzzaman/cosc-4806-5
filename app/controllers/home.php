<?php

class Home extends Controller {

    public function index() {
        $user = $this->model('User');
        $data = $user->test();

        // route to index page

        $this->view('home/index');
        die;
    }
    // route to about page
    public function about() {
        $this->view('home/about');
        die;
    }

    // route to portfolio page

    public function portfolio() {
        $this->view('home/portfolio');
        die;
    }

     // route to reminder page

    public function reminder() {
        $this->view('home/reminder');
        die;
    }
    // route to contact page

     public function contact() {
        $this->view('home/contact');
        die;
  }
}
