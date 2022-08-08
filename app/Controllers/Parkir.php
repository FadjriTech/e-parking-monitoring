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

        $listModel = $this->parkir->_getListModel();
        $data  = [
            'grupA' => $grupA,
            'grupB' => $grupB,
            'grupC' => $grupC,
            'grupD' => $grupD,
            'grupE' => $grupE,
            'grupF' => $grupF,
            'model' => $listModel
        ];

        return view('pages/main', $data);
    }

    public function get_detail()
    {
        if ($this->request->isAJAX()) {
            if (isset($_POST['grup']) && isset($_POST['posisi'])) {
                $data   = $this->parkir->_getParkirDetail($_POST['posisi'], $_POST['grup']);
                return json_encode(array(
                    'data'  => $data,
                    'code'  => 200
                ));
            }
        }
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
                'model_code' => $dataAwal['model_code'],
                'license_plate' => $dataAwal['license_plate'],
            ));
        }
    }

    public function tambah_parkir()
    {
        if (!$this->validate([
            'nopol' => 'required',
            'model' => 'required'
        ])) return $this->validator->listErrors();

        $grup    = $_POST['grup'];
        $posisi  = $_POST['posisi'];
        $nopol   = $_POST['nopol'];
        $model   = $_POST['model'];
        $status  = $_POST['status'];
        $lokasi  = $_POST['lokasi'];

        $data    = [
            'grup'          => $grup,
            'position'      => $posisi,
            'model_code'    => $model,
            'license_plate' => $nopol,
            'status'        => $status,
            'lokasi'        => $lokasi
        ];

        if (isset($_POST['id'])) {
            $data['id'] = $_POST['id'];
        }

        $insert = $this->parkir->save($data);
        if ($insert) {
            if ($lokasi == "DEPAN") {
                return redirect()->to(base_url());
            }
        }
    }

    public function delete_parkir()
    {
        if ($this->request->isAJAX()) {
            if (isset($_POST['posisi']) && isset($_POST['grup'])) {
                $posisi = $_POST['posisi'];
                $grup   = $_POST['grup'];

                $delete = $this->parkir->_deleteParkir($posisi, $grup);
                if ($delete) {
                    return json_encode(array(
                        'message' => 'Berhasil di hapus',
                        'code'    => 200
                    ));
                }
            }
        }
    }
}
