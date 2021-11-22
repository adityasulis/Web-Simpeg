<?php

namespace App\Controllers;

use App\Models\daftarModel;
use App\Models\pendidikanModel;
use App\Models\keluargaModel;
use App\Models\pangkatModel;
use App\Models\jabatanModel;
use App\Models\pendidikannonModel;
use App\Models\userLinkedModel;
use App\Models\userPrimaryModel;

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
        $this->userLinkedModel = new userLinkedModel();
        $this->userPrimaryModel = new userPrimaryModel();
    }

    public function checkPass()
    {
        echo hash('sha256', 'admin');
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
            'daftar' => $this->daftarModel->getDetail($id),
            'user_linked' => $this->userLinkedModel->getUserLinked($id),
            'pendidikan' => $this->pendidikanModel->getPendidikan($id),
            'pendidikan_dd' => $this->pendidikanModel->getPendidikanDropdown(),
            'keluarga' => $this->keluargaModel->getKeluarga($id),
            'pangkat' => $this->pangkatModel->getPangkat($id),
            'pangkat_dd' => $this->pangkatModel->getPangkatDropdown(),
            'jabatan' => $this->jabatanModel->getJabatan($id),
            'jabatan_dd' => $this->jabatanModel->getJabatanDropdown($id),
            'nonformal' => $this->pendidikannonModel->getnonFormal($id),

        ];

        return view('daftarPeg/detail', $data);
    }

    public function Aktif($id)
    {
        $data = [
            'daftar' => $this->daftarModel->getDetail($id),
            'user_linked' => $this->userLinkedModel->getUserLinked($id),
            'pendidikan' => $this->pendidikanModel->getPendidikan($id),
            'pendidikan_dd' => $this->pendidikanModel->getPendidikanDropdown(),
            'keluarga' => $this->keluargaModel->getKeluarga($id),
            'pangkat' => $this->pangkatModel->getPangkat($id),
            'pangkat_dd' => $this->pangkatModel->getPangkatDropdown(),
            'jabatan' => $this->jabatanModel->getJabatan($id),
            'jabatan_dd' => $this->jabatanModel->getJabatanDropdown($id),
            'nonformal' => $this->pendidikannonModel->getnonFormal($id),
        ];

        $data = [
            $db = \Config\Database::connect(),
            $builder = $db->table('identitaspeg'),
            $builder->set('Aktif', '1'),
            $builder->where('id_identitas', $id),
            $builder->update(),
            session()->setFlashdata('pesan', 'Pegawai Berhasil di Aktifkan!!')
        ];

        return view('daftarPeg/detail', $data);
    }

    public function NonAktif($id)
    {
        $data = [
            'daftar' => $this->daftarModel->getDetail($id),
            'user_linked' => $this->userLinkedModel->getUserLinked($id),
            'pendidikan' => $this->pendidikanModel->getPendidikan($id),
            'pendidikan_dd' => $this->pendidikanModel->getPendidikanDropdown(),
            'keluarga' => $this->keluargaModel->getKeluarga($id),
            'pangkat' => $this->pangkatModel->getPangkat($id),
            'pangkat_dd' => $this->pangkatModel->getPangkatDropdown(),
            'jabatan' => $this->jabatanModel->getJabatan($id),
            'jabatan_dd' => $this->jabatanModel->getJabatanDropdown($id),
            'nonformal' => $this->pendidikannonModel->getnonFormal($id),
        ];

        $data = [
            $db = \Config\Database::connect(),
            $builder = $db->table('identitaspeg'),
            $builder->set('Aktif', '0'),
            $builder->where('id_identitas', $id),
            $builder->update(),
            session()->setFlashdata('pesan', 'Pegawai Berhasil di Aktifkan!!')
        ];

        return view('daftarPeg/detail', $data);
    }

    public function create()
    {

        $data['title'] = 'TAMBAH DATA PEGAWAI PT BPR BKK WONOGIRI (Perseroda)';
        $data['validation'] = \Config\Services::validation();

        return view('daftarPeg/create', $data);
    }

    public function save()
    {
        //validasi input
        if (!$this->validate([
            'nik' => [
                'rules' => 'max_length[7]|is_unique[identitaspeg.nik]',
                'errors' => [
                    'max_length' => '{field} harus terdiri dari 7 digit',
                    'is_unique' => '{field} sudah terdaftar'
                ]
            ]
        ])) {
            $pesan = '';
            if (\Config\Services::validation()->hasError('nik')) {
                $pesan .= \Config\Services::validation()->getError('nik') . '<br>';
            }
            if ($pesan != '') {
                session()->setFlashdata('pesan', $pesan);
            }
            //return redirect()->to('/daftarPeg/create')->withInput()->with('validation', \Config\Services::validation());
            return redirect()->to('/daftarPeg/create');
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

    public function updatePegawai()
    {
        if ($this->request->getVar('nik_asli') == $this->request->getVar('nik')) {
            $this->daftarModel->save([
                'id_identitas' => $this->request->getVar('id_identitas'),
                'namapeg' => $this->request->getVar('namapeg'),
                'nik' => $this->request->getVar('nik'),
                'tmt' => $this->request->getVar('tmt'),
                'alamat' => $this->request->getVar('alamat'),
                'jabatan_peg' => $this->request->getVar('jabatan_peg'),
                'tmplahir' => $this->request->getVar('tmplahir'),
                'tgllahir' => $this->request->getVar('tgllahir'),
                'Statuspeg' => $this->request->getVar('Statuspeg'),
                'statuskeluarga' => $this->request->getVar('statuskeluarga')
            ]);
            session()->setFlashdata('pesan_benar', 'Data Berhasil diperbaharui!!');
        } else {
            if (!$this->validate([
                'nik' => [
                    'rules' => 'max_length[7]|is_unique[identitaspeg.nik]',
                    'errors' => [
                        'max_length' => '{field} harus terdiri dari 7 digit',
                        'is_unique' => '{field} sudah terdaftar'
                    ]
                ]
            ])) {
                $pesan = '';
                if (\Config\Services::validation()->hasError('nik')) {
                    $pesan .= \Config\Services::validation()->getError('nik') . '<br>';
                }
                if ($pesan != '') {
                    session()->setFlashdata('pesan_salah', $pesan);
                }
                //return redirect()->to('/daftarPeg/create')->withInput()->with('validation', \Config\Services::validation());
                return redirect()->to('/daftarPeg/' . $this->request->getVar('id_identitas'));
            };
        }

        return redirect()->to('/daftarPeg/' . $this->request->getVar('id_identitas'));
    }

    public function saveKeluarga()
    {
        $this->keluargaModel->save([
            'id_identitas' => $this->request->getVar('id_identitas'),
            'nama_kel' => $this->request->getVar('nama_kel'),
            'tgllahir_kel' => $this->request->getVar('tgllahir_kel'),
            'status_kel' => $this->request->getVar('status_kel'),
            'keterangan' => $this->request->getVar('keterangan'),
            'tertanggung' => $this->request->getVar('tertanggung')
        ]);

        session()->setFlashdata('pesan_benar', 'Data Keluarga Berhasil ditambahkan!!');

        return redirect()->to('/daftarPeg/' . $this->request->getVar('id_identitas'));
    }

    public function deleteKeluarga($id, $id_identitas)
    {
        $this->keluargaModel->delete($id);

        session()->setFlashdata('pesan_benar', 'Data Keluarga Berhasil dihapus!!');

        return redirect()->to('/daftarPeg/' . $id_identitas);
    }

    public function savePendidikanNonFormal()
    {
        if (!$this->validate([
            'thn_lulus_non' => [
                'rules' => 'max_length[4]',
                'errors' => [
                    'max_length' => 'Tahun Lulus maksimal 4 digit'
                ]
            ]
        ])) {
            $pesan = '';
            if (\Config\Services::validation()->hasError('thn_lulus_non')) {
                $pesan .= \Config\Services::validation()->getError('thn_lulus_non') . '<br>';
            }
            if ($pesan != '') {
                session()->setFlashdata('pesan_salah', $pesan);
            }
            return redirect()->to('/daftarPeg/' . $this->request->getVar('id_identitas'));
        };

        $this->pendidikannonModel->save([
            'id_identitas' => $this->request->getVar('id_identitas'),
            'nama_pend_non' => $this->request->getVar('nama_pend_non'),
            'thn_lulus_non' => $this->request->getVar('thn_lulus_non')
        ]);

        session()->setFlashdata('pesan_benar', 'Data Pendidikan Non Formal Berhasil ditambahkan!!');

        return redirect()->to('/daftarPeg/' . $this->request->getVar('id_identitas'));
    }

    public function deletePendidikanNonFormal($id, $id_identitas)
    {
        $this->pendidikannonModel->delete($id);

        session()->setFlashdata('pesan_benar', 'Data Pendidikan Non Formal Berhasil dihapus!!');

        return redirect()->to('/daftarPeg/' . $id_identitas);
    }

    public function savePendidikan()
    {
        if (!$this->validate([
            'thn_lulus' => [
                'rules' => 'max_length[4]',
                'errors' => [
                    'max_length' => 'Tahun Lulus maksimal 4 digit'
                ]
            ]
        ])) {
            $pesan = '';
            if (\Config\Services::validation()->hasError('thn_lulus')) {
                $pesan .= \Config\Services::validation()->getError('thn_lulus') . '<br>';
            }
            if ($pesan != '') {
                session()->setFlashdata('pesan_salah', $pesan);
            }
            return redirect()->to('/daftarPeg/' . $this->request->getVar('id_identitas'));
        };

        if (count($this->pendidikanModel->getPendidikanExist([
            'id_identitas' => $this->request->getVar('id_identitas'),
            'id_pend' => $this->request->getVar('id_pend')
        ])) > 0) {
            session()->setFlashdata('pesan_salah', 'Data Pendidikan ini sudah ada!!');
        } else {
            $this->pendidikanModel->save([
                'id_identitas' => $this->request->getVar('id_identitas'),
                'id_pend' => $this->request->getVar('id_pend'),
                'thn_lulus' => $this->request->getVar('thn_lulus')
            ]);
            session()->setFlashdata('pesan_benar', 'Data Pendidikan Berhasil ditambahkan!!');
        }

        return redirect()->to('/daftarPeg/' . $this->request->getVar('id_identitas'));
    }

    public function deletePendidikan($id, $id_identitas)
    {
        $this->pendidikanModel->delete($id);

        session()->setFlashdata('pesan_benar', 'Data Pendidikan Berhasil dihapus!!');

        return redirect()->to('/daftarPeg/' . $id_identitas);
    }

    public function savePangkat()
    {
        if (count($this->pangkatModel->getPangkatExist([
            'id_identitas' => $this->request->getVar('id_identitas'),
            'id_pangkat' => $this->request->getVar('id_pangkat')
        ])) > 0) {
            session()->setFlashdata('pesan_salah', 'Data Pangkat ini sudah ada!!');
        } else {
            $this->pangkatModel->save([
                'id_identitas' => $this->request->getVar('id_identitas'),
                'id_pangkat' => $this->request->getVar('id_pangkat'),
                'thn_perolehan' => $this->request->getVar('thn_perolehan')
            ]);
            session()->setFlashdata('pesan_benar', 'Data Pangkat Berhasil ditambahkan!!');
        }

        return redirect()->to('/daftarPeg/' . $this->request->getVar('id_identitas'));
    }

    public function deletePangkat($id, $id_identitas)
    {
        $this->pangkatModel->delete($id);

        session()->setFlashdata('pesan_benar', 'Data Pangkat Berhasil dihapus!!');

        return redirect()->to('/daftarPeg/' . $id_identitas);
    }

    public function saveJabatan()
    {
        $this->jabatanModel->save([
            'id_identitas' => $this->request->getVar('id_identitas'),
            'id_jabatan' => $this->request->getVar('id_jabatan'),
            'periode_mulai' => $this->request->getVar('periode_mulai'),
            'periode_selesai' => $this->request->getVar('periode_selesai'),
            'unit_kerja' => $this->request->getVar('unit_kerja')
        ]);
        session()->setFlashdata('pesan_benar', 'Data Jabatan Berhasil ditambahkan!!');
        return redirect()->to('/daftarPeg/' . $this->request->getVar('id_identitas'));
    }

    public function deleteJabatan($id, $id_identitas)
    {
        $this->jabatanModel->delete($id);

        session()->setFlashdata('pesan_benar', 'Data Jabatan Berhasil dihapus!!');

        return redirect()->to('/daftarPeg/' . $id_identitas);
    }

    public function saveUserPrimary()
    {
        if (!empty($this->request->getVar('password'))) {
            $this->userPrimaryModel->save([
                'id' => $this->request->getVar('id'),
                'username' => $this->request->getVar('username')
                //'password_hash' => hash('sha256', $this->request->getVar('password'))
            ]);
        } else {
            $this->userPrimaryModel->save([
                'id' => $this->request->getVar('id'),
                'username' => $this->request->getVar('username')
            ]);
        }

        if ($this->request->getVar('username') == user()->username) {
            session()->setFlashdata('pesan', 'Username / Password Berhasil diubah!!');
            return redirect()->to('/daftarPeg/' . $this->request->getVar('id_identitas'));
        } else {
            session()->setFlashdata('pesan', 'Username / Password Berhasil diubah!!');
            return redirect()->to('/logout');
        }
    }
}
