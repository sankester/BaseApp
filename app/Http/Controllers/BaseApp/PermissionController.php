<?php

namespace App\Http\Controllers\BaseApp;

use App\Http\Controllers\Base\BaseAdminController;
use App\Portal;
use App\Repositories\BaseApp\Permissions;
use App\Repositories\BaseApp\Roles;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PermissionController extends BaseAdminController
{
    /**
     * @var Permissions
     */
    private $permissions;

    /**
     * @var Roles
     */
    private $roles;

    public function __construct(Permissions $permissions, Request $request, Roles $roles)
    {
        parent::__construct($request);
        $this->permissions = $permissions;
        $this->roles = $roles;
    }

    public function index()
    {
        // set rule page
        $this->setRule('r');
        // set page template
        $this->setTemplate('BaseApp.permissions.index');
        //set page title
        $this->setPageHeaderTitle('<span class="text-semibold">Permissions</span> - List Role');
        // set breadcumb
        $data = [
            [
                'icon' => 'icon-user-lock',
                'url' => 'home',
                'title' => 'Dasboard'
            ],
            [
                'title' => 'List Role Permissions'
            ]
        ];
        $this->setBreadcumb($data);
        //assign data
        $this->assign('roles', $this->roles->getListPaginate(10));
        // display page
        return $this->displayPage();
    }

    public function edit(Role $role)
    {
        // set rule page
        $this->setRule('u');
        // set page template
        $this->setTemplate('BaseApp.permissions.edit');
        // load js
        $this->loadJs('theme/admin-template/js/plugins/forms/styling/uniform.min.js');
        //set page title
        $this->setPageHeaderTitle('<span class="text-semibold">Permissions</span> - List Menu');
        // set breadcumb
        $data = [
            [
                'icon' => 'icon-user-lock',
                'url' => 'home',
                'title' => 'Dasboard'
            ],
            [
                'url' => 'permissions',
                'title' => 'List Role'
            ],
            [
                'title' => 'List Menu'
            ]
        ];
        $this->setBreadcumb($data);
        // get data
        $listMenu  = $this->permissions->getListMenu($role->portal_id,0,'');
        foreach ( $listMenu as $key => $menu) {
            $c = isset($menu->roles->where('id','=',$role->id)->first()->pivot->c) ?  $menu->roles->where('id','=',$role->id)->first()->pivot->c :  0;
            $r = isset($menu->roles->where('id','=',$role->id)->first()->pivot->r) ?  $menu->roles->where('id','=',$role->id)->first()->pivot->r :  0;
            $u = isset($menu->roles->where('id','=',$role->id)->first()->pivot->u) ?  $menu->roles->where('id','=',$role->id)->first()->pivot->u :  0;
            $d = isset($menu->roles->where('id','=',$role->id)->first()->pivot->d) ?  $menu->roles->where('id','=',$role->id)->first()->pivot->d :  0;
            if($c == 1 && $r == 1 && $u == 1 && $d == 1){
                $listMenu[$key]->check_all = true;
            }else{
                $listMenu[$key]->check_all = false;
            }
        }
        //assign data
        $this->assign('role', $role);
        $this->assign('listMenu', $listMenu );
        // display page
        return $this->displayPage();
    }

    public function update(Role $role, Request $request)
    {
        // set rule page
        $this->setRule('u');
        // proses update permissions
        $this->permissions->update($request->all(),$role);
        flash('Berhasil mengupdate permissions.')->success()->important();
        // redirect page
        return redirect('base/permissions/'.$role->id);
    }
}
