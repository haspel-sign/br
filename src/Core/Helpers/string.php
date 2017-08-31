<?php

if (!function_exists('create_slug')) {

    function create_slug($str){
        $_g  = explode(' ', $str);
        $slug = implode('-', $_g);

        return $slug;
    }
}