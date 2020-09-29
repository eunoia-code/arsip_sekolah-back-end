<?php namespace App\Models;
  
use CodeIgniter\Model;
  
class UserModel extends Model
{
    protected $table = "user";
    protected $primaryKey = 'id_user';
    protected $allowedFields = [
        'id_user',
        'username',
        'password'
    ];

    public function checkLogin($username, $password) {
        $query = $this->db->table('user')->where(['username' => $username, 'password' => $password]);
        return $query->countAllResults();
    }
}