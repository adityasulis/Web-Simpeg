<?php

namespace App\Controllers;

use App\Models\daftarModel;
use App\Models\pendidikanModel;
use App\Models\keluargaModel;
use App\Models\pangkatModel;
use App\Models\jabatanModel;
use App\Models\pendidikannonModel;

class User extends BaseController

{
    public function __construct()
    {
        $this->daftarModel = new daftarModel();
        $this->pendidikanModel = new pendidikanModel();
        $this->keluargaModel = new keluargaModel();
        $this->pangkatModel = new pangkatModel();
        $this->jabatanModel = new jabatanModel();
        $this->pendidikannonModel = new pendidikannonModel();
    }
    public function index()

    {
        $data = [
            'title' => 'PROFIL SAYA'
        ];

        return view('users/index', $data);
    }

    public function dashboard()
    {
        $data = [
            'title' => 'DASHBOARD PEGAWAI',
            'identitas' => $this->daftarModel->getDashboarddata(),
            'pendidikan' => $this->pendidikanModel->getDashboardpend(),
            'keluarga' => $this->keluargaModel->getDashboardkel(),
            'pangkat' => $this->pangkatModel->getDashboardpang(),
            'jabatan' => $this->jabatanModel->getDashboarjab(),
            'nonformal' => $this->pendidikannonModel->getDashboardpendnon()

        ];

        return view('users/dashboard', $data);
    }
}
