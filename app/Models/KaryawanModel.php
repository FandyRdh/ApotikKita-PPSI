<?php

namespace App\Models;

use CodeIgniter\Model;

class KaryawanModel extends Model
{
    protected $table      = 'karyawan';
    protected $primaryKey = 'ID_KRY';
    protected $allowedFields = ['ID_KRY', 'KODE_JABATAN', 'NAMA_KRY', 'NO_TELP_KRY', 'ALAMAT_KRY', 'JK_KRY', 'TGL_LAHIR_KRY', 'TEMPAT_LAHIR', 'TGL_DITERIMA_KERJA', 'PW_KRY'];
}
