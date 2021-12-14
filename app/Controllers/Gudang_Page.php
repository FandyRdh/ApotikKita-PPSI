<?php

namespace App\Controllers;

class Gudang_Page extends BaseController
{
	public function Data_Obat()
	{
		$ObatModel = new \App\Models\ObatModel();
		$Obat = $ObatModel->query("SELECT KODE_OBAT,NAMA_OBAT,
		CASE STOK_OBAT
		WHEN 0 THEN 'Stok Obat Kosong'
		ELSE STOK_OBAT
		END as 'STOK_OBAT',HARGA_OBAT
		From obat;");
		$Jumlah_Obat = $ObatModel->query("SELECT count(Kode_Obat) as Jumlah_Obat FROM obat;");
		$Jenis_Obat = $ObatModel->query("SELECT * FROM jenis_obat;");
		$Kategori_Obat = $ObatModel->query("SELECT * FROM kategori_obat");

		foreach ($Jumlah_Obat->getResultArray() as $vi) {
		}
		$data = [
			'title' => 'Staf Gudang | Apotik Kita',
			'Obat' => $Obat,
			'Jumlah_Obat' => $vi['Jumlah_Obat'],
			'Jenis_Obat' => $Jenis_Obat,
			'Kategori_Obat' => $Kategori_Obat
		];

		echo view('/Layout_Gudang/Heading', $data);
		echo view('/Dashboard_Gudang/Halaman/Stok_Obat');
	}

	//--------------------------------------------------------------------

	public function Detail_Stok_Obat($slug)
	{

		$ObatModel = new \App\Models\ObatModel();
		$Obat = $ObatModel->query("SELECT O.KODE_OBAT,O.NAMA_OBAT,O.ATURAN_PENGGUNAAN,DATE_FORMAT(O.TGL_KADALUARSA, '%m/%M/%Y')as 'TGL_KADALUARSA',CASE O.STOK_OBAT
		WHEN 0 THEN '<b>Stok Obat Kosong</b>'
		ELSE STOK_OBAT
		END as 'STOK_OBAT',O.HARGA_OBAT,KO.NAMA_KATEGORI,JO.NAMA_JENIS,O.STOK_OBAT as 'STOK_OBAT2',O.TGL_KADALUARSA as 'TGL_KADALUARSA2'
		FROM Obat O
		JOIN kategori_obat KO
		ON O.KODE_KATEGORI = KO.KODE_KATEGORI
		JOIN jenis_obat JO
		ON O.KODE_JENIS = JO.KODE_JENIS
		WHERE KODE_OBAT = '$slug';");
		$Jenis_Obat = $ObatModel->query("SELECT * FROM jenis_obat;");
		$Kategori_Obat = $ObatModel->query("SELECT * FROM kategori_obat");

		$data = [
			'title' => 'Staf Gudang | Apotik Kita',
			'Obat' => $Obat,
			'Jenis_Obat' => $Jenis_Obat,
			'Kategori_Obat' => $Kategori_Obat
		];

		echo view('/Layout_Gudang/Heading', $data);
		echo view('/Dashboard_Gudang/Halaman/Detail_Stok_Obat');
	}

	//--------------------------------------------------------------------

	public function Hapus_Obat($slug)
	{
		$KaryawanModel = new \App\Models\KaryawanModel();
		// pengecekan penggunaan jabatan di tabel lain
		$v1 = $KaryawanModel->query("SELECT COUNT(KODE_OBAT) as Penggunaan FROM detail_penjualan WHERE KODE_OBAT = '$slug';");
		foreach ($v1->getResultArray() as $Cek_Penggunaan) {
		}
		if ($Cek_Penggunaan['Penggunaan'] > 0) {
			session()->setFlashdata('pesan_hapus', 'Data Tidak Dapat Di Hapus Karena Di Gunakan DI Tabel Lain');
			return redirect()->to("/Gudang/Detail/$slug");
		} else {
			$KaryawanModel->query("DELETE FROM obat WHERE KODE_OBAT = '$slug';");
			session()->setFlashdata('pesan_hapus', 'Data Berhasil Dihapus.');
			return redirect()->to("/Gudang");
		}
	}

	//--------------------------------------------------------------------
	public function Search_Stok_Obat()
	{
		$Cari_Obat = $this->request->getVar('Cari-Obat');
		$ObatModel = new \App\Models\ObatModel();
		$Obat = $ObatModel->query("SELECT KODE_OBAT,NAMA_OBAT,
		CASE STOK_OBAT
		WHEN 0 THEN '<b>Stok Obat Kosong</b>'
		ELSE STOK_OBAT
		END as 'STOK_OBAT',HARGA_OBAT
		From obat
		where NAMA_OBAT LIKE '$Cari_Obat%';");
		$Jumlah_Obat = $ObatModel->query("SELECT count(Kode_Obat) as Jumlah_Obat FROM obat;");
		$Jenis_Obat = $ObatModel->query("SELECT * FROM jenis_obat;");
		$Kategori_Obat = $ObatModel->query("SELECT * FROM kategori_obat");

		foreach ($Jumlah_Obat->getResultArray() as $vi) {
		}
		$data = [
			'title' => 'Staf Gudang | Apotik Kita',
			'Obat' => $Obat,
			'Jumlah_Obat' => $vi['Jumlah_Obat'],
			'Jenis_Obat' => $Jenis_Obat,
			'Kategori_Obat' => $Kategori_Obat
		];


		echo view('/Layout_Gudang/Heading', $data);
		echo view('/Dashboard_Gudang/Halaman/Stok_Obat');
	}

	//----------------------Inset Obat------------------------------

	public function Save_Obat()
	{
		$ObatModel = new \App\Models\ObatModel();
		$KODE_OBAT = $this->request->getVar('KODE_OBAT');
		$JENIS_OBAT = $this->request->getVar('JENIS_OBAT');
		$KATEGORI_OBAT = $this->request->getVar('KATEGORI_OBAT');
		$NAMA_OBAT = $this->request->getVar('NAMA_OBAT');
		$PETUNJUK_PENGGUNAAN = $this->request->getVar('PETUNJUK_PENGGUNAAN');
		$TGL_KADALUARSA = $this->request->getVar('TGL_KADALUARSA');
		$Stok_Obat = 0;
		$HARGA_OBAT = $this->request->getVar('HARGA_OBAT');

		$ObatModel->query("INSERT INTO obat (KODE_OBAT, KODE_JENIS,KODE_KATEGORI,NAMA_OBAT,ATURAN_PENGGUNAAN,TGL_KADALUARSA,STOK_OBAT,HARGA_OBAT)	
		VALUES ('$KODE_OBAT', '$JENIS_OBAT','$KATEGORI_OBAT','$NAMA_OBAT','$PETUNJUK_PENGGUNAAN ','$TGL_KADALUARSA','$Stok_Obat','$HARGA_OBAT');");
		session()->setFlashdata('pesan_insert', 'Obat Berhasil ditambahkan.');
		return redirect()->to('/Gudang');
	}

	//----------------------Update Obat------------------------------

	public function Update_Obat()
	{
		$ObatModel = new \App\Models\ObatModel();
		$KODE_OBAT = $this->request->getVar('KODE_OBAT');
		$JENIS_OBAT = $this->request->getVar('JENIS_OBAT');
		$KATEGORI_OBAT = $this->request->getVar('KATEGORI_OBAT');
		$NAMA_OBAT = $this->request->getVar('NAMA_OBAT');
		$PETUNJUK_PENGGUNAAN = $this->request->getVar('PETUNJUK_PENGGUNAAN');
		$TGL_KADALUARSA = $this->request->getVar('TGL_KADALUARSA');
		$Stok_Obat = $this->request->getVar('STOK_OBAT');
		$HARGA_OBAT = $this->request->getVar('HARGA_OBAT');

		$ObatModel->query("UPDATE obat
		SET KODE_OBAT = '$KODE_OBAT', KODE_JENIS= '$JENIS_OBAT', KODE_KATEGORI = '$KATEGORI_OBAT ', NAMA_OBAT = '$NAMA_OBAT', ATURAN_PENGGUNAAN = '$PETUNJUK_PENGGUNAAN', TGL_KADALUARSA = '$TGL_KADALUARSA', STOK_OBAT = '$Stok_Obat', HARGA_OBAT = '$HARGA_OBAT '
		WHERE KODE_OBAT = '$KODE_OBAT';");
		session()->setFlashdata('pesan_Update', 'Data Berhasil Dirubah.');
		return redirect()->to("/Gudang/Detail/$KODE_OBAT");
	}

	//--------------------------------------------------------------------

	public function Laporan()
	{
		$data = [
			'title' => 'Staf Gudang | Apotik Kita'
		];

		echo view('/Layout_Gudang/Heading', $data);
		echo view('/Dashboard_Gudang/Halaman/Laporan');
	}

	//--------------------------------------------------------------------
	public function Laporan_Obat()
	{
		$ObatModel = new \App\Models\ObatModel();
		$Obat = $ObatModel->query("SELECT KODE_OBAT,NAMA_OBAT,ATURAN_PENGGUNAAN,STOK_OBAT,HARGA_OBAT,NAMA_KATEGORI,DATE_FORMAT(TGL_KADALUARSA, '%m %M %Y')as 'TGL_KADALUARSA'
		FROM obat O
		JOIN jenis_obat JO
		ON JO.KODE_JENIS = O.KODE_JENIS
		JOIN kategori_obat KO
		ON KO.KODE_KATEGORI = O.KODE_KATEGORI
		order by DATE_FORMAT(TGL_KADALUARSA, '%Y') asc;");
		$data = [
			'Obat' => $Obat
		];

		echo view('/Dashboard_Gudang/Halaman/Laporan_Obat', $data);
	}
	//--------------------------------------------------------------------
	public function Petunjuk_Obat($slug)
	{
		$ObatModel = new \App\Models\ObatModel();
		$Obat = $ObatModel->query("
		SELECT NAMA_OBAT,ATURAN_PENGGUNAAN,DATE_FORMAT(TGL_KADALUARSA, '%m %M %Y')as 'TGL_KADALUARSA',KODE_OBAT
		FROM obat
		where KODE_OBAT = '$slug';");
		$data = [
			'Obat' => $Obat
		];

		echo view('/Dashboard_Gudang/Halaman/Petunjuk_Obat', $data);
	}
}
