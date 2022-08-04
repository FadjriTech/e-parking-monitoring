<?php

namespace App\Models;

use CodeIgniter\Model;

class ParkirModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tb_parking';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['grup', 'position', 'model_code', 'license_plate', 'status', 'lokasi', 'created_at', 'updated_at'];
    protected $useTimestamps    = true;
    protected $builder;

    public function __construct()
    {
        $db      = \Config\Database::connect();
        $this->builder = $db->table($this->table);
    }

    public function _getAllParkirByLocation($location)
    {
        return $this->builder->select('*')->where('lokasi', $location)->orderBy('grup')->orderBy('position')->get()->getResultArray();
    }

    public function _getListParkirGrup($grup)
    {
        return $this->builder->select('*')->where('grup', $grup)->orderBy('grup')->orderBy('position')->get()->getResultArray();
    }
}
