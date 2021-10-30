<?php

namespace App\Models;

use App\Models\daftarModel;
use CodeIgniter\Model;


class pendidikanModel extends Model
{
    protected $table = 'ambil_pendidikan';
    protected $primaryKey = 'id_ambil_pend';
    protected $allowedFields = ['id_identitas', 'id_pend', 'thn_lulus'];
    protected $id = 'id_identitas';

    public function getPendidikan($id)
    {
        return $this->db->table('pendidikan')
            ->join('ambil_pendidikan', 'pendidikan.id_pend=ambil_pendidikan.id_pend')
            ->join('identitaspeg', 'identitaspeg.id_identitas=ambil_pendidikan.id_identitas')
            ->where('identitaspeg.id_identitas', $id)
            ->orderBy('ambil_pendidikan.id_ambil_pend')
            ->get()->getResultArray();
    }

    public function getPendidikanDropdown()
    {
        return $this->db->table('pendidikan')->get()->getResultArray();
    }

    public function getPendidikanExist($where)
    {
        return $this->db->table($this->table)->where($where)->get()->getResultArray();
    }

    public function getDashboardpend()
    {
        return $this->db->table('pendidikan')
            ->select('nama_pendidikan, thn_lulus')
            ->join('ambil_pendidikan', 'pendidikan.id_pend=ambil_pendidikan.id_pend')
            ->join('identitaspeg', 'identitaspeg.id_identitas=ambil_pendidikan.id_identitas')
            ->join('ambil_users', 'ambil_users.id_identitas=identitaspeg.id_identitas')
            ->join('users', 'ambil_users.id=users.id')
            ->where('users.id', user()->id)
            ->get()->getResultArray();
    }

    public function getCetakPendidikan($id)
    {
        return $this->db->table('pendidikan')
            ->select('nama_pendidikan,  thn_lulus')
            ->join('ambil_pendidikan', 'pendidikan.id_pend=ambil_pendidikan.id_pend')
            ->join('identitaspeg', 'identitaspeg.id_identitas=ambil_pendidikan.id_identitas')
            ->where('identitaspeg.id_identitas', $id)
            ->get()->getResult();
    }

    public function getExcelPendidikan($id)
    {
        return $this->db->table('pendidikan')
            ->select('nama_pendidikan,  thn_lulus')
            ->join('ambil_pendidikan', 'pendidikan.id_pend=ambil_pendidikan.id_pend')
            ->join('identitaspeg', 'identitaspeg.id_identitas=ambil_pendidikan.id_identitas')
            ->where('identitaspeg.id_identitas', $id)
            ->get()->getResultArray();
    }
}
