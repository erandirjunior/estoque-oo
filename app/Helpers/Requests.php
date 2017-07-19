<?php
namespace App\Helpers;

use Core\Request\GetRequest;
use Core\Request\PostRequest;

class Requests
{
    public static function getAll()
    {
        return GetRequest::all();
    }

    public static function getInput($input)
    {
        return GetRequest::input($input);
    }

    public static function postAll()
    {
        return PostRequest::all();
    }

    public static function postInput($input)
    {
        return PostRequest::input($input);
    }
}