<?php

namespace App\Models;

use CodeIgniter\Model;

class ParkirModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tb_parking';
    protected $allowedFields    = ['grup', 'position', 'model_code', 'license_plate', 'status', 'lokasi', 'created_at', 'updated_at'];
    protected $useTimestamps    = true;

    public function __construct()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table($this->table);
    }

    public function _getListModel()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table("tb_model_kendaraan");
        return $builder->select('*')->get()->getResultArray();
    }

    public function _getAllParkirByLocation($location)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table($this->table);
        return $builder->select('*')->where('lokasi', $location)->orderBy('grup')->orderBy('position')->get()->getResultArray();
    }

    public function _getListParkirGrup($grup)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table($this->table);
        return $builder->select('*')->where('grup', $grup)->orderBy('grup')->orderBy('position')->get()->getResultArray();
    }

    public function _getParkirDetail($posisi, $grup)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table("tb_model_kendaraan");
        return $builder->select('*')->join('tb_parking', 'tb_parking.model_code = tb_model_kendaraan.model_code', 'LEFT')->where('grup', $grup)->where('position', $posisi)->get()->getFirstRow();
    }

    public function _deleteParkir($posisi, $grup)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table($this->table);
        return $builder->where('position', $posisi)->where('grup', $grup)->delete();
    }
}
