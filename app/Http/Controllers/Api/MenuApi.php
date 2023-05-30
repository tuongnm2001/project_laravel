<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
use Auth ;


namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;

class MenuApi extends Controller{

    public function index(){
        
        $menu = Menu::all();
        if($menu){
            return response([
                'data'=>$menu,
                'err_Message'=> "Ok"
            ]);
        }
    }
}
