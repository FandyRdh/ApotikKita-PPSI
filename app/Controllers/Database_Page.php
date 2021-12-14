<?php

namespace App\Controllers;

// use \App\Models\JabatanModel;

class Database_Page extends BaseController
{
	// ----------------------------------------------------------------
	// ----------------------------------------------------------------

	public function Karyawan()
	{
		$KaryawanModel = new \App\Models\KaryawanModel();
		$Karyawan = $KaryawanModel->query("SELECT * 
		FROM karyawan K
		JOIN jabatan J
		ON K.KODE_JABATAN = J.KODE_JABATAN");
		$Jumlah_Karyawan = $KaryawanModel->query("SELECT count(ID_KRY) as Jumlah_Karyawan FROM karyawan");
		$Jabatan = $KaryawanModel->query("SELECT * FROM Jabatan");

		foreach ($Jumlah_Karyawan->getResultArray() as $vi) {
		}
		$data = [
			'title' => 'Master Karyawan | Apotik Kita',
			'Karyawan' => $Karyawan,
			'Jabatan' => $Jabatan,
			'Jumlah_Karyawan' => $vi['Jumlah_Karyawan'],
		];

		echo view('/Layout/Heading', $data);
		echo view('/Database/Halaman/View_Karyawan');
		// echo view('/Landing_Page/Layout/Footer');
	}


	//----------------------Detail Karyawan------------------------------
	public function Detail_Karyawan($slug)
	{
		$KaryawanModel = new \App\Models\KaryawanModel();
		$Karyawan = $KaryawanModel->query("SELECT * FROM karyawan K	JOIN jabatan J
		ON K.KODE_JABATAN = J.KODE_JABATAN
		WHERE ID_KRY = '$slug'");
		$Jabatan = $KaryawanModel->query("SELECT * FROM Jabatan");

		$data = [
			'title' => 'Master Karyawan | Apotik Kita',
			'Karyawan' => $Karyawan,
			'Jabatan' => $Jabatan
		];

		echo view('Layout/Heading', $data);
		echo view('/Database/Halaman/View_Karyawan_Detail');
		// echo view('/Landing_Page/Layout/Footer');
	}




	//----------------------Inset Karyawan------------------------------

	public function Save_Karyawan()
	{
		$KaryawanModel = new \App\Models\KaryawanModel();
		$ID_KRY = $this->request->getVar('ID_KRY');
		$PW_KRY = $this->request->getVar('PW_KRY');
		$NAMA_KRY = $this->request->getVar('NAMA_KRY');
		$JK = $this->request->getVar('JK');
		$JABATAN_KRY = $this->request->getVar('JABATAN_KRY');
		$NO_TELP_KRY = $this->request->getVar('NO_TELP_KRY');
		$ALAMAT_KRY = $this->request->getVar('ALAMAT_KRY');
		$TEMPAT_LAHIR = $this->request->getVar('TEMPAT_LAHIR');
		$TGL_LAHIR_KRY = $this->request->getVar('TGL_LAHIR_KRY');

		$KaryawanModel->query("INSERT INTO Karyawan (ID_KRY, KODE_JABATAN,NAMA_KRY,NO_TELP_KRY,ALAMAT_KRY,JK_KRY,TGL_LAHIR_KRY,TEMPAT_LAHIR,TGL_DITERIMA_KERJA,PW_KRY)	VALUES ('$ID_KRY', '$JABATAN_KRY','$NAMA_KRY','$NO_TELP_KRY','$ALAMAT_KRY ','$JK','$TGL_LAHIR_KRY','$TEMPAT_LAHIR ',SYSDATE(),'$PW_KRY');");

		session()->setFlashdata('pesan_insert', 'Data Berhasil ditambahkan.');
		return redirect()->to('/Database');
	}
	//----------------------Update Kategori------------------------------

	public function Update_Karyawan()
	{
		$KaryawanModel = new \App\Models\KaryawanModel();
		$ID_KRY = $this->request->getVar('ID_KRY');
		$PW_KRY = $this->request->getVar('PW_KRY');
		$NAMA_KRY = $this->request->getVar('NAMA_KRY');
		$JK = $this->request->getVar('JK');
		$JABATAN_KRY = $this->request->getVar('JABATAN_KRY');
		$NO_TELP_KRY = $this->request->getVar('NO_TELP_KRY');
		$ALAMAT_KRY = $this->request->getVar('ALAMAT_KRY');
		$TEMPAT_LAHIR = $this->request->getVar('TEMPAT_LAHIR');
		$TGL_LAHIR_KRY = $this->request->getVar('TGL_LAHIR_KRY');

		// $vi = "
		// UPDATE Karyawan <br>
		// SET KODE_JABATAN = '$JABATAN_KRY', NAMA_KRY= '$NAMA_KRY', NO_TELP_KRY = '$NO_TELP_KRY ', ALAMAT_KRY = '$ALAMAT_KRY', JK_KRY = '$JK', TGL_LAHIR_KRY = '$TGL_LAHIR_KRY', TEMPAT_LAHIR = '$TEMPAT_LAHIR', PW_KRY = '$PW_KRY '<br>
		// WHERE ID_KRY = $ID_KRY;";

		// echo $vi;

		$KaryawanModel->query("
		UPDATE Karyawan
		SET KODE_JABATAN = '$JABATAN_KRY', NAMA_KRY= '$NAMA_KRY', NO_TELP_KRY = '$NO_TELP_KRY ', ALAMAT_KRY = '$ALAMAT_KRY', JK_KRY = '$JK', TGL_LAHIR_KRY = '$TGL_LAHIR_KRY', TEMPAT_LAHIR = '$TEMPAT_LAHIR', PW_KRY = '$PW_KRY '
		WHERE ID_KRY = '$ID_KRY';");


		session()->setFlashdata('pesan_Update', 'Data Berhasil Dirubah.');
		return redirect()->to("/Database/Karyawan/Detail/$ID_KRY");
	}

	//----------------------Hapus Kategori------------------------------

	public function Hapus_Karyawan($slug)
	{
		$KaryawanModel = new \App\Models\KaryawanModel();
		// pengecekan penggunaan jabatan di tabel lain
		$v1 = $KaryawanModel->query("SELECT COUNT(ID_KRY) as Penggunaan FROM transaksi_penjualan WHERE ID_KRY = '$slug';");
		foreach ($v1->getResultArray() as $Cek_Penggunaan) {
		}
		if ($Cek_Penggunaan['Penggunaan'] > 0) {
			session()->setFlashdata('pesan_hapus', 'Data Tidak Dapat Di Hapus Karena Di Gunakan DI Tabel Lain');
			return redirect()->to("/Database/Karyawan/Detail/$slug");
		} else {
			$KaryawanModel->query("DELETE FROM Karyawan WHERE ID_KRY = '$slug'");
			session()->setFlashdata('pesan_hapus', 'Data Berhasil Dihapus.');
			return redirect()->to("/Database");
		}
	}

	// ----------------------------------------------------------------
	// ----------------------------------------------------------------

	public function Obat()
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
			'title' => 'Master Obat | Apotik Kita',
			'Obat' => $Obat,
			'Jumlah_Obat' => $vi['Jumlah_Obat'],
			'Jenis_Obat' => $Jenis_Obat,
			'Kategori_Obat' => $Kategori_Obat
		];

		echo view('/Layout/Heading', $data);
		echo view('/Database/Halaman/View_Obat');
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
		return redirect()->to('/Database/Obat');
	}

	//----------------------Detail Obat------------------------------

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

		echo view('/Layout/Heading', $data);
		echo view('/Database/Halaman/View_Detail_Stok_Obat');
	}

