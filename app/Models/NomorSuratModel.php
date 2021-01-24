<?php namespace App\Models;
  
use CodeIgniter\Model;
  
class NomorSuratModel extends Model
{
    protected $table = "nomor_surat";
    protected $primaryKey = 'id_nomor_surat';
    protected $allowedFields = [
        'id_nomor_surat',
        'nomor_agenda',
    ];
}