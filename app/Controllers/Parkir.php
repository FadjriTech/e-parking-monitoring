<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ParkirModel;

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
}
