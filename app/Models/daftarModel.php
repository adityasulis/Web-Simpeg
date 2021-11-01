<?php

namespace App\Models;

use CodeIgniter\Model;
use PharIo\Version\OrVersionConstraintGroup;

class daftarModel extends Model
{
    protected $table = 'identitaspeg';
    protected $primaryKey = 'id_identitas';
    // protected $useTimestamps = 'false';
    protected $allowedFields = ['namapeg', 'nik', 'tmt', 'jabatan_peg', 'tmplahir', 'tgllahir', 'alamat', 'Statuspeg', 'statuskeluarga'];

    public function getDaftar($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id_identitas' => $id])->first();
    }

    public function search($keyword)
    {
        return $this->table('identitaspeg')->like('namapeg', $keyword)->orLike('jabatan_peg', $keyword);
    }

    public function getDashboarddata()
    {
        return $this->db->table('identitaspeg')
            ->select('identitaspeg.id_identitas, nik,tmt, namapeg, jabatan_peg, tmplahir,tgllahir,alamat,Statuspeg,statuskeluarga')
            ->join('ambil_users', 'identitaspeg.id_identitas=ambil_users.id_identitas')
            ->join('users', 'users.id = ambil_users.id')
            ->where('users.id', user()->id)
            ->get()->getRow();
    }

    public function getCetakData($id)
    {
        return $this->db->table('identitaspeg')
            ->select('id_identitas, nik, tmt, namapeg, jabatan_peg, tmplahir,tgllahir,alamat,Statuspeg,statuskeluarga')
            ->where('identitaspeg.id_identitas', $id)
            ->get()->getRow();
    }

    public function getDaftarExcel()
    {
        return $this->db->table('identitaspeg')
            ->orderBy('namapeg')
            ->get()->getResult();
    }
}
