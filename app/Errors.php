<?php
namespace App;

use App\Controllers\BaseController;

class Errors extends BaseController{
    public function show404(){
        return "oi";
    }

}