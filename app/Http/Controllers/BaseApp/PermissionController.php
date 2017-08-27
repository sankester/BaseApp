<?php

namespace App\Http\Controllers\BaseApp;

use App\Http\Controllers\Base\BaseAdminController;
use App\Portal;
use App\Repositories\BaseApp\Permissions;
use App\Repositories\BaseApp\Roles;
use App\Role;
use Illuminate\Http\Request;

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
//        $this->setRule('r');
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
//        $this->setRule('u');
        // set page template
        $this->setTemplate('BaseApp.permissions.edit');
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
        //assign data
        $this->assign('role', $role);
        $this->assign('listMenu', $this->permissions->getListMenu($role->portal_id,0,''));
        // display page
        return $this->displayPage();
    }

    public function update(Role $role, Request $request)
    {
        // set rule page
//        $this->setRule('u');
        // proses update permissions
        $this->permissions->update($request->all(),$role);
        flash('Berhasil mengupdate permissions.')->success()->important();
        // redirect page
        return redirect('base/permissions/'.$role->id);
    }
}
