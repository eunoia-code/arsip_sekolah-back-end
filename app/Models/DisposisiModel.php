<?php namespace App\Models;
  
use CodeIgniter\Model;
  
class DisposisiModel extends Model
{
    protected $table = "disposisi";
    protected $primaryKey = 'id_disposisi';
    protected $allowedFields = [
        'id_disposisi',
        'tujuan',
        'isi_disposisi',
        'sifat',
        'catatan',
        'batas_waktu',
        'id_surat_masuk',
        'user'
    ];
}