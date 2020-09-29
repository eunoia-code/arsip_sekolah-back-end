<?php namespace App\Models;
  
use CodeIgniter\Model;
  
class SuratMasukModel extends Model
{
    protected $table = "surat_masuk";
    protected $primaryKey = 'id_surat_masuk';
    protected $allowedFields = [
        'id_surat_masuk',
        'nomor_surat',
        'asal_surat',
        'isi_surat',
        'tanggal_surat',
        'user'
    ];
}