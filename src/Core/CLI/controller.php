<?php
include_once dirname(__DIR__) . '/Bootstrap/constants.php';

function controller($file)
{ //TODO:: create controller in sub dir - Controllers/Admin/new.php
    $file = ucfirst($file);
    $controller = APPLICATION_DIR . 'Controllers' . DIRECTORY_SEPARATOR . ucfirst($file) . '.php';

    $f =<<<CONTR
<?php

namespace App\Controllers;

defined('APPLICATION_DIR') OR exit('No direct Accesss here !');

use Core\Controller;
use Core\Bootstrap\DiContainer;
use Core\Libs\Request;
use Core\Libs\Session;
use Core\Libs\Validator;
use Core\Libs\Csrf;

class $file extends Controller
{
    public function __construct()
    {
        parent::__construct();


    }

}
CONTR;

    if (file_put_contents($controller, $f)){
        echo 'Controller - ' . $controller . ' - is created';
    } else {
        die('Controller not created');
    }
}

