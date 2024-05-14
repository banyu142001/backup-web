<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthModel extends Model
{
    protected $table            = 'user';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['nama', 'username', 'email', 'password', 'foto', 'level', 'alamat'];

    // Dates
    protected $useTimestamps = true;


    // select dat auser
    public function userDataAuth($username)
    {

        return $this->where(['username' => $username])->first();
    }
}
