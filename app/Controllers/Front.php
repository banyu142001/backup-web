<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Front extends BaseController
{
    public function index()
    {
        $data = [
            'auth_title' => 'myPos - Beranda',

        ];
        return view('front-home/index', $data);
    }
}