	//----------------------Hapus Obat------------------------------

	public function Hapus_Obat($slug)
	{
		$KaryawanModel = new \App\Models\KaryawanModel();
		// pengecekan penggunaan jabatan di tabel lain
		$v1 = $KaryawanModel->query("SELECT COUNT(KODE_OBAT) as Penggunaan FROM detail_penjualan WHERE KODE_OBAT = '$slug';");
		foreach ($v1->getResultArray() as $Cek_Penggunaan) {
		}
		if ($Cek_Penggunaan['Penggunaan'] > 0) {
			session()->setFlashdata('pesan_hapus', 'Data Tidak Dapat Di Hapus Karena Di Gunakan DI Tabel Lain');
			return redirect()->to("/Database/Obat/Detail/$slug");
		} else {
			$KaryawanModel->query("DELETE FROM obat WHERE KODE_OBAT = '$slug';");
			session()->setFlashdata('pesan_hapus', 'Data Berhasil Dihapus.');
			return redirect()->to("/Database/Obat");
		}
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
		return redirect()->to("/Database/Obat/Detail/$KODE_OBAT");
	}

	//----------------------Tansaksi------------------------------

	public function Transaksi()
	{
		$TransaksiModel = new \App\Models\TransaksiModel();
		$Transaksi = $TransaksiModel->query("SELECT DATE_FORMAT(tp.TGL_TRANSAKSI, '%m %M %Y')as 'TGL_TRANSAKSI',k.ID_KRY,k.NAMA_KRY,tp.ID_TRANSAKSI
		FROM transaksi_penjualan tp
		join karyawan k
		on tp.ID_KRY = k.ID_KRY
		ORDER BY TGL_TRANSAKSI desc");
		$data = [
			'title' => 'Master Transaksi | Apotik Kita',
			'Transaksi' => $Transaksi,
		];

		echo view('/Layout/Heading', $data);
		echo view('/Database/Halaman/View_Transaksi');
	}

	//----------------------Detail Tansaksi------------------------------

	public function Detail_Transaksi($slug)
	{

		$TransaksiModel = new \App\Models\TransaksiModel();
		$Transaksi = $TransaksiModel->query("SELECT tp.ID_TRANSAKSI,k.NAMA_KRY,DATE_FORMAT(tp.TGL_TRANSAKSI, '%m %M %Y')as 'TGL_TRANSAKSI',dp.ID_DP,dp.KODE_OBAT,dp.JUMLAH_PEMBELIAN,o.NAMA_OBAT,o.HARGA_OBAT,o.KODE_KATEGORI
		FROM transaksi_penjualan tp
		join karyawan k
		on tp.ID_KRY = k.ID_KRY
		join detail_penjualan dp
		on tp.ID_TRANSAKSI = dp.ID_TRANSAKSI
		join obat o 
		on o.KODE_OBAT = dp.KODE_OBAT		
		WHERE tp.ID_TRANSAKSI = '$slug'
		ORDER BY TGL_TRANSAKSI desc;");

		$Total_Transaksi = $TransaksiModel->query("SELECT SUM(o.HARGA_OBAT) as total_pembelian,SUM(dp.JUMLAH_PEMBELIAN) as total_item
		FROM transaksi_penjualan tp
		join karyawan k
		on tp.ID_KRY = k.ID_KRY
		join detail_penjualan dp
		on tp.ID_TRANSAKSI = dp.ID_TRANSAKSI
		join obat o 
		on o.KODE_OBAT = dp.KODE_OBAT		
		WHERE tp.ID_TRANSAKSI = '$slug'");

		foreach ($Transaksi->getResultArray() as $vi) {
		}
		$ID_TRANSAKSI = $vi['ID_TRANSAKSI'];
		$NAMA_KRY = $vi['NAMA_KRY'];
		$TGL_TRANSAKSI = $vi['TGL_TRANSAKSI'];
		$data = [
			'title' => 'Staf Gudang | Apotik Kita',
			'Transaksi' => $Transaksi,
			'Total_Transaksi' => $Total_Transaksi,
			'ID_TRANSAKSI' => $ID_TRANSAKSI,
			'NAMA_KRY' => $NAMA_KRY,
			'TGL_TRANSAKSI' => $TGL_TRANSAKSI
		];

		echo view('/Layout/Heading', $data);
		echo view('/Database/Halaman/View_Transaksi_Detail');
	}
}
