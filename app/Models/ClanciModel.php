<?php namespace App\Models;

use CodeIgniter\Model;

class ClanciModel extends Model
{
    protected $table  = 'clanci';
    protected $primaryKey = 'clanak_id';
    // protected $returnType     = 'array';
    // protected $useSoftDeletes = true;
    // protected $deletedField  = 'deleted_at';
    // protected $validationRules    = [];
    // protected $validationMessages = [];
    // protected $skipValidation     = false;
    protected $allowedFields = ['naslov', 'tekst', 'img_file', 'updated_at'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';



}