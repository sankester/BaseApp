<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Base\BaseAdminController;
use App\Repositories\BaseApp\Users;
use Illuminate\Http\Request;

class HomeController extends BaseAdminController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       parent::__construct();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // set page template
        $this->setTemplate('home');
        // set page header
        $this->setPageHeaderTitle('<span class="text-semibold">Home</span> - Dashboard');
        // set breadcumb
        $data = [
            [
                'icon' => 'icon-home2',
                'title' => 'Dasboard'
            ],
        ];
        $this->setBreadcumb($data);
        return $this->displayPage();
    }
}
