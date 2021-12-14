<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{
    protected $table      = 'transaksi_penjualan';
    protected $primaryKey = 'ID_TRANSAKSI';
    protected $allowedFields = ['ID_TRANSAKSI', 'ID_KRY', 'TGL_TRANSAKSI'];
}
