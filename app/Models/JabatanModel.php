<?php

namespace App\Models;

use CodeIgniter\Model;

class JabatanModel extends Model
{
    protected $table      = 'jabatan';
    protected $primaryKey = 'KODE_JABATAN';
    protected $allowedFields = ['KODE_JABATAN', 'NAMA_JABATAN'];
}
