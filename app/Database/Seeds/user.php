<?php namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class User extends Seeder
{
	public function run()
	{
		$data = [
			[
				'id_user' => uniqid(),
				'username'    => 'admin',
				'name'	=> 'Admin',
				'password' => sha1(md5("password")),
				'level' => 1
			],
			[
				'id_user' => uniqid(),
				'username'    => 'staff',
				'name'	=> 'Staff',
				'password' => sha1(md5("password")),
				'level' => 1
			],
			[
				'id_user' => uniqid(),
				'username'    => 'sekdis',
				'name'    => 'Sekertaris Dinas',
				'password' => sha1(md5("password")),
				'level' => 1
			],
			[
				'id_user' => uniqid(),
				'username'    => 'kadis',
				'name'    => 'Kepala Dinas',
				'password' => sha1(md5("password")),
				'level' => 1
			],
			[
				'id_user' => uniqid(),
				'username'    => 'user',
				'name'    => 'Pengguna Umum',
				'password' => sha1(md5("password")),
				'level' => 2
			]
		];

		foreach ($data as $value) {
			$this->db->table('user')->insert($value);
		}

	}
}
