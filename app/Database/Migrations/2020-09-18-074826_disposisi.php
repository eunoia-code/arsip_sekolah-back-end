<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Disposisi extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_disposisi'          => [
					'type'           => 'VARCHAR',
					'constraint'     => 20,
			],
			'tujuan'       => [
					'type'           => 'VARCHAR',
					'constraint'     => '100',
			],
			'isi_disposisi'       => [
					'type'           => 'TEXT'
			],
			'sifat' => [
					'type'           => 'VARCHAR',
					'constraint'     => '100',
			],
			'catatan' => [
				'type'           => 'VARCHAR',
				'constraint'     => '100',
			],  
			'batas_waktu'       => [
					'type'           => 'DATE',
					'null'			 => true,
			],
			'id_surat_masuk'       => [
				'type'           => 'VARCHAR',
				'constraint'	 => '20',
			],  
			'user'       => [
					'type'           => 'VARCHAR',
					'constraint'	 => '100',
			],
		]);
		$this->forge->addKey('id_disposisi', true);
		$this->forge->addForeignKey('id_surat_masuk','surat_masuk','id_surat_masuk','CASCADE','CASCADE');
		$this->forge->createTable('disposisi');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('disposisi');
	}
}
