<?php
/**
 * Created by PhpStorm.
 * User: erandir
 * Date: 14/07/17
 * Time: 10:09
 */

namespace App\Controllers;

use Core\Controller\Controller;

class Hello extends Controller
{
    public function hello()
    {
        echo "Hello World";
        $this->template('indexx');
    }
}