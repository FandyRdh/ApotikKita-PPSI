<?php

namespace App\Controllers;

class Kasir_Page extends BaseController
{
	public function Stok_Obat()
	{
		$ObatModel = new \App\Models\ObatModel();
		$Obat = $ObatModel->query("SELECT KODE_OBAT,NAMA_OBAT,
		CASE STOK_OBAT
		WHEN 0 THEN 'Stok Obat Kosong'
		ELSE STOK_OBAT
		END as 'STOK_OBAT',HARGA_OBAT
		From obat;");
		$data = [
			'title' => 'Stok Obat | Apotik Kita',
			'Obat' => $Obat
		];

		echo view('/Layout_Kasir/Heading', $data);
		echo view('/Dashboard_Kasir/Halaman/Stok_Obat');
	}

	//--------------------------------------------------------------------
	public function Pembelian()
	{
		$ObatModel = new \App\Models\ObatModel();
		$Obat = $ObatModel->query("SELECT * FROM OBAT");
		$TransaksiModel = new \App\Models\TransaksiModel();
		$JumlahTransaksi = $TransaksiModel->query("select COUNT(ID_TRANSAKSI)'Jumlah_Transaksi'
		from transaksi_penjualan");
		foreach ($JumlahTransaksi->getResultArray() as $jt) {
		}
		$data = [
			'title' => 'Kasir | Apotik Kita',
			'Obat' => $Obat,
			'JumlahTransaksi' => $jt['Jumlah_Transaksi']
		];

		echo view('/Layout_Kasir/Heading', $data);
		echo view('/Dashboard_Kasir/Halaman/Pembelian');
	}
	//--------------------------------------------------------------------
	public function Save_Pembelian()
	{
		// create transaksi
		$ID_Tra = $this->request->getVar('ID_Tra');
		$ID_Kry = session()->get('ID_KRY');
		$TransaksiModel = new \App\Models\TransaksiModel();
		$TransaksiModel->query("INSERT INTO transaksi_penjualan (ID_TRANSAKSI, ID_KRY,TGL_TRANSAKSI)
		VALUES ('$ID_Tra', '$ID_Kry', 'sysdate()');");

		// create detail transaksi
		$DetailPenjualanModel = new \App\Models\DetailPenjualanModel();
		$Create_ID = $DetailPenjualanModel->query("select COUNT(ID_DP)'Jumlah_Penjualan'
		from detail_penjualan");
		foreach ($Create_ID->getResultArray() as $dp) {
		}
		$obt_1 = $dp['Jumlah_Penjualan'] + 1;
		$obt_2 = $dp['Jumlah_Penjualan'] + 2;
		$obt_3 = $dp['Jumlah_Penjualan'] + 3;

		$kd_obt_1 = $this->request->getVar('kd_obt_1');
		$jm_obt_1 = $this->request->getVar('jm_obt_1');
		$kd_obt_2 = $this->request->getVar('kd_obt_2');
		$jm_obt_2 = $this->request->getVar('jm_obt_2');
		$kd_obt_3 = $this->request->getVar('kd_obt_3');
		$jm_obt_3 = $this->request->getVar('jm_obt_3');


		$DetailPenjualanModel->query("INSERT INTO detail_penjualan (ID_DP, ID_TRANSAKSI,KODE_OBAT,JUMLAH_PEMBELIAN)
		VALUES ('DP0$obt_1', '$ID_Tra', '$kd_obt_1','$jm_obt_1')");
		$DetailPenjualanModel->query("INSERT INTO detail_penjualan (ID_DP, ID_TRANSAKSI,KODE_OBAT,JUMLAH_PEMBELIAN)
		VALUES ('DP0$obt_2', '$ID_Tra', '$kd_obt_2','$jm_obt_2')");
		$DetailPenjualanModel->query("INSERT INTO detail_penjualan (ID_DP, ID_TRANSAKSI,KODE_OBAT,JUMLAH_PEMBELIAN)
		VALUES ('DP0$obt_3', '$ID_Tra', '$kd_obt_3','$jm_obt_3')");
		session()->setFlashdata('pesan_Welcome', "Pembelian Obat Berhasil.");
		return redirect()->to('/Pembelian');
	}

	//--------------------------------------------------------------------
	public function Hitung()
	{
		$ID_Tra = $this->request->getVar('ID_Tra');
		// obt 1
		$obt_1 = $this->request->getVar('Obat-1');
		$pem_1 = $this->request->getVar('Jumlah-Pembelian-1');
		// obt 1
		$obt_2 = $this->request->getVar('Obat-2');
		$pem_2 = $this->request->getVar('Jumlah-Pembelian-2');
		// obt 1
		$obt_3 = $this->request->getVar('Obat-3');
		$pem_3 = $this->request->getVar('Jumlah-Pembelian-3');


		$ObatModel = new \App\Models\ObatModel();
		$o1 = $ObatModel->query("select KODE_OBAT,NAMA_OBAT,HARGA_OBAT,HARGA_OBAT*$pem_1 as'obat_1' from obat WHERE KODE_OBAT = '$obt_1'");
		$o2 = $ObatModel->query("select KODE_OBAT,NAMA_OBAT,HARGA_OBAT,HARGA_OBAT*$pem_2 as'obat_2' from obat WHERE KODE_OBAT = '$obt_2'");
		$o3 = $ObatModel->query("select KODE_OBAT,NAMA_OBAT,HARGA_OBAT,HARGA_OBAT*$pem_3 as'obat_3' from obat WHERE KODE_OBAT = '$obt_3'");
		foreach ($o1->getResultArray() as $obat_1) {
		}
		foreach ($o2->getResultArray() as $obat_2) {
		}
		foreach ($o3->getResultArray() as $obat_3) {
		}
		$TransaksiModel = new \App\Models\TransaksiModel();

		$data = [
			'title' => 'Kasir | Apotik Kita',
			'id_transaksi' => $ID_Tra,
			'o1' => $o1,
			'o2' => $o2,
			'o3' => $o3,
			'pem_1' => $pem_1,
			'pem_2' => $pem_2,
			'pem_3' => $pem_3,
			'Jum_Tagihan' => $obat_1['obat_1'] + $obat_2['obat_2'] + $obat_3['obat_3']
		];

		echo view('/Layout_Kasir/Heading', $data);
		echo view('/Dashboard_Kasir/Halaman/Pembayaran');
	}

	//--------------------------------------------------------------------

	public function Detail_Stok_Obat($slug)
	{

		$ObatModel = new \App\Models\ObatModel();
		$Obat = $ObatModel->query("SELECT O.KODE_OBAT,O.NAMA_OBAT,O.ATURAN_PENGGUNAAN,DATE_FORMAT(O.TGL_KADALUARSA, '%m/%M/%Y')as 'TGL_KADALUARSA',CASE O.STOK_OBAT
		WHEN 0 THEN 'Stok Obat Kosong'
		ELSE STOK_OBAT
		END as 'STOK_OBAT',O.HARGA_OBAT,KO.NAMA_KATEGORI,JO.NAMA_JENIS
		FROM Obat O
		JOIN kategori_obat KO
		ON O.KODE_KATEGORI = KO.KODE_KATEGORI
		JOIN jenis_obat JO
		ON O.KODE_JENIS = JO.KODE_JENIS
		WHERE KODE_OBAT = '$slug';");


		$data = [
			'title' => 'Detail Obat | Apotik Kita',
			'Obat' => $Obat
		];

		echo view('/Layout_Kasir/Heading', $data);
		echo view('/Dashboard_Kasir/Halaman/Detail_Stok_Obat');
	}

	//--------------------------------------------------------------------
	public function Search_Stok_Obat()
	{
		$Cari_Obat = $this->request->getVar('Cari-Obat');
		$ObatModel = new \App\Models\ObatModel();
		$Obat = $ObatModel->query("SELECT KODE_OBAT,NAMA_OBAT,
		CASE STOK_OBAT
		WHEN 0 THEN 'Stok Obat Kosong'
		ELSE STOK_OBAT
		END as 'STOK_OBAT',HARGA_OBAT
		From obat
		where NAMA_OBAT LIKE '$Cari_Obat%';");
		$data = [
			'title' => 'Stok Obat | Apotik Kita',
			'Obat' => $Obat
		];

		echo view('/Layout_Kasir/Heading', $data);
		echo view('/Dashboard_Kasir/Halaman/Stok_Obat');
	}

	//--------------------------------------------------------------------

	public function Laporan()
	{
		$data = [
			'title' => 'Kasir | Apotik Kita'
		];

		echo view('/Layout_Kasir/Heading', $data);
		echo view('/Dashboard_Kasir/Halaman/Laporan');
	}

	//--------------------------------------------------------------------
	public function Laporan_Penjualan()
	{
		$TransaksiModel = new \App\Models\TransaksiModel();
		$Transaksi = $TransaksiModel->query("
			SELECT TP.ID_TRANSAKSI,ID_DP,DATE_FORMAT(TGL_TRANSAKSI, '%m %M %Y')as 'TGL_TRANSAKSI',JUMLAH_PEMBELIAN,NAMA_OBAT,HARGA_OBAT
			FROM transaksi_penjualan TP
			JOIN detail_penjualan DP
			ON TP.ID_TRANSAKSI = DP.ID_TRANSAKSI
			JOIN obat O
			on O.KODE_OBAT = DP.KODE_OBAT;
			");
		$data = [
			'Transaksi' => $Transaksi
		];

		echo view('/Dashboard_Kasir/Halaman/Laporan_Penjualan', $data);
	}
}
