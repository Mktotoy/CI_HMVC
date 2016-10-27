<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('css_url'))
{
    function css_url($nom)
    {
        return base_url() . 'assets/' . $nom . '.css';
    }
}

if ( ! function_exists('js_url'))
{
    function js_url($nom)
    {
        return base_url() . 'assets/' . $nom . '.js';
    }
}

if ( ! function_exists('img_url'))
{
    function img_url($nom)
    {
        return base_url() . 'assets/img/' . $nom;
    }
}

if ( ! function_exists('img'))
{
    function img($nom, $alt = '')
    {
        return '<img src="' . img_url($nom) . '" alt="' . $alt . '" />';
    }
}

if ( ! function_exists('view_module'))
{
    function view_module($nom)
    {
        return base_url() . 'application/views/module/' . $nom . '.php';
    }
}
if ( ! function_exists('random_bootstrapcolor_css'))
{
    function random_bootstrapcolor_css($i=-1){
        if($i<0)
            $i=rand(1,6);
        if($i==1)
            return "danger";
        if($i==2)
            return "success";
        if($i==3)
            return "info";
        if($i==4)
            return "primary";
        if($i==5)
            return "default";
        if($i==6)
            return "warning";
        if($i==7)
            return "empty";
    }
}
if ( ! function_exists('js_array'))
{
    function js_array($array)
    {

        return json_encode($array);
    }
}
