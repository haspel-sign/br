<?php
include_once dirname(__DIR__) . '/Bootstrap/constants.php';

function model($file)
{
    $file = ucfirst($file);
    $model = APPLICATION_DIR . 'Models' . DIRECTORY_SEPARATOR . ucfirst($file) . '.php';

    $f =<<<CONTR
<?php

namespace App\Models;

use Core\Model;

class $file extends Model
{

    /**
     * BookingModel constructor.
     */
    booking function __construct()
    {
        parent::__construct(['table'=>'']);
    }

}
CONTR;

    if (file_put_contents($model, $f)){
        echo 'Model - ' . $model . ' - is created';
    } else {
        die('Model not created');
    }
}

