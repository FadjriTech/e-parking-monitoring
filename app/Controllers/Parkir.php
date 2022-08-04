<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ParkirModel;
use PDO;

class Parkir extends BaseController
{
    protected $parkir;

    public function __construct()
    {
        $this->parkir = new ParkirModel();
    }

    public function index()
    {
        $parkirGroups  = range('A', 'F');
        $parkir = $this->parkir->_getAllParkirByLocation("DEPAN");

        $grupA = array();
        $grupB = array();
        $grupC = array();
        $grupD = array();
        $grupE = array();
        $grupF = array();

        foreach ($parkirGroups as $grup) {
            $keys = array_keys(array_combine(array_keys($parkir), array_column($parkir, 'grup')), $grup);
            foreach ($keys as $data) {
                array_push(${"grup" . $grup}, $parkir[$data]);
            }
        }

        $data  = [
            'grupA' => $grupA,
            'grupB' => $grupB,
            'grupC' => $grupC,
            'grupD' => $grupD,
            'grupE' => $grupE,
            'grupF' => $grupF
        ];

        return view('pages/main', $data);
    }


    public function update_posisi()
    {
        $grup      = '';
        $posisi    = '';
        $newGrup   = '';
        $newPosisi = '';

        if (isset($_POST['grup'])) {
            $grup = $_POST['grup'];
        }

        if (isset($_POST['posisi'])) {
            $posisi = $_POST['posisi'];
        }

        if (isset($_POST['newGrup'])) {
            $newGrup = $_POST['newGrup'];
        }

        if (isset($_POST['newPosisi'])) {
            $newPosisi = $_POST['newPosisi'];
        }

        $dataAwal = $this->parkir->select('*')->where('grup', $grup)->where('position', $posisi)->get()->getRowArray();
        $update   = $this->parkir->set('position', $newPosisi)->set('grup', $newGrup)->where('id', $dataAwal['id'])->update();
        if ($update) {
            return json_encode(array(
                'model_code' => $dataAwal['model_code']
            ));
        }
    }
}
