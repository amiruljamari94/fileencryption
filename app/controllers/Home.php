<?php 

class Home extends Controller{
	public function index()
	{
		$data['judul'] = 'Home';
		$data['nama'] = $this->model('User_model')->getUser();
		$this->view('templates/header', $data);
		$this->view('home/index', $data);
		$this->view('templates/footer');
	}

	public function admin()
	{
		$data['judul'] = 'Admin';
		$this->view('templates/header', $data);
		$this->view('admin/login', $data);
		$this->view('templates/footer');
	}

	


}