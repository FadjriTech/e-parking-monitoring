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
        $capacity     = $this->parkir->_getCapacity();
        $parkirExist  = $this->parkir->_getParkirExist();
        $status       = array();

        foreach ($capacity as $key => $element) {
            $sisa = $element - $parkirExist[$key];
            if ($sisa >= 10) {
                $status[$key] = 'free';
            } else if ($sisa <= 10 && $sisa > 0) {
                $status[$key] = 'almost full';
            } else if ($sisa == 0) {
                $status[$key] = 'full';
            }
        }

        $data = [
            'lokasi'    => '',
            'capacity'  => $capacity,
            'exist'     => $parkirExist,
            'status'    => $status
        ];
        return view('pages/main', $data);
    }

    public function depan()
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
            'grupA'         => $grupA,
            'grupB'         => $grupB,
            'grupC'         => $grupC,
            'grupD'         => $grupD,
            'grupE'         => $grupE,
            'grupF'         => $grupF,
            'model'         => $listModel,
            'lokasi'        => 'DEPAN',
            'controller'    => $this
        ];
        return view('pages/depan', $data);
    }


    public function cari_parkir(array $array, int $position)
    {
        $key = array_search($position, array_column($array, 'position'));
        return $key;
    }

    public function stall_bp()
    {
        $parkirGroups  = range('G', 'J');
        $parkir = $this->parkir->_getAllParkirByLocation("STALL_BP");

        $grupG = array();
        $grupH = array();
        $grupI = array();
        $grupJ = array();

        foreach ($parkirGroups as $grup) {
            $keys = array_keys(array_combine(array_keys($parkir), array_column($parkir, 'grup')), $grup);
            foreach ($keys as $data) {
                array_push(${"grup" . $grup}, $parkir[$data]);
            }
        }

        $listModel = $this->parkir->_getListModel();
        $data = [
            'lokasi' => 'BP',
            'grupG'  => $grupG,
            'grupH'  => $grupH,
            'grupI'  => $grupI,
            'grupJ'  => $grupJ,
            'model'  => $listModel
        ];
        return view('pages/stall_bp', $data);
    }

    public function stall_gr()
    {
        $parkirGroups  = range('K', 'M');
        $parkir = $this->parkir->_getAllParkirByLocation("STALL_GR");

        $grupK = array();
        $grupL = array();
        $grupM = array();

        foreach ($parkirGroups as $grup) {
            $keys = array_keys(array_combine(array_keys($parkir), array_column($parkir, 'grup')), $grup);
            foreach ($keys as $data) {
                array_push(${"grup" . $grup}, $parkir[$data]);
            }
        }

        $listModel = $this->parkir->_getListModel();
        $data = [
            'lokasi' => 'GR',
            'grupK'  => $grupK,
            'grupL'  => $grupL,
            'grupM'  => $grupM,
            'model'  => $listModel
        ];
        return view('pages/stall_gr', $data);
    }

    public function login()
    {
        $data = [
            'lokasi' => ''
        ];
        return view('pages/login', $data);
    }

    public function authentication()
    {
        $email = $_POST['email'];
        $pass  = $_POST['password'];

        $user  = $this->parkir->_getUserByEmail($email);
        if (!$user) {
            return json_encode(array(
                'message'  => 'Email tidak ditemukan',
                'code'     => 404
            ));
        } else {
            if ($pass != $user['password']) {
                return json_encode(array(
                    'message'  => 'Password tidak Match',
                    'code'     => 401
                ));
            } else {


                $session = session();
                $user    = [
                    'logged_in' => true,
                    'email'     => $email
                ];

                $session->set('user', $user);

                return json_encode(array(
                    'message'  => 'Login Success',
                    'code'     => 200
                ));
            }
        }
    }




    //------ Non pages function

    public function get_detail()
    {
        if ($this->request->isAJAX()) {
            if (isset($_POST['grup']) && isset($_POST['posisi'])) {
                $data   = $this->parkir->_getParkirDetail($_POST['posisi'], $_POST['grup']);
                if ($data) {
                    return json_encode(array(
                        'data'      => $data,
                        'code'      => 200,
                        'message'   => "Berhasil mendapatkan data"
                    ));
                } else {
                    return json_encode(array(
                        'code'      => 404,
                        'message'   => 'Data tidak ditemukan'
                    ));
                }
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
        $data = $_POST['parking'];

        if (isset($_POST['id'])) {
            if ($_POST['id']) {
                $data['id'] = $_POST['id'];
            }
        }

        $save = $this->parkir->save($data);
        if ($save) {
            return json_encode(array(
                'code'      => 200,
                'message'   => "Data berhasil di simpan!",
                'data'      => $data
            ));
        } else {
            return json_encode(array(
                'code'      => 500,
                'message'   => "Database Error!"
            ));
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
                } else {
                    return json_encode(array(
                        'message' => 'Sistem Error',
                        'code'    => 500
                    ));
                }
            }
        }
    }
}
