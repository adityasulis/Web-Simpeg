<?php

namespace App\Models;

use CodeIgniter\Model;

class jabatanModel extends Model
{
    protected $table = 'ambil_jabatan';
    protected $primaryKey = 'id_ambil_jabatan';
    protected $allowedFields = ['id_identitas', 'id_jabatan', 'periode_mulai', 'periode_selesai', 'unit_kerja'];
    protected $id = 'id_identitas';

    public function getJabatan($id)
    {
        return $this->db->table('jabatan')
            ->join('ambil_jabatan', 'ambil_jabatan.id_jabatan=jabatan.id_jabatan')
            ->join('identitaspeg', 'identitaspeg.id_identitas=ambil_jabatan.id_identitas')
            ->where('identitaspeg.id_identitas', $id)
            ->get()->getResultArray();
    }

    public function getJabatanDropdown()
    {
        return $this->db->table('jabatan')->get()->getResultArray();
    }

    public function getJabatanExist($where)
    {
        return $this->db->table($this->table)->where($where)->get()->getResultArray();
    }

    public function getDashboarjab()
    {
        return $this->db->table('jabatan')
            ->select('nama_jabatan, periode_mulai, periode_selesai, unit_kerja')
            ->join('ambil_jabatan', 'ambil_jabatan.id_jabatan=jabatan.id_jabatan')
            ->join('identitaspeg', 'identitaspeg.id_identitas=ambil_jabatan.id_identitas')
            ->join('ambil_users', 'ambil_users.id_identitas=identitaspeg.id_identitas')
            ->join('users', 'ambil_users.id=users.id')
            ->where('users.id', user()->id)
            ->get()->getResultArray();
    }

    public function getCetakJabatan($id)
    {
        return $this->db->table('jabatan')
            ->select('nama_jabatan,periode_mulai, periode_selesai, unit_kerja')
            ->join('ambil_jabatan', 'ambil_jabatan.id_jabatan=jabatan.id_jabatan')
            ->join('identitaspeg', 'identitaspeg.id_identitas=ambil_jabatan.id_identitas')
            ->where('identitaspeg.id_identitas', $id)
            ->get()->getResult();
    }
}
