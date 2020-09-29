<?php 

namespace App\Database\Seeds;
use CodeIgniter\I18n\Time;

class SuratMasukSeeder extends \CodeIgniter\Database\Seeder
{
        public function run()
        {
                $data = [
                        'id_surat_masuk' => uniqid(),
                        'nomor_surat'    => '2019/IX/S-12',
                        'asal_surat'     => 'CV. Ceveceve',
                        'isi_surat'     => 'ha haha haha halo',
                        'tanggal_surat' => (Time::now())->toDateString(),
                        'user'          => 'admin'
                ];

                $this->db->table('surat_masuk')->insert($data);
        }
}