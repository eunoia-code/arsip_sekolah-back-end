<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SuratKeluar extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_surat_keluar'          => [
					'type'           => 'VARCHAR',
					'constraint'     => 20,
			],
			'nomor_surat'       => [
					'type'           => 'VARCHAR',
					'constraint'     => '100',
			],
			'perihal'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '20',
			],
			'tujuan'       => [
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
			'tempat'       => [
				'type'           => 'VARCHAR',
				'constraint'	 => '20',
			],
			'waktu'       => [
				'type'           => 'VARCHAR',
				'constraint'	 => '20',
			],
			'user'       => [
					'type'           => 'VARCHAR',
					'constraint'	 => '100',
			],
		]);
		$this->forge->addKey('id_surat_keluar', true);
		$this->forge->createTable('surat_keluar');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('surat_keluar');
	}
}
