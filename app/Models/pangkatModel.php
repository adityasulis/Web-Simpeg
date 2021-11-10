<?php

namespace App\Models;

use CodeIgniter\Model;

class pangkatModel extends Model
{
    protected $table = 'ambil_pangkat';
    protected $primaryKey = 'id_ambil_pangkat';
    protected $allowedFields = ['id_identitas', 'id_pangkat', 'thn_perolehan'];
    protected $id = 'id_identitas';

    public function getPangkat($id)
    {
        return $this->db->table('pangkat')
            ->select('id_ambil_pangkat,nama_pangkat, thn_perolehan')
            ->join('ambil_pangkat', 'ambil_pangkat.id_pangkat=pangkat.id_pangkat')
            ->join('identitaspeg', 'identitaspeg.id_identitas=ambil_pangkat.id_identitas')
            ->where('identitaspeg.id_identitas', $id)
            ->get()->getResultArray();
    }

    public function getPangkatDropdown()
    {
        return $this->db->table('pangkat')->get()->getResultArray();
    }

    public function getPangkatExist($where)
    {
        return $this->db->table($this->table)->where($where)->get()->getResultArray();
    }

    public function getDashboardpang()
    {
        return $this->db->table('pangkat')
            ->select('id_ambil_pangkat,nama_pangkat, thn_perolehan')
            ->join('ambil_pangkat', 'ambil_pangkat.id_pangkat=pangkat.id_pangkat')
            ->join('identitaspeg', 'identitaspeg.id_identitas=ambil_pangkat.id_identitas')
            ->join('ambil_users', 'ambil_users.id_identitas=identitaspeg.id_identitas')
            ->join('users', 'ambil_users.id=users.id')
            ->where('users.id', user()->id)
            ->get()->getResultArray();
    }

    public function getCetakPangkat($id)
    {
        return $this->db->table('pangkat')
            ->select('id_ambil_pangkat,nama_pangkat,thn_perolehan')
            ->join('ambil_pangkat', 'ambil_pangkat.id_pangkat=pangkat.id_pangkat')
            ->join('identitaspeg', 'identitaspeg.id_identitas=ambil_pangkat.id_identitas')
            ->where('identitaspeg.id_identitas', $id)
            ->get()->getResult();
    }
}
