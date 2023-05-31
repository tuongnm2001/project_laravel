<?php

namespace App\Http\Services\Slider;
use App\Models\Slider;

class SliderService{
    
    public function insert($request){
        try {
            // $request->except('_token');
            Slider::create($request->input());
            $request->session()->flash('success', 'Thêm slider thành công');
        } catch (\Exception $err) {
            $request->session()->flash('error', 'Thêm slider thất bại');
            \Log::info($err->getMessage());

            return false ;
        }
        return true ;
    }

    public function get(){
        return Slider::orderByDesc('updated_at')->paginate(15);
    }

    public function update($request , $slider){
        try {
            $slider->fill($request->input());
            $slider->save();
            $request->session()->flash('success', 'Cập nhật Slider thành công');
        } catch (\Exception $err) {
            $request->session()->flash('error', 'Cập nhật Slider thất bại');
            \Log::info($err->getMessage());
            return false ;
        }
        return true ;
    }

    public function delete($request){
        $slider = Slider::where('id', $request->input('id'))->first();
        if($slider){
            // $path = str_replace('storage', 'public', $slider->thumb);
            // Storage::delete($path);
            $slider->delete();
            return true ;
        }
        return false ;
    }
}


