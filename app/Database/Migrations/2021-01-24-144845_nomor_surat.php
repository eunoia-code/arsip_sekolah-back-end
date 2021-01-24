<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class NomorSurat extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_nomor_surat'          => [
					'type'           => 'VARCHAR',
					'constraint'     => 20,
			],
			'nomor_agenda'       => [
					'type'           => 'VARCHAR',
					'constraint'     => '100',
			]
		]);
		$this->forge->addKey('id_nomor_Surat', true);
		$this->forge->createTable('nomor_surat');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('nomor_surat');
	}
}
