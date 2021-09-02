<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'SISTEM INFORMASI KEPEGAWAIAN PT BPR BKK (Perseroda)'
        ];
        return view('pages/home', $data);
        // return view('auth/login', $data);
    }
}
