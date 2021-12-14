<?php

namespace App\Controllers;

class Laporan_Page extends BaseController
{
	public function Laporan()
	{
		$data = [
			'title' => 'Laporan | Apotik Kita'
		];

		echo view('/Layout/Heading', $data);
		echo view('/Laporan/Halaman/Laporan');
	}

	//--------------------------------------------------------------------
	public function Laporan_Karyawan()
	{
		$KaryawanModel = new \App\Models\KaryawanModel();
		$Karyawan = $KaryawanModel->query("SELECT K.NAMA_KRY,K.NO_TELP_KRY,JK_KRY, DATE_FORMAT(sysdate(), '%Y') - DATE_FORMAT(TGL_LAHIR_KRY, '%Y') as 'Umur',DATE_FORMAT(K.TGL_DITERIMA_KERJA, '%m %M %Y')as 'TGL_DITERIMA_KERJA',NAMA_JABATAN
		FROM karyawan K
		JOIN jabatan J
		ON K.KODE_JABATAN = J.KODE_JABATAN");
		$data = [
			'Karyawan' => $Karyawan
		];

		echo view('/Laporan/Halaman/Laporan_Karyawan', $data);
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

		echo view('/Laporan/Halaman/Laporan_Obat', $data);
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

		echo view('/Laporan/Halaman/Laporan_Penjualan', $data);
	}
}
