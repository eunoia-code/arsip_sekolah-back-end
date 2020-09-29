<?php namespace App\Models;
  
use CodeIgniter\Model;
  
class CountDataModel extends Model
{
    public function getReferensiCount() {
        return $this->db->table('referensi')->countAllResults();
    }

    public function getSuratMasukCount() {
        return $this->db->table('surat_masuk')->countAllResults();
    }

    public function getSuratKeluarCount() {
        return $this->db->table('surat_keluar')->countAllResults();
    }

    public function getDisposisiCount() {
        return $this->db->table('disposisi')->countAllResults();
    }
}