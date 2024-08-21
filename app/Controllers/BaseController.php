<?php

namespace App\Controllers;

use App\Models\AuthModel;
use App\Models\CartModel;
use App\Models\CustomerModel;
use App\Models\HomeModel;
use App\Models\KategoriModel;
use App\Models\PenjualanDetailModel;
use App\Models\PenjualanModel;
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


    // metode load model cara ke 2
    protected $models = [];

    public function __construct()
    {
        // Load helpers if any
        helper($this->helpers);
    }

    protected function loadModel($modelName)
    {
        if (!isset($this->models[$modelName])) {
            $className = "App\\Models\\" . $modelName;
            if (class_exists($className)) {
                $this->models[$modelName] = new $className();
            } else {
                throw new \Exception("Model $modelName tidak ditemukan.");
            }
        }

        return $this->models[$modelName];
    }
}
