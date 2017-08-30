<?php
/**
 * Created by PhpStorm.
 * User: achva
 * Date: 23/08/2017
 * Time: 19:35
 */

namespace App\Repositories\BaseApp;

use App\Nav;
use App\Portal;
use Illuminate\Support\Facades\Auth;

/**
 * Class Navs
 * @package App\Repositories\BaseApp
 */
class Navs
{
    /**
     * Mengambil list menu berdasarkan portal
     * @param $portalId
     * @param $parentId
     * @param $indent
     * @param array $navViews
     * @return array : List menu
     */
    public function getMenuByPortal($portalId, $parentId, $indent, $navViews = array())
    {
        $portal = Portal::findOrFail($portalId);
        $navs = $portal->navs()->where('parent_id', $parentId)->orderBy('nav_no', 'asc')->get()->toArray();
        if(! empty($navs)){
            foreach ($navs as $key => $nav) {
                $nav['nav_title'] = $indent.$nav['nav_title'];
                $childs = $portal->navs()->where('parent_id', $nav['id'])->get()->toArray();
                $navViews[] = $nav;
                if(!empty($childs)){
                    $indentChils = $indent."--- ";
                    $navViews = $this->getMenuByPortal($nav['portal_id'],$nav['id'], $indentChils, $navViews);
                }
            }
        }
		return  $navViews ;
    }

    public function generateMenu($portalId , $nav_active)
    {
        $html = "";
        //get nav by parent
        $navs =Auth::user()->role->navs()->where('parent_id', 0)->where('display_st', '1')->orderBy('nav_no', 'asc')->get();
        if (!empty($navs)) {
            foreach ($navs as $key => $nav) {
                $selected = ($nav->id == $nav_active) ? "class='active'" : "";
                $url = ($nav->nav_st == 'internal') ? url($nav->nav_url) : $nav->nav_url;
                $target = ($nav->nav_st != 'internal') ? '_blank' : '_self';
                $icon = (str_contains($nav->nav_icon, 'fa-')) ? 'fa '.$nav->nav_icon :$nav->nav_icon;
                $html .= '<li '.$selected.'>';
                $html .= '<a href="'.$url.'" target="'.$target.'><i class="'.$icon.'"></i><span>'.$nav->nav_title.'</span></a>';
                $str_child_html = $this->getChildNav($nav->id);
                $html .= !empty($str_child_html) ? $str_child_html : '';
                $html .= "</li>";
            }
        }
        return $html;
    }

    private function getChildNav($nav_id){

        $navs = Nav::where('parent_id', $nav_id)->orderBy('nav_no', 'asc')->get();
        $html = '';
        if($navs->count() > 0){
            $html .= '<ul>';
            foreach ($navs as $key => $nav) {
                $html .= "<li>";
                $url = ($nav->nav_st == 'internal') ? url($nav->nav_url) : $nav->nav_url;
                $target = ($nav->nav_st != 'internal') ? '_blank' : '_self';
                $icon = (str_contains($nav->nav_icon, 'fa-')) ? 'fa '.$nav->nav_icon :$nav->nav_icon;
                $html .= '<a href="'.$url.'" target="'.$target.'"><i class="'.$icon.'"></i><span>'.$nav->nav_title.'</span></a>';
                $childs =  Nav::where('parent_id', $nav->id)->orderBy('nav_no', 'asc')->get();
                if(!empty($childs)){
                    $html .= $this->getChildNav($nav->id);
                }
                $html .= "</li>";
            }
            $html .= '</ul>';
        }
        return  $html ;
    }



    /**
     * Mengambil list menu berdasarkan parent
     * @param $portal_id
     * @return array : List Menu
     */
    public static function getMenuParent($portal_id)
    {
        $listParent = array('0' => 'Tidak Ada');
        $listMenu = (new self)->getMenuByPortal($portal_id, 0,'' );
        foreach ($listMenu as $key => $item) {
            $listParent[$item['id']] = $item['nav_title'];
        }

        return $listParent;
    }

    public static function getNavByUrl($url)
    {
        $nav = Nav::where('nav_url','=',$url)->first();
        return $nav;
    }

    /**
     * Proses menyimpan navigasi ke database
     * @param $params
     * @return $this|\Illuminate\Database\Eloquent\Model
     */
    public function createNav($params)
    {
        $params['user_id'] = Auth::user()->id;
        return Nav::create($params);
    }

    /**
     * Proses mengupdate data navigasi di database
     * @param $params
     * @param $nav
     * @return bool
     * @internal param $id
     */
    public function updateNav($params, $nav){
        return $nav->update($params);
    }

    /**
     * Proses hapus navigasi dari database
     * @param $nav
     * @return bool|null
     * @internal param $id
     */
    public function deleteNav($nav)
    {
        return $nav->delete();
    }

    public static function getById($id)
    {
        return Nav::findOrFail($id);
    }
}