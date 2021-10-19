<?php

namespace App\Controllers;

use App\Models\daftarModel;
use App\Models\pendidikanModel;
use App\Models\keluargaModel;
use App\Models\pangkatModel;
use App\Models\jabatanModel;
use App\Models\pendidikannonModel;

class DaftarPeg extends BaseController
{
    protected $daftarModel;

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
        $currentPage = $this->request->getVar('page_identitaspeg') ? $this->request->getVar('page_identitaspeg') : 1;
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $data =  $this->daftarModel->search($keyword);
        } else {
            $data = $this->daftarModel;
        }


        $data = [
            'title' => 'DAFTAR PEGAWAI PT BPR BKK WONOGIRI (Perseroda)',
            // 'daftar' => $this->daftarModel->getDaftar()
            'daftar' => $data->orderBy('namapeg', 'asc')->paginate(20, 'identitaspeg'),
            'pager'  => $this->daftarModel->pager,
            'currentPage' => $currentPage
        ];

        return view('daftarPeg/index', $data);
    }

    public function detail($id)
    {

        $data = [
            'title' => 'DASHBOARD PEGAWAI PT BPR BKK WONOGIRI (Perseroda)',
            'daftar' => $this->daftarModel->getDaftar($id),
            'pendidikan' => $this->pendidikanModel->getPendidikan($id),
            'keluarga' => $this->keluargaModel->getKeluarga($id),
            'pangkat' => $this->pangkatModel->getPangkat($id),
            'jabatan' => $this->jabatanModel->getJabatan($id),
            'nonformal' => $this->pendidikannonModel->getnonFormal($id)
        ];

        //bila 
        // if (empty($data['daftar'])) {
        //     throw new \CodeIgniter\Exceptions\PageNotFoundException('Data tidak ditemukan!!');
        // }
        return view('daftarPeg/detail', $data);
    }

    public function create()
    {

        $data = [
            'title' => 'TAMBAH DATA PEGAWAI PT BPR BKK WONOGIRI (Perseroda)',
            'validation' => \Config\Services::validation()
        ];

        return view('DaftarPeg/create', $data);
    }

    public function save()
    {
        //validasi input
        if (!$this->validate([
            'nik' => [
                'rules' => 'max_length[7]|is_unique[identitaspeg.nik]',
                'errors' => [
                    'max_length[7]' => '{field} harus terdiri dari 7 digit',
                    'is_unique' => '{field} sudah terdaftar'

                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/DaftarPeg/create')->withInput()->with('validation', $validation);
        };
        $this->daftarModel->save([
            'namapeg' => $this->request->getVar('username'),
            'nik' => $this->request->getVar('nik'),
            'alamat' => $this->request->getVar('alamat'),
            'jabatan_peg' => $this->request->getVar('jabatan'),
            'tmplahir' => $this->request->getVar('tmplahir'),
            'tgllahir' => $this->request->getVar('tgllahir'),
            'Statuspeg' => $this->request->getVar('statuspegawai'),
            'statuskeluarga' => $this->request->getVar('statusmenikah')
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil ditambahkan!!');

        return redirect()->to('/daftarPeg');
    }

    public function delete($id)
    {
        // $this->daftarModel->delete($id);
        $db = \Config\Database::connect();
        $builder = $db->table('identitaspeg');
        $builder->delete(['id_identitas' => $id]);
        $builder->where('id_identitas', $id);
        $builder->delete();
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus!!');
        return redirect()->to('/daftarPeg');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'UBAH DATA PEGAWAI PT BPR BKK WONOGIRI (Perseroda)',
            'validation' => \Config\Services::validation(),
            'edit' => $this->daftarModel->getDaftar($id)
        ];

        return view('DaftarPeg/edit', $data);
    }

    public function update($id)
    {

        $this->daftarModel->save([
            'id_identitas' => $id,
            'namapeg' => $this->request->getVar('username'),
            'nik' => $this->request->getVar('nik'),
            'alamat' => $this->request->getVar('alamat'),
            'jabatan_peg' => $this->request->getVar('jabatan'),
            'tmplahir' => $this->request->getVar('tmplahir'),
            'tgllahir' => $this->request->getVar('tgllahir'),
            'Statuspeg' => $this->request->getVar('statuspegawai'),
            'statuskeluarga' => $this->request->getVar('statusmenikah')
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil diubah!!');

        return redirect()->to('/daftarPeg');
    }
}
