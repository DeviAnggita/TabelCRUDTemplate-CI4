<?php

namespace App\Models;

use CodeIgniter\Model;

class MahasiswaModel extends Model
{
    protected $table      = 'mahasiswa';
    protected $primaryKey = 'id';
    /*
    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['name', 'email'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
    */

    public function saveMhs($data)
    {
        return $this->db->table($this->table)->insert($data); //->query builder
    }

    public function update_data($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['id' => $id]);
    }

    
    public function delete_data($id)
    {
        return $this->db->table($this->table)->delete(['id' => $id]);
    }


    public function getMhs($id = "")
    {
        if ($id == "") {
            return $this->findAll();
        } else {
            return $this->where(['id' => $id])->first();
        }
    }
}