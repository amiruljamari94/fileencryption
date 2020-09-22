<?php

class About extends Controller
{
	public function index($nama = 'amirul', $pekerjaan = 'programmer', $umur = 25)
	{
		//echo "Nama saya $nama, saya adalah seorang $pekerjaan berumur $umur tahun";
		
		$data['nama'] = $nama;
		$data['pekerjaan'] = $pekerjaan;
		$data['umur'] = $umur;

		$data['judul'] = 'About me';
		$this->view('templates/header', $data);
		$this->view('about/index', $data);
		$this->view('templates/footer');
	}

	public function page()
	{
		$data['judul'] = 'Page';
		$this->view('templates/header', $data);
		$this->view('about/page');
		$this->view('templates/footer');
	}
}