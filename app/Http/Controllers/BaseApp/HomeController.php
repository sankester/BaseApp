<?php

namespace App\Http\Controllers\BaseApp;

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
    public function __construct(Request $request)
    {
       parent::__construct($request);
        $this->middleware('isPortal:BaseApp Admin Portal');
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
