<?php

// class Mahasiswa extends Controller
// {
// 	public function index()
// 	{
// 		$data['judul'] = 'Daftar Mahasiswa';
// 		$data['mhs'] = $this->model('Mahasiswa_model')->getAllMahasiswa();
// 		$this->view('templates/header', $data);
// 		$this->view('mahasiswa/index', $data);
// 		$this->view('templates/footer');
// 	}

// 	public function detail($id)
// 	{
// 		$data['judul'] = 'Detail Mahasiswa';
// 		$data['mhs'] = $this->model('Mahasiswa_model')->getMahasiswaById($id);
// 		$this->view('templates/header', $data);
// 		$this->view('mahasiswa/detail', $data);
// 		$this->view('templates/footer');
// 	}

// 	public function tambah()
// 	{
// 		if($this->model('Mahasiswa_model')->deleteDataMahasiswa($_POST) > 0)
// 		{
// 			FLasher::setFlash('berhasil', 'ditambahkan', 'success');
// 			header('Location: ' . BASEURL . '/mahasiswa');
// 			exit;
// 		}
// 		else
// 		{
// 			FLasher::setFlash('gagal', 'ditambahkan', 'danger');
// 			header('Location: ' . BASEURL . '/mahasiswa');
// 			exit;
// 		}
		

// 	}

// 	public function delete($id)
// 	{
// 		if($this->model('Mahasiswa_model')->deleteDataMahasiswa($id) > 0)
// 		{
// 			FLasher::setFlash('berhasil', 'deleted', 'success');
// 			header('Location: ' . BASEURL . '/mahasiswa');
// 			exit;
// 		}
// 		else
// 		{
// 			FLasher::setFlash('gagal', 'deleted', 'danger');
// 			header('Location: ' . BASEURL . '/mahasiswa');
// 			exit;
// 		}
// 	}

// 	public function getUbah()
// 	{
// 		echo json_encode($this->model('Mahasiswa_model')->getMahasiswaById($_POST['id']));
// 	}

// 	public function ubah()
// 	{
// 		if($this->model('Mahasiswa_model')->ubahDataMahasiswa($_POST) > 0)
// 		{
// 			FLasher::setFlash('berhasil', 'diubah', 'success');
// 			header('Location: ' . BASEURL . '/mahasiswa');
// 			exit;
// 		}
// 		else
// 		{
// 			FLasher::setFlash('gagal', 'diubah', 'danger');
// 			header('Location: ' . BASEURL . '/mahasiswa');
// 			exit;
// 		}
// 	}

// 	public function search()
// 	{
// 		$data['judul'] = 'Daftar Mahasiswa';
// 		$data['mhs'] = $this->model('Mahasiswa_model')->cariDataMahasiswa();
// 		$this->view('templates/header', $data);
// 		$this->view('mahasiswa/index', $data);
// 		$this->view('templates/footer');
// 	}

// }