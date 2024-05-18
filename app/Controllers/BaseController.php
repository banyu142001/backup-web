<?php

namespace App\Controllers;

use App\Models\AuthModel;
use App\Models\CustomerModel;
use App\Models\KategoriModel;
use App\Models\ProdukModel;
use App\Models\SatuanModel;
use App\Models\StokKeluarModel;
use App\Models\StokMasukModel;
use App\Models\SupplierModel;
use App\Models\UserModel;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
abstract class BaseController extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var list<string>
     */
    protected $helpers = ['form', 'myPOS_helper'];


    /**
     * Be sure to declare properties for any property fetch you initialized.
     * The creation of dynamic property is deprecated in PHP 8.2.
     */
    // protected $session;

    /**
     * @return void
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.

        // E.g.: $this->session = \Config\Services::session();
    }
    protected $authModel, $suplyModel, $userModel, $cusModel, $katModel, $satuanModel, $produkModel, $stokMasukModel, $stokKeluarModel;
    public function __construct()
    {
        $this->suplyModel = new SupplierModel();
        $this->userModel = new UserModel();
        $this->cusModel  = new CustomerModel();
        $this->katModel = new KategoriModel();
        $this->satuanModel = new SatuanModel();
        $this->produkModel = new ProdukModel();
        $this->authModel = new AuthModel();
        $this->stokMasukModel = new StokMasukModel();
        $this->stokKeluarModel = new StokKeluarModel();
    }
}

// CONTANTA ALERT
define('ALERT_SUCCESS', 'style="background-color: #2fde7e;
background-image: linear-gradient(45deg, #2fde7e 94%, #cccccc 100%)"');

define('ALERT_DANGER', ' style="background-color: #ff6a88;
background-image: linear-gradient(90deg, #ff6a88 0%, #FF6A88 55%, #ff6a88 100%);
 "');

//  icon check
define('icon_success', '<i class="fa fa-check-circle mx-2"></i>');
//  icon warnign alert danger
define('icon_warning', '<i class="fas fa-exclamation-circle mx-2"></i>');
// icon close alert
define('icon_close', ' <span data-bs-dismiss="alert" aria-label="Close" class="cursor-pointer float-end fs-6"><i class="fa-solid fa-xmark"></i></span>');
