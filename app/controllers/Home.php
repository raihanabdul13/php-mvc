<?php 

class Home extends Controller {
    public function index()
    {
        $data['judul'] = 'Home';
        $data['nama'] = $this->model('User_model')->getUser();
        $data['IdMagang'] = $this->model('User_model')->getId();
        $data['position'] = $this->model('User_model')->getPosition();
        $this->view('templates/header', $data);
        $this->view('home/index', $data);
        $this->view('templates/footer');
    }
}