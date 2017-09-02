<?php

namespace App\Http\Controllers\BaseApp;

use App\Http\Controllers\Base\BaseAdminController;
use App\Http\Requests\BaseApp\UserRequest;
use App\Repositories\BaseApp\UserRepositories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends BaseAdminController
{

    /**
     * @var UserRepositories
     */
    protected $repositories;

    /**
     * UserController constructor.
     * @param UserRepositories $repositories
     * @param Request $request
     * @internal param Users $users
     */
    public function __construct(UserRepositories $repositories, Request $request)
    {
        // load parent construct
        parent::__construct($request);
        $this->repositories = $repositories;
    }

    /**
     * Show form edit data user login
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function index()
    {
        // set rule page
        $this->setRule('r');
        // set page template
        $this->setTemplate('BaseApp.users.profile');
        // load js
        $this->loadJs('theme/admin-template/js/plugins/forms/inputs/passy.js');
        $this->loadJs('js/BaseApp/plugin/initialPassy.js');
        $this->loadJs('theme/admin-template/js/plugins/forms/validation/validate.min.js');
        $this->loadJs('theme/admin-template/js/plugins/forms/validation/additional_methods.min.js');
        $this->loadJs('theme/admin-template/js/plugins/forms/selects/select2.min.js');
        $this->loadJs('js/BaseApp/user/page_user.js');
        $this->loadJs('js/BaseApp/user/validation-edit.js');
        //set page title
        $this->setPageHeaderTitle('<span class="text-semibold">Users</span> - Profile User');
        // set breadcumb
        $data = [
            [
                'icon' => 'icon-users',
                'url' => 'home',
                'title' => 'Dasboard'
            ],
            [
                'title' => 'Profil User'
            ]
        ];
        $this->setBreadcumb($data);
        //assign data
        $this->assign('user', Auth::user());
        return $this->displayPage();
    }

    /**
     * Update the user login data.
     * @param UserRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(UserRequest $request)
    {
        // set rule page
        $this->setRule('u');
        // proses update data user di database
        if($this->repositories->updateUserLogin($request->all())){
            // set notification success
            flash('Berhasil ubah data user')->success()->important();
        }else{
            // set notification error
            flash('Gagal ubah data user')->error()->important();
        }
        // redirect page
        return redirect('base/profile');
    }
}

