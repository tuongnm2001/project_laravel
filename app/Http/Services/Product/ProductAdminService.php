<?php

namespace App\Http\Services\Product;

use App\Models\Menu;
use App\Models\Product;

class ProductAdminService{
    public function getMenu(){
        return Menu::where('active', 1)->get();
    }

    // protected function isValidPrice($request){
    //     if($request->input('price')!== 0 && $request->input('price_sale')!==0 && $request->input('price_sale')>= $request->input('price')){
    //         Session::flash('error', 'Giá giảm phải nhỏ hơn giá gốc');
    //         return false ;
    //     }
    // }

    public function insert($request){
        // $isValidPrice = $this->isValidPrice($request);
        // if($isValidPrice === false){
        //     return false ;
        // }

       try {
         $request->except('_token');
        Product::create($request->all());
        $request->session()->flash('success', 'Thêm sản phẩm thành công');
       } catch (\Exception $th) {
            $request->session()->flash('error', 'Thêm sản phẩm thất bại');
            \Log::info($err->getMessage());
            return false ;
       }
    }

    public function get(){
        return Product::with('menu')
            ->orderByDesc('id')->paginate(15);
    }
}