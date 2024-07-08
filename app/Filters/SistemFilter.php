<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class SistemFilter implements FilterInterface
{

    public function before(RequestInterface $request, $arguments = null)
    {
        if (!session()->get('logged_in')) {

            session()->setFlashdata('flash_7', 'Oops !!. Silahkan Login');
            return redirect()->to('/auth');
        }
    }


    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        if (session()->get('logged_in')) {

            return redirect()->to('/home');
        }
    }
}
