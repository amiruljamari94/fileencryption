<?php

class Register extends Controller
{
	public function index()
	{
		$data['judul'] = 'Daftar Mahasiswa';
		$data['mhs'] = $this->model('Mahasiswa_model')->getAllMahasiswa();
		$this->view('templates/header', $data);
		$this->view('templates/user/register', $data);
		$this->view('templates/footer');
	}

	public function signIn()
	{
		$data['judul'] = 'Daftar Mahasiswa';
		$this->view('templates/header', $data);
		$this->view('templates/user/register', $data);
		$this->view('templates/footer');
	}

	public function admin()
	{
		// echo '<hr> Nama class : ' . __METHOD__ . '<hr>';
		$data['judul'] = 'Daftar Admin';
		$this->view('templates/header', $data);
		$this->view('templates/admin/register', $data);
		$this->view('templates/footer');
	}
	
	public function user()
	{
		// echo '<hr> Nama class : ' . __METHOD__ . '<hr>';
		$data['judul'] = 'Daftar Admin';
		$this->view('templates/header', $data);
		$this->view('templates/admin/register', $data);
		$this->view('templates/footer');
    }

}