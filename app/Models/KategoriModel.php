<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriModel extends Model
{
    protected $table      = 'kategori_obat';
    protected $primaryKey = 'KODE_KATEGORI';
    protected $allowedFields = ['KODE_KATEGORI', 'NAMA_KATEGORI'];
}
