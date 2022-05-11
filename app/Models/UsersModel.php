<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $allowedFields = [
        'first_name',
        'last_name',
        'email',
        'role',
        'date_created'
    ];

    // Dates
    protected $createdField = 'date_created';

    public function getUsers()
    {
        return $this->findAll();
    }

    public function getUser($id)
    {
        return $this->where('id', $id)->first();
    }

    public function getColumnNames()
    {
        return $this->db->getFieldNames('users');
    }
}
