<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'view_user_department';
    protected $primaryKey = 'id';
    protected $returnType = 'App\Entities\User';
    protected $useTimestamps = false;

    public function getUsers()
    {
        return $this->findAll();
    }
}
