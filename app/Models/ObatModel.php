<?php

namespace App\Models;

use CodeIgniter\Model;

class ObatModel extends Model
{
    protected $table      = 'obat';
    protected $primaryKey = 'KODE_OBAT';
    protected $allowedFields = ['KODE_OBAT', 'KODE_JENIS', 'KODE_KATEGORI', 'NAMA_OBAT', 'ATURAN_PENGGUNAAN', 'TGL_KADALUARSA', 'STOK_OBAT', 'HARGA_OBAT'];
}
