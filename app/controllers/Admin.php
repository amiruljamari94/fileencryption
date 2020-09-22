<?php 

class Admin extends Controller{
	public function index()
	{
		// echo '<hr> Nama class : ' . __METHOD__ . '<hr>';
		// $data['judul'] = 'Admin';
		// $this->view('templates/admin/header', $data);
		// $this->view('templates/admin/mukadepan', $data);
		// $this->view('templates/admin/footer');
		// $this->view('templates/admin/footer');
		header('Location:' . URL . 'admin/dashboard');
    }
    
    
    
    public function dashboard()
	{
		$data['judul'] = 'Admin'; 
		$this->view('templates/admin/header', $data);
		$this->view('templates/admin/dashboard', $data);
		$this->view('templates/admin/footer');
	}

	function logout()
	{
		//echo '<pre>sebelum:'; print_r($_SESSION); echo '</pre>';
		unset($_SESSION);
		session_destroy();
		header('location: ' . URL);
		//exit;
	}

}