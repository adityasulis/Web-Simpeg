<?php

namespace App\Models;

use CodeIgniter\Model;

class userPrimaryModel extends Model
{
    protected $table = 'users';
    protected $allowedFields = ['username', 'password_hash'];
}
