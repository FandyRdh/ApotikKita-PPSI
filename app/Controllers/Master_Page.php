<?php

namespace App\Controllers;

use \App\Models\JabatanModel;

class Master_Page extends BaseController

{
	protected $jabatanModel;
	public function __construct()
	{
		$this->jabatanModel = new JabatanModel();
	}

	//----------------------Jabatan------------------------------
	public function Jabatan()
	{
		$jabatan = $this->jabatanModel->findAll();

		$data = [
			'title' => 'Master Jabatan | Apotik Kita',
			'jabatan' => $jabatan
		];

		echo view('Layout/Heading', $data);
		echo view('/Master/Halaman/View_Jabatan');
		// echo view('/Landing_Page/Layout/Footer');
	}

	//----------------------Hapus_Jabatan------------------------------
	public function Hapus_Jabatan($slug)
	{
		// pengecekan penggunaan jabatan di tabel lain
		$v1 = $this->jabatanModel->query("SELECT COUNT(ID_KRY) as Penggunaan FROM karyawan WHERE KODE_JABATAN = '$slug';");
		foreach ($v1->getResultArray() as $Cek_Penggunaan_Jabatan) {
		}
		if ($Cek_Penggunaan_Jabatan['Penggunaan'] > 0) {
			session()->setFlashdata('pesan_hapus', 'Data Tidak Dapat Di Hapus Karena Di Gunakan DI Tabel Lain');
		} else {
			$this->jabatanModel->query("DELETE FROM jabatan WHERE KODE_JABATAN = '$slug'");
			session()->setFlashdata('pesan_hapus', 'Data Berhasil Dihapus.');
		}
		return redirect()->to('/Master/Jabatan');
	}

	//----------------------Inset Jabatan------------------------------

	public function Save()
	{
		$KODE_JABATAN = $this->request->getVar('ID_JABATAN');
		$NAMA_JABATAN = $this->request->getVar('NAMA_JABATAN');

		$this->jabatanModel->query("INSERT INTO jabatan (KODE_JABATAN, NAMA_JABATAN)
		 VALUES ('$KODE_JABATAN', '$NAMA_JABATAN');");

		session()->setFlashdata('pesan_insert', 'Data Berhasil ditambahkan.');
		return redirect()->to('/Master/Jabatan');
	}

	// ----------------------------------------------------------------
	// ----------------------------------------------------------------

	public function Kategori()
	{
		$KategoriModel = new \App\Models\KategoriModel();
		$Kategori = $KategoriModel->findAll();

		$data = [
			'title' => 'Master Kategori | Apotik Kita',
			'Kategori' => $Kategori
		];

		echo view('/Layout/Heading', $data);
		echo view('/Master/Halaman/View_Kategori');
		// echo view('/Landing_Page/Layout/Footer');
	}

	//----------------------Inset Kategori------------------------------

	public function Save_Kategori()
	{
		$KategoriModel = new \App\Models\KategoriModel();
		$KODE_KATEGORI = $this->request->getVar('ID_KATEGORI');
		$NAMA_KATEGORI = $this->request->getVar('NAMA_KATEGORI');

		$KategoriModel->query("INSERT INTO kategori_obat (KODE_KATEGORI, NAMA_KATEGORI)
		 VALUES ('$KODE_KATEGORI', '$NAMA_KATEGORI');");

		session()->setFlashdata('pesan_insert', 'Data Berhasil ditambahkan.');
		return redirect()->to('/Master/Kategori');
	}

	//----------------------Hapus Kategori------------------------------

	public function Hapus_Kategori($slug)
	{
		// pengecekan penggunaan jabatan di tabel lain
		$v1 = $this->jabatanModel->query("SELECT COUNT(KODE_KATEGORI) as Penggunaan FROM obat WHERE KODE_KATEGORI =  '$slug';");
		foreach ($v1->getResultArray() as $Cek_Penggunaan_Kategori) {
		}
		if ($Cek_Penggunaan_Kategori['Penggunaan'] > 0) {
			session()->setFlashdata('pesan_hapus', 'Data Tidak Dapat Di Hapus Karena Di Gunakan DI Tabel Lain');
		} else {
			$this->jabatanModel->query("DELETE FROM kategori_obat WHERE KODE_KATEGORI = '$slug'");
			session()->setFlashdata('pesan_hapus', 'Data Berhasil Dihapus.');
		}
		return redirect()->to('/Master/Kategori');
	}


	// ----------------------------------------------------------------
	// ----------------------------------------------------------------

	public function Jenis()
	{
		$JenisModel = new \App\Models\JenisModel();
		$Jenis = $JenisModel->findAll();

		$data = [
			'title' => 'Master Jenis | Apotik Kita',
			'Jenis' => $Jenis
		];

		echo view('Layout/Heading', $data);
		echo view('/Master/Halaman/View_Jenis');
		// echo view('/Landing_Page/Layout/Footer');
	}

	//----------------------Inset Kategori------------------------------

	public function Save_Jenis()
	{
		$JenisModel = new \App\Models\JenisModel();
		$KODE_JENIS = $this->request->getVar('ID_JENIS');
		$NAMA_JENIS = $this->request->getVar('NAMA_JENIS');

		$JenisModel->query("INSERT INTO jenis_obat (KODE_JENIS, NAMA_JENIS)
		 VALUES ('$KODE_JENIS', '$NAMA_JENIS');");

		session()->setFlashdata('pesan_insert', 'Data Berhasil ditambahkan.');
		return redirect()->to('/Master/Jenis');
	}

	//----------------------Hapus Kategori------------------------------

	public function Hapus_Jenis($slug)
	{
		// pengecekan penggunaan jabatan di tabel lain
		$v1 = $this->jabatanModel->query("SELECT COUNT(KODE_JENIS) as Penggunaan FROM obat WHERE KODE_JENIS =  '$slug';");
		foreach ($v1->getResultArray() as $Cek_Penggunaan_Kategori) {
		}
		if ($Cek_Penggunaan_Kategori['Penggunaan'] > 0) {
			session()->setFlashdata('pesan_hapus', 'Data Tidak Dapat Di Hapus Karena Di Gunakan DI Tabel Lain');
		} else {
			$this->jabatanModel->query("DELETE FROM jenis_obat WHERE KODE_JENIS = '$slug'");
			session()->setFlashdata('pesan_hapus', 'Data Berhasil Dihapus.');
		}
		return redirect()->to('/Master/Jenis');
	}
}
