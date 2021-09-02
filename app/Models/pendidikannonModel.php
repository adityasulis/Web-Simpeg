<?php

namespace App\Models;

use CodeIgniter\Model;

class pendidikannonModel extends Model
{
    public function getnonFormal($id)
    {
        return $this->db->table('pendidikan_nonformal')
            ->join('identitaspeg', 'identitaspeg.id_identitas=pendidikan_nonformal.id_identitas')
            ->where('identitaspeg.id_identitas', $id)
            ->get()->getResultArray();
    }

    public function getDashboardpendnon()
    {
        return $this->db->table('pendidikan_nonformal')
            ->select('nama_pend_non, thn_lulus_non')
            ->join('identitaspeg', 'identitaspeg.id_identitas=pendidikan_nonformal.id_identitas')
            ->join('ambil_users', 'ambil_users.id_identitas=identitaspeg.id_identitas')
            ->join('users', 'ambil_users.id=users.id')
            ->where('users.id', user()->id)
            ->get()->getResultArray();
    }

    public function getCetakPendidikanNon($id)
    {
        return $this->db->table('pendidikan_nonformal')
            ->select('nama_pend_non, thn_lulus_non')
            ->join('identitaspeg', 'identitaspeg.id_identitas=pendidikan_nonformal.id_identitas')
            ->where('identitaspeg.id_identitas', $id)
            ->get()->getResult();
    }
}
