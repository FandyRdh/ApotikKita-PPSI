<?php

namespace App\Models;

use CodeIgniter\Model;

class JenisModel extends Model
{
    protected $table      = 'jenis_obat';
    protected $primaryKey = 'KODE_JENIS';
    protected $allowedFields = ['KODE_JENIS', 'NAMA_JENIS'];
}
