<?php

namespace App\Models;

use CodeIgniter\Model;

class keluargaModel extends Model
{
    protected $table = 'data_keluarga';
    protected $id = 'id_identitas';

    public function getKeluarga($id)
    {
        return $this->db->table('data_keluarga')
            ->join('identitaspeg', 'identitaspeg.id_identitas=data_keluarga.id_identitas')
            ->where('identitaspeg.id_identitas', $id)
            ->orderBy('data_keluarga.id_data_kel')
            ->get()->getResultArray();
    }

    public function getDashboardkel()
    {
        return $this->db->table('data_keluarga')
            ->select('nama_kel, tgllahir_kel, status_kel')
            ->join('identitaspeg', 'identitaspeg.id_identitas=data_keluarga.id_identitas')
            ->join('ambil_users', 'ambil_users.id_identitas=identitaspeg.id_identitas')
            ->join('users', 'ambil_users.id=users.id')
            ->where('users.id', user()->id)
            ->get()->getResultArray();
    }

    public function getCetakkel($id)
    {
        return $this->db->table('data_keluarga')
            ->select('nama_kel, tgllahir_kel, status_kel')
            ->join('identitaspeg', 'identitaspeg.id_identitas=data_keluarga.id_identitas')
            ->where('identitaspeg.id_identitas', $id)
            ->get()->getResult();
    }
}
