<?php

namespace App\Http\Services\Product;

use App\Models\Menu;
use App\Models\Product;
use Illuminate\Support\Facades\Session;

class ProductAdminService{
    public function getMenu(){
        return Menu::where('active', 1)->get();
    }

    protected function isValidPrice($request){
        if($request->input('price')!== 0 && $request->input('price_sale')!==0 && $request->input('price_save')>= $request->input('price')){
            Session::flash('error', 'Giá giảm phải nhỏ hơn giá gốc');
            return false ;
        }

        if($request->input('price_save')!== 0 && (int)$request->input('price')===0){
            Session::flash('error', 'Vui lòng nhập giá gốc');
            return false ;
        }
        return true ;
    }

    public function insert($request){
        $isValidPrice = $this->isValidPrice($request);
        if($isValidPrice === false){
            return false ;
        }

       try {
            $request->except('_token');
            Product::create($request->all());
            $request->session()->flash('success', 'Thêm sản phẩm thành công');
       } catch (\Exception $err) {
            $request->session()->flash('error', 'Thêm sản phẩm thất bại');
            \Log::info($err->getMessage());
            return false ;
       }
       return true ;
    }

    //Product::with('menu') => with('menu') với model Product
    public function get(){
        return Product::with('menu')
            ->orderByDesc('updated_at')->paginate(15);
    }

    public function update($request,$product){
        $isValidPrice = $this->isValidPrice($request);
        if($isValidPrice === false){
            return false ;
        }
        try {
            $product->fill($request->input());
            $product->save();
            $request->session()->flash('success', 'Cập nhật thành công ');
        } catch (\Exception $err) {
            $request->session()->flash('error', 'Cập nhật thất bại');
            \Log::info($err->getMessage());
            return false ;
        }
        return true ;
    }

    public function delete($request){
        $product = Product::where('id', $request->input('id'))->first();
        if($product){
            $product->delete();
            return true ;
        }
        return false ;
    }
}