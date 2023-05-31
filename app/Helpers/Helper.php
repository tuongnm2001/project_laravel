<?php

namespace App\Helpers;

use Illuminate\Support\Str;

class Helper{

    public static function menu($menus, $parent_id=0 , $char =''){
        $html='';
        foreach ($menus as $key => $menu) {
            if($menu->parent_id == $parent_id){
                $html.= '
                    <tr>
                        <td>'.$menu->id.'</td>
                        <td>'.$char.$menu->name.'</td>
                        <td>'. self::active($menu->active).'</td>
                        <td>'.$menu->updated_at.'</td>
                        <td> 
                            <a class="btn btn-warning" href="/admin/menus/edit/'.$menu->id.'">
                                <i class="fas fa-edit"></i>
                            </a>

                            <a href="#" class="btn btn-danger" onclick="removeRow('.$menu->id.',\'/admin/menus/destroy\')">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                        
                    </tr>
                ';

                unset($menus[$key]);

                $html .= self::menu($menus, $menu->id , $char . '|--');
            }
        }
        return $html ;
    }

    public static function active($active = 0){
        return $active === 0 ? '<span class="btn btn-danger btn-xs">NO</span>' : 
        '<span  class="btn btn-success btn-xs">YES</span>';
    }

    public static function menus($menus , $parent_id = 0){
        $html = '';
        foreach ($menus as $key => $item) {
            if($item->parent_id == $parent_id){
                $html .= '
                    <li>
                        <a href="/danh-muc/' . $item->id . '-'. Str::slug($item->name,'-').'.html">
                            '. $item->name .'
                        </a>';

                        if(self::isChild($menus , $item->id)){
                            $html .= '<ul class="sub-menu">';
                            $html .= self::menus($menus, $item->id);
                            $html .= '</ul>';
                        }
                    $html .='</li>';
            }
        }
        return $html ;
    }   

    //Xử lý function cấp 2 
    public static function isChild($menus , $id){
        foreach($menus as $item){
            if($item->parent_id = $id){
                return true ;
            }
        }
        return false ;
    }

}