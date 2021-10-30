<?php

namespace App\Models;

use CodeIgniter\Model;

class userLinkedModel extends Model
{
    protected $table = 'ambil_users';
    protected $primaryKey = 'id_ambil_user';
    protected $allowedFields = ['id', 'id_identitas'];

    public function getUserLinked($id)
    {
        return $this->db->table('ambil_users')
            ->join('users', 'ambil_users.id=users.id')
            ->join('identitaspeg', 'ambil_users.id_identitas=identitaspeg.id_identitas')
            ->where('identitaspeg.id_identitas', $id)
            ->get()->getResultArray();
    }
}
