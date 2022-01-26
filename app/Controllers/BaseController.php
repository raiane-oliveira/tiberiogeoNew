<?php

namespace App\Controllers;

use DateTime;
use IntlDateFormatter;
use App\Models\HomeModel;
use CodeIgniter\Controller;
use Psr\Log\LoggerInterface;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

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
class BaseController extends Controller
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
     * @var array
     */
    protected $helpers = ['html','form','text','url'];    
    
    /**
     * dateNow
     *
     * @var DateTime
     */
    public $dateNow;
    
    /**
     * style
     *
     * @var array
     */
    public $style = [];
    
    /**
     * javascript
     *
     * @var array
     */
    public $javascript = [];
    
    /**
     * dataHeader
     *
     * @var array
     */
    public $dataHeader = [];
    
    /**
     * category
     *
     * @var Mixed
     */
    public $category;
    
    /**
     * menuWorld
     *
     * @var string
     */
    public $menuWorld = "";
    
    /**
     * menuBrazil
     *
     * @var string
     */
    public $menuBrazil = "";
        
    /**
     * menuGeography
     *
     * @var string
     */
    public $menuGeography = "";
    
    /**
     * dataTemperature
     *
     * @var array
     */
    public $dataTemperature = [];

    /**
     * Constructor.
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);
        helper('utils'); 
        //helper('form');       
       
        // Preload any models, libraries, etc, here.

        // E.g.: $this->session = \Config\Services::session();

        $date = new DateTime();
        $formatter = new IntlDateFormatter(
            'pt_BR',
            IntlDateFormatter::FULL,
            IntlDateFormatter::NONE,
            'America/Sao_Paulo',
            IntlDateFormatter::GREGORIAN
        );
        $this->dateNow = $formatter->format($date);
        
        $this->style = [
	        "css" => [               
                ["path" => base_url()."/assets/css/bootstrap.min.css"],
                ["path" => base_url()."/assets/css/font-awesome.min.css"],
                ["path" => base_url()."/assets/css/animate.css"],
                ["path" => base_url()."/assets/css/icofonts.css"],
                ["path" => base_url()."/assets/css/owlcarousel.min.css"],
                ["path" => base_url()."/assets/css/slick.css"],
                ["path" => base_url()."/assets/css/navigation.css"],
                ["path" => base_url()."/assets/css/magnific-popup.css"],
                ["path" => base_url()."/assets/css/style.css"],
                ["path" => base_url()."/assets/css/colors/color-0.css"],
                ["path" => base_url()."/assets/css/responsive.css"],                
            ],
        ]; 

        $this->javascript = [
	        "js" => [                
                ["path"=> base_url()."/assets/js/jquery-1.12.4.min.js"],
                ["path"=> base_url()."/assets/js/navigation.js"],               
                ["path"=> base_url()."/assets/js/popper.min.js"],
                ["path"=> base_url()."/assets/js/jquery.magnific-popup.min.js"],
                ["path"=> base_url()."/assets/js/bootstrap.min.js"],
                ["path"=> base_url()."/assets/js/owl-carousel.2.3.0.min.js"],
                ["path"=> base_url()."/assets/js/slick.min.js"],
                ["path"=> base_url()."/assets/js/smoothscroll.js"],
                ["path"=> base_url()."/assets/js/jQuery.paginate.js"],
                ["path"=> base_url()."/assets/js/main.js"],                
                ["path"=> base_url()."/assets/js/my.js"],                
            ]
        ];	   
        
        $this->dataHeader = [
	        "title" => "TiberioGeo - A Geografia Levada a Sério!",
            "favico" => base_url()."/assets/img/logo/autor.png",
            
        ];
        $urlTempIp = 'https://api.hgbrasil.com/weather?key=acca0bf5&user_ip=remote';
        $urlTempCampinaGrande = 'https://api.hgbrasil.com/weather?format=json-cors&key=acca0bf5&woeid=455848';
        $this->dataTemperature = json_decode(file_get_contents($urlTempIp), true); // Recebe os dados da API
        //$dataCotacao = json_decode(file_get_contents('https://economia.awesomeapi.com.br/json/USD-BRL'), true);
        
        /*if(json_last_error()!= 0 ){
            $dados = [
                'results' => [    
                    'temp' => '',
                    'city' => '',
                    'img_id' => '',
                    'description'=>''
                ]               
            ];
        }	*/   

        $this->category =  new HomeModel();        
        $this->menuWorld = $this->category->getMenu('world');
        krsort($this->menuWorld);


        $this->menuBrazil = $this->category->getMenu('brazil');
        krsort($this->menuBrazil);

        $this->menuGeography = $this->category->getMenu('geography');     
        krsort($this->menuGeography);
        setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'portuguese');
		
        
    }
}
