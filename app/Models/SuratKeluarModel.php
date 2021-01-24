<?php namespace App\Models;
  
use CodeIgniter\Model;
  
class SuratKeluarModel extends Model
{
    protected $table = "surat_keluar";
    protected $primaryKey = 'id_surat_keluar';
    protected $allowedFields = [
        'id_surat_keluar',
        'nomor_surat',
        'perihal',
        'tempat',
        'waktu',
        'tujuan',
        'isi_surat',
        'tanggal_surat',
        'user'
    ];
}