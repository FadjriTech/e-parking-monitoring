<?php

namespace App\Models;

use CodeIgniter\Model;

class HistoryModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tb_history';
    protected $allowedFields    = ['grup', 'position', 'others', 'jenis_parkir', 'model_code', 'license_plate', 'category', 'status', 'lokasi', 'created_at', 'updated_at'];
    protected $useTimestamps    = true;

    public function _deleteParkir($posisi, $grup, $date)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table($this->table);
        return $builder->where('position', $posisi)->where('grup', $grup)->where('DATE(created_at)', $date)->delete();
    }
}
