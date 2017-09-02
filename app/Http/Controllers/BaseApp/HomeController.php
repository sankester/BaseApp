<?php

namespace App\Http\Controllers\BaseApp;

use App\Http\Controllers\Base\BaseAdminController;
use App\Repositories\BaseApp\NavRepositories;
use App\Repositories\BaseApp\PortalRepositories;
use App\Repositories\BaseApp\RoleRepositories;
use App\Repositories\BaseApp\UserRepositories;
use Illuminate\Http\Request;

class HomeController extends BaseAdminController
{
    /**
     * Create a new controller instance.
     *
     * @param Request $request
     */
    public function __construct(Request $request)
    {
       parent::__construct($request);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->setRule('r');
        // set page template
        $this->setTemplate('BaseApp.admin.home');
        // set page header
        $this->setPageHeaderTitle('<span class="text-semibold">Home</span> - Dashboard');
        // set breadcumb
        $data = [
            [
                'icon' => 'icon-home2',
                'title' => 'Dasboard'
            ],
        ];
        $userRepositories = new UserRepositories();
        $roleRepositories = new RoleRepositories();
        $portalRepositories = new PortalRepositories();
        $navRepositories = new NavRepositories();
        $this->assign('countUser', $userRepositories->getCountUser());
        $this->assign('countRole', $roleRepositories->getCountRole());
        $this->assign('countPortal', $portalRepositories->getCountPortal());
        $this->assign('countNav', $navRepositories->getCountNav());
        $this->setBreadcumb($data);
        return $this->displayPage();
    }
}
