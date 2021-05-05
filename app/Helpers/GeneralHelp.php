<?php
use App\Models\Visitor;
use App\Models\Menu;
use App\Models\MenuItems;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
if (!function_exists('getMenu')) {

    /**
     * description
     *
     * @param
     * @return
     */
    function getMenu($menu_id)
    {
        // return Menu::find($id);

        $menuItem = new MenuItems;
        $menu_list = $menuItem->getall($menu_id);
        $roots = $menu_list->where('menu', (integer) $menu_id)->where('parent', 0);
        $items = tree($roots, $menu_list);
        return $items;
    }

    function tree($items, $all_items)
    {
        $data_arr = array();
        $i = 0;
        foreach ($items as $item) {
            $data_arr[$i] = $item->toArray();
            if($item->tipe == 'link')
            {
                $data_arr[$i]['url'] = $item->link;
            }else if($item->tipe == 'modules'){
                $data_arr[$i]['url'] = route($item->route);
            }else if($item->tipe == 'page'){
                $data_arr[$i]['url'] = '';
            }
            $find = $all_items->where('parent', $item->id);
            $data_arr[$i]['child'] = array();
            if ($find->count()) {
                $data_arr[$i]['child'] = tree($find, $all_items);
            }

            $i++;
        }

        return $data_arr;
    }
}

if (!function_exists('validateDate')) {

    /**
     * description
     *
     * @param
     * @return
     */
    function validateDate($date, $format = 'j-n-Y'){
        $d = DateTime::createFromFormat($format, $date);
        return $d && $d->format($format) === $date;
    }
}


if (!function_exists('getFeaturedImg')) {

    /**
     * description
     *
     * @param
     * @return
     */
    function getFeaturedImg($img){

        if (file_exists( public_path() . '/' . $img) && $img !== null) {
            return asset($img);
        } else {
            return asset('assets/img/thumbnail.jpg');
        }
    }
}


if (!function_exists('UserAgentBrowser')) {

    /**
     * description
     *
     * @param
     * @return
     */
    function UserAgentBrowser($purpose)
    {

        if(preg_match('/MSIE/i',$purpose) && !preg_match('/Opera/i',$purpose))
        {
            $bname      = 'Internet Explorer';
            $ub         = "MSIE";
        }
        elseif(preg_match('/Firefox/i',$purpose))
        {
            $bname      = 'Mozilla Firefox';
            $ub         = "Firefox";
        }
        elseif(preg_match('/Chrome/i',$purpose))
        {
            $bname      = 'Google Chrome';
            $ub         = "Chrome";
        }
        elseif(preg_match('/Safari/i',$purpose))
        {
            $bname      = 'Apple Safari';
            $ub         = "Safari";
        }
        elseif(preg_match('/Opera/i',$purpose))
        {
            $bname      = 'Opera';
            $ub         = "Opera";
        }
        elseif(preg_match('/Netscape/i',$purpose))
        {
            $bname      = 'Netscape';
            $ub         = "Netscape";
        }

        return $bname;

    }
}

