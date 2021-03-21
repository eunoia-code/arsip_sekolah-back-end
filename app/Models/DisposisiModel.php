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

    public function getDataDisposisiDetail($id) {
        $query = $this->db->table('disposisi d');
        $query->select('*');        
        $query->join('surat_masuk', 'surat_masuk.id_surat_masuk = d.id_surat_masuk');
        $query->where('d.tujuan', $id);
        return $query->get();
    }
}