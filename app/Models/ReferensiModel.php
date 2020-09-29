<?php namespace App\Models;
  
use CodeIgniter\Model;
  
class ReferensiModel extends Model
{
    protected $table = "referensi";
    protected $primaryKey = 'id_referensi';
    protected $allowedFields = [
        'id_referensi',
        'kode',
        'nama',
        'uraian',
        'user'
    ];
}