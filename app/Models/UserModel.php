<?php namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table  = 'users';
    protected $primaryKey = 'id';
    // protected $returnType     = 'array';
    // protected $useSoftDeletes = true;
    // protected $deletedField  = 'deleted_at';
    // protected $validationRules    = [];
    // protected $validationMessages = [];
    // protected $skipValidation     = false;
    protected $allowedFields = ['name', 'email', 'password', 'updated_at'];
    // protected $useTimestamps = true;
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    protected $beforeUpdate = ['beforeUpdate'];
    protected $beforeInsert = ['beforeInsert'];

    protected function beforeInsert(array $data)
    {
        $data = $this->passwordHash($data);

        return $data;
    }

    protected function beforeUpdate(array $data)
    {
        $data = $this->passwordHash($data);

        return $data;
    }

    protected function passwordHash(array $data)
    {
        if (isset($data['data']['password'])) {
            $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
        }
        return $data;
    }

}