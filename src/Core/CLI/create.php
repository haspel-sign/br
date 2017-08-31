<?php
include_once 'controller.php';
include_once 'model.php';

function create($class)
{
    $e = explode(':', $class);
    list($class, $name) = $e;
    switch ($class) {
        case 'controller':
            controller($name);
            break;
        case 'model':
            model($name);
            break;
    }
}