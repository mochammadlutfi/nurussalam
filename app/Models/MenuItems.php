<?php
namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class MenuItems extends Model
{

    protected $table = 'menu_items';

    protected $fillable = ['label', 'link', 'parent', 'sort', 'class', 'menu', 'depth', 'role_id'];

    public function getsons($id)
    {
        return $this->where("parent", $id)->get();
    }
    public function getall($id)
    {
        return $this->where("menu", $id)->orderBy("sort", "asc")->get();
    }

    public static function getNextSortRoot($menu)
    {
        return self::where('menu', $menu)->max('sort') + 1;
    }

    public function parent_menu()
    {
        return $this->belongsTo('Models\Menus', 'menu');
    }

    public function child()
    {
        return $this->hasMany('Models\MenuItems', 'parent')->orderBy('sort', 'ASC');
    }

    public function page()
    {
        return $this->belongsTo('App\Models\Page', 'page_id');
    }
}
