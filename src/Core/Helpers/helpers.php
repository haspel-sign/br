<?php

use Core\Libs\Config;
use Core\Libs\Uri;
use Core\Libs\Url;
use Core\Libs\Session;
use Core\Bootstrap\DiContainer;
use Core\Libs\Validator;
use Core\Libs\Csrf;
use Core\Bootstrap\Router;
use Core\Libs\View;
use Core\Libs\Request;

defined('APPLICATION_DIR') OR exit('No direct Accesss here !');

if (!function_exists('app')) {
    // Прави инстанция на DI container;
    function app($name)
    {
        $container = new DiContainer();

        return $container->get($name);
    }

}

if (!function_exists('site_url')) {
    /*
     * Връща пълния URL
     */
    function site_url($uri = null)
    {
        return app(Url::class)->getSiteUrl($uri);
    }
}

if (!function_exists('route')) {

    function route($routename, array $params = [], $request_method = null)
    {
        $container = app(Router::class);

        return $container->route($routename, $params, $request_method)->route;
    }
}

if (!function_exists('redirect')) {

    /*
     * redirect( 'ErrorPage/show/404' )
     *
     * redirect( route(name, [agr, arg1]) )
     */
    function redirect($uri)
    {
        $container = app(Uri::class);

        $container->redirect($uri);

    }
}

// ---     Request Helpers ----
if (!function_exists('request_get')) {

    /**
     * @param $name
     * @return mixed
     */
    function request_get($name = null, $normalize = null)
    {
        $container = app(Request::class);

        return $container->get($name, $normalize);
    }

}

if (!function_exists('request_post')) {

    /**
     * @param $name
     * @param null $normalize
     * @return mixed
     */
    function request_post($name, $normalize = null)
    {
        $container = app(Request::class);

        return $container->post($name, $normalize);
    }

}

if (!function_exists('request_get')) {

    /**
     * @param $name
     * @param null $normalize
     * @return mixed
     */
    function request_get($name, $normalize = null)
    {
        $container = app(Request::class);

        return $container->get($name, $normalize);
    }

}

if (!function_exists('set_cookie')) {

    /**
     * @param $name
     * @param $value
     * @return mixed
     */
    function set_cookie($name, $value)
    {
        $container = app(Request::class);

        $container->set_cookie($name, $value);
    }

}

if (!function_exists('get_cookie')) {

    /**
     * @param $name
     * @return mixed
     */
    function get_cookie($name)
    {
        $container = app(Request::class);

        return $container->cookie($name);
    }

}

if (!function_exists('oldValue')) {

    /**
     *При неуспешна валидация връща стойността на полето.
     * @param $field
     * @return mixed|null
     */
    function oldValue($field, $html_decode = true)
    {
        $Obj = Validator::getInstance();

        if ($Obj->hasErrors() === true) {
            return ($html_decode) ? htmlspecialchars_decode($Obj->input->input($field)) :$Obj->input->input($field);

        } else {

            return '';
        }
    }
}

if (!function_exists('validation_error')) {

    /**
     * Показва съобщеие за грешки при валидация на форма
     * @param $field
     * @return string
     */
    function validation_error($field)
    {
        $Obj = Validator::getInstance();

        if ($Obj->hasErrors($field) === true) {

            return $Obj->errors($field, '', '', '<span style="color:#c9302c">%s</span>');

        } else {

            return '';
        }
    }
}
/**
 * Get flash Session msg
 */
if (!function_exists('flash')) {

    function flash($name)
    {
        $session = app(Session::class);

        return $session->getFlash($name);
    }
}
/*
 * get Session data from $_SESSION
 * Ako $name е масив то ще слагаме сеиия ,
 *  иначе вземам сесия с име $name;
 */
if (!function_exists('sessionData')) {

    function sessionData($name = null, $data = null)
    {
        $session = app(Session::class);

        if ($name == null && $data == null){
            return $session->get_all();
        }

        if (is_array($name)) {
            return $session->store($name);

        } elseif ($name !== null && $data !== null) {
            return $session->store($name, $data);

        } else {
            return $session->getData($name);
        }

    }
}

//---------------  Form Helpers ------------------------

if (!function_exists('csrf_field')) {

    function csrf_field()
    {
        $container = app(Csrf::class);

        $container->csrf_field();
    }
}

//-- --- Render View ---------------------------------
/*
 * setLayout('dashboard')->view('result', $data);
 */
if (!function_exists('setLayout')) {

    function setLayout($layout)
    {

        $container = app(View::class);

        return $container->setLayout($layout);
    }
}
/**
 * Render View
 */
if (!function_exists('view')) {

    function view($name, $data = [])
    {
        $container = app(View::class);

        $container->render($name, $data);

    }
}
/**
 *
 * recursive delete dir
 *
 */
if (!function_exists('rrmdir')) {

    function rrmdir($dir)
    {
        if (!realpath($dir)) {
            return false;
        }

        $files = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator($dir, RecursiveDirectoryIterator::SKIP_DOTS),
            \RecursiveIteratorIterator::CHILD_FIRST
        );

        foreach ($files as $fileinfo) {
            $todo = ($fileinfo->isDir() ? 'rmdir' :'unlink');
            $todo($fileinfo->getRealPath());
        }
        if (rmdir($dir)) {
            return true;
        } else {
            return false;
        }
    }
}
