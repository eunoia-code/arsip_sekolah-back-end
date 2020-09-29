<?php namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class User extends Seeder
{
	public function run()
	{
		$data = [
			'id_user' => uniqid(),
			'username'    => 'admin',
			'password' => sha1(md5(base64_encode("admin")))
		];

	$this->db->table('user')->insert($data);
	}
}
