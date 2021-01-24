<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SuratMasuk extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_surat_masuk'          => [
					'type'           => 'VARCHAR',
					'constraint'     => 20,
			],
			'nomor_surat'       => [
					'type'           => 'VARCHAR',
					'constraint'     => '100',
			],
			'asal_surat'       => [
					'type'           => 'VARCHAR',
					'constraint'     => '100',
			],
			'isi_surat' => [
					'type'           => 'TEXT',
					'null'           => false,
			], 
			'tanggal_surat'       => [
					'type'           => 'DATE',
					'null'			 => true,
			],
			'user'       => [
					'type'           => 'VARCHAR',
					'constraint'	 => '100',
			],
		]);
		$this->forge->addKey('id_surat_masuk', true);
		$this->forge->createTable('surat_masuk');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('surat_masuk');
	}
}
