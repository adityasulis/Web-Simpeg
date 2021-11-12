<?php

namespace App\Controllers;

use App\Models\daftarModel;
use App\Models\pendidikanModel;
use App\Models\keluargaModel;
use App\Models\pangkatModel;
use App\Models\jabatanModel;
use App\Models\pendidikannonModel;
use App\Models\userLinkedModel;

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
        $this->userLinkedModel = new userLinkedModel();
    }
    public function index($id = 0)

    {
        $data = [
            'title' => 'PROFIL SAYA',
            'daftar' => $this->daftarModel->getAkun(),
            'unit' => $this->jabatanModel->getUnitKerja()
            // 'user_linked' => $this->userLinkedModel->getUserLinked()
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
            'nonformal' => $this->pendidikannonModel->getDashboardpendnon(),
            'unit' => $this->jabatanModel->getUnitKerja()

        ];

        return view('users/dashboard', $data);
    }
}
