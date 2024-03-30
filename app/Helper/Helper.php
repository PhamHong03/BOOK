<?php


namespace App\Helper;

use App\Models\Product;
use Illuminate\Support\Str;

class Helper {

    public static function menu($menus, $parent_id = 0, $char = '') {
        $html = '';
        foreach($menus as $key => $menu) {
            if($menu->parent_id == $parent_id) {
                $html .= '
                    <tr>

                        <td>'.$menu->id.'</td>
                        <td>'. $char.$menu->name.'</td>
                        <td>' .self::active( $menu->active).'</td>
                        <td>'.$menu->updated_at.'</td>
                        <td>
                            <a class="btn btn-primary btn-sm" href="/admin/menus/edit/'. $menu->id.' " >
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            <a class="btn btn-danger btn-sm" href ="#" onclick="removeRow('.$menu->id.',  \'/admin/menus/destroy\')" >
                                <i class="fa-solid fa-trash"></i>
                            </a>
                        </td>

                    </tr>
                ';
                unset($menus[$key]);

                $html .= self::menu($menus, $menu->id, $char. '|--' );
            } 
        }
        return $html;
    }

    public static function active($active = 0) :string
    {
        return $active == 0 ? '<span class = "btn btn-danger btn-xs">NO</span>' : '<span class = "btn btn-success btn-xs">YES</span>';
    }


    public static function menus($menus, $parent_id = 0) {
        $html = '';

        foreach($menus as $key => $menu) {
            if($menu->parent_id == $parent_id) {
                $html .= '
                    <li class="nav__menu--item">
                        <a href="/danh-muc/' . $menu->id. '-' . Str::slug($menu->name, '-') . ' .html">
                            ' .$menu->name . '
                        </a>
                    </li>
                ';
            }
        }
        return $html;

    }

    public static function price($price = 0, $price_sale = 0)  {
        if($price_sale != 0) return number_format($price_sale);

        if($price != 0) return number_format($price_sale);

        return  '<a href="/lien-he.html">Liên Hệ</a>';
    }
    
    public static function price_price($price) {
        return number_format($price);
    }


    public static function price_sal($price, $price_sale) {
        $price_sal = number_format($price - ( $price * ($price_sale / 100)));

        return $price_sal;
    }
    public static function price_s($price, $price_sale) {
        $price_sal = $price - ( $price * ($price_sale / 100));

        return $price_sal;
    }
}