<?php

namespace App\Models;

use CodeIgniter\Model;

class DetailPenjualanModel extends Model
{
    protected $table      = 'detail_penjualan';
    protected $primaryKey = 'ID_DP';
    protected $allowedFields = ['ID_DP', 'ID_TRANSAKSI', 'KODE_OBAT', 'JUMLAH_PEMBELIAN'];
}
