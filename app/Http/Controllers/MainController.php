<?php


namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Services\Menu\MenuService;
use App\Http\Services\Slider\SliderService;
use App\Http\Services\Product\ProductService;

class MainController extends Controller{

    protected $slider;
    protected $menu;
    protected $product;

    public function __contruct(SliderService $slider , MenuService $menu ,ProductService $product){
        $this->slider = $slider ;
        $this->menu = $menu ;
        $this->product= $product;
    }

    public function index(){
        return view('home',[
            'title'=>'Shop nước hoa NMT',
            'sliders'=>$this->slider->show(),
            'menus'=> $this->menu->show(),
            'products'=>$this->product->get()
        ]);
    }
}
