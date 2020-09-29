<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Referensi extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_referensi'          => [
					'type'           => 'VARCHAR',
					'constraint'     => 20,
			],
			'kode'       => [
					'type'           => 'VARCHAR',
					'constraint'     => '3',
			],
			'nama'       => [
					'type'           => 'VARCHAR',
					'constraint'     => '25',
			],
			'uraian'       => [
				'type'           => 'VARCHAR',
				'constraint'	 => '100',
			],
			'user'       => [
					'type'           => 'VARCHAR',
					'constraint'	 => '100',
			],
		]);
		$this->forge->addKey('id_referensi', true);
		$this->forge->createTable('referensi');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('referensi');
	}
}
