<?php namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class NomorSurat extends Seeder
{
	public function run()
	{
		$data = [
			'id_nomor_surat' => '428',
			'nomor_agenda'    => '0'
		];

		$this->db->table('nomor_surat')->insert($data);
	}
}
