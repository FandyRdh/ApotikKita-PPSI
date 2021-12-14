<?php

namespace App\Controllers;

class Landing_Page extends BaseController
{
	//----------------------Index Page--------------------------------\
	public function index()
	{
		$data = [
			'title' => 'Home | Apotik Kita'
		];
		echo view('Landing_Page/Layout/Header', $data);
		echo view('Landing_Page/Halaman/Index');
		echo view('Landing_Page/Layout/Footer');
	}

	//----------------------About Page--------------------------------\
	public function About()
	{
		$data = [
			'title' => 'About | Apotik Kita'
		];
		echo view('Landing_Page/Layout/Header', $data);
		echo view('Landing_Page/Halaman/About');
		echo view('Landing_Page/Layout/Footer');
	}

	//----------------------Login Page--------------------------------\
	public function Login()
	{
		$data = [
			'title' => 'Login | Apotik Kita'
		];
		echo view('Landing_Page/Layout/Header_Login', $data);
		echo view('Landing_Page/Halaman/Login');
	}

	//----------------------Login Page--------------------------------\
	public function Login_Action()
	{
		$ID_USER = $this->request->getVar('ID_USER');
		$PW_USER = $this->request->getVar('PW_USER');

		$KaryawanModel = new \App\Models\KaryawanModel();
		$CEK_DATA = $KaryawanModel->query("SELECT Count(K.ID_KRY) as 'Jml_Kry',J.KODE_JABATAN,K.NAMA_KRY,K.ID_KRY
		FROM karyawan K
		JOIN jabatan J
		ON J.KODE_JABATAN = K.KODE_JABATAN
		where ID_KRY like '$ID_USER' and PW_KRY like '$PW_USER';");

		foreach ($CEK_DATA->getResultArray() as $V_i) {
		}
		$Nama_Kry = $V_i['NAMA_KRY'];
		$Id_Kry = $V_i['ID_KRY'];

		if ($V_i['Jml_Kry'] == 1) {
			//Kasir
			echo $V_i['Jml_Kry'];
			if ($V_i['KODE_JABATAN'] == "ksr") {
				session()->set('ID_KRY', $Id_Kry);
				session()->setFlashdata('pesan_Welcome', "Selamat Datang $Nama_Kry.");
				return redirect()->to('/Pembelian');
			} //Gudang 
			elseif ($V_i['KODE_JABATAN'] == "str") {
				session()->set('ID_KRY', $Id_Kry);
				session()->setFlashdata('pesan_Welcome', "Selamat Datang $Nama_Kry.");
				return redirect()->to('/Gudang');
			} //Admin
			elseif ($V_i['KODE_JABATAN'] == "adm") {
				session()->set('ID_KRY', $Id_Kry);
				session()->setFlashdata('pesan_Welcome', "Selamat Datang $Nama_Kry.");
				return redirect()->to('/Dashboard');
			} else {
				session()->setFlashdata('pesan_gagal', 'ID atau Password yang anda masukan tidak tersedia.');
				return redirect()->to('/Login');
			}
		} else {
			session()->setFlashdata('pesan_gagal', 'ID atau Password yang anda masukan salah.');
			return redirect()->to('/Login');
		}
	}

	//----------------------Login Page--------------------------------\
	public function Logout()
	{
		session()->destroy();
		return redirect()->to('/Login');
	}
	//----------------------Index Page--------------------------------\
	public function Berita()
	{
		$data = [
			'title' => 'Berita | Apotik Kita'
		];
		echo view('Landing_Page/Layout/Header', $data);
		echo view('Landing_Page/Halaman/Index');
		echo view('Landing_Page/Layout/Footer');
	}
}
