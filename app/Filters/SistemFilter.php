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

            session()->setFlashdata('flash', '<div class="alert p-0 py-2 px-2 alert-dismissible text-white" role="alert" style="background-color: #ff6a88;background-image: linear-gradient(90deg, #ff6a88 0%, #FF6A88 55%, #ff6a88 100%);
             " >
            <span class="text-sm"><i class="fas fa-exclamation-circle mx-2"></i> Silahkan login!</span>
            <span data-bs-dismiss="alert" aria-label="Close" class="cursor-pointer float-end fs-6"><i class="fa-solid fa-xmark"></i></span>
            </div>');
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
