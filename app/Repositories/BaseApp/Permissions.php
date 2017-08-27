<?php
/**
 * Created by PhpStorm.
 * User: achva
 * Date: 26/08/2017
 * Time: 03:47
 */

namespace App\Repositories\BaseApp;

use App\Portal;
use App\Role;

class Permissions
{
    public function getListMenu($portalId, $parentId, $indent, $navViews = array())
    {
        $portal = Portal::findOrFail($portalId);
        $navs = $portal->navs->where('parent_id', $parentId)->all();
        if(! empty($navs)){
            foreach ($navs as $key => $nav) {
                $defaultAccess = ['c' =>'0','r' =>'0','u' =>'0','d' =>'0'];
                $nav['nav_title'] = $indent.$nav['nav_title'];
                $childs = $portal->navs->where('parent_id', $nav['id'])->toArray();
                $navViews[] = $nav;
                if(!empty($childs)){
                    $indentChils = $indent."--- ";
                    $navViews = $this->getListMenu($nav['portal_id'],$nav['id'], $indentChils, $navViews);
                }
            }
        }
        return  $navViews ;
    }

    public function update($roles, Role $role)
    {
        $defaultRole = [
            'c' => 0,
            'r' => 0,
            'u' => 0,
            'd' => 0
        ];
        $roleToUpdate = array();
        foreach ($roles['roles'] as $key => $itemRole) {
//            $roleToUpdate[$key]['role_id']= $role->id;
            $roleToUpdate[$key]['nav_id']= intval($itemRole['nav_id']);
            foreach ($defaultRole as $keyRoleDefault => $item) {
                if(isset($itemRole[$keyRoleDefault])){
                    $roleToUpdate[$key][$keyRoleDefault]= intval($itemRole[$keyRoleDefault]);
                }else{
                    $roleToUpdate[$key][$keyRoleDefault] = $item;
                }
            }
        }
        $this->syncRole($role, $roleToUpdate);

    }

    public function syncRole(Role $role, array $roles)
    {
        $listRoleData = array();
        $listNavId = array();
        foreach ($roles as $nav) {
            $listNavId[] = $nav['nav_id'];
        }
        foreach ($roles as $key => $roleNav) {
            $listRoleData[$key]['c'] = $roleNav['c'];
            $listRoleData[$key]['r'] = $roleNav['r'];
            $listRoleData[$key]['u'] = $roleNav['u'];
            $listRoleData[$key]['d'] = $roleNav['d'];
        }
        $role->navs()->detach();
        foreach ($listNavId as $key => $navID) {
            $role->navs()->attach(
                $navID,
                [
                    'c'=> $listRoleData[$key]['c'],
                    'r'=> $listRoleData[$key]['r'],
                    'u'=> $listRoleData[$key]['u'],
                    'd'=> $listRoleData[$key]['d']
                ]);
        }
    }
}