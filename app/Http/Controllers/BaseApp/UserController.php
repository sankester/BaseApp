<?php

namespace App\Http\Controllers\BaseApp;

use App\Http\Controllers\Base\BaseAdminController;
use App\Http\Requests\BaseApp\UserRequest;
use App\Repositories\BaseApp\RoleRepositories;
use App\Repositories\BaseApp\UserRepositories;
use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class UserController
 * @package App\Http\Controllers\BaseApp
 */
class UserController extends BaseAdminController
{
    public $repositories;

    protected $user;

    protected $signedIn;

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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // set rule page
        $this->setRule('r');
        // set page template
        $this->setTemplate('BaseApp.users.index');
        // load js
        $this->loadJs('theme/admin-template/js/plugins/notifications/sweet_alert.min.js');
        $this->loadJs('js/BaseApp/user/page_user.js');
        //set page title
        $this->setPageHeaderTitle('<span class="text-semibold">Users</span> - List User');
        // set breadcumb
        $data = [
            [
                'icon' => 'icon-users',
                'url' => 'home',
                'title' => 'Dasboard'
            ],
            [
                'title' => 'List User'
            ]
        ];
        $this->setBreadcumb($data);
        //assign data
        $this->assign('users', $this->repositories->getListPaginate(10));
        return $this->displayPage();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param RoleRepositories $roles
     * @return \Illuminate\Http\Response
     */
    public function create(RoleRepositories $roles)
    {
        // set rule page
        $this->setRule('c');
        // set page template
        $this->setTemplate('BaseApp.users.add');
        // load js
        $this->loadJs('theme/admin-template/js/plugins/forms/inputs/passy.js');
        $this->loadJs('js/BaseApp/plugin/initialPassy.js');
        $this->loadJs('theme/admin-template/js/plugins/forms/validation/validate.min.js');
        $this->loadJs('theme/admin-template/js/plugins/forms/validation/additional_methods.min.js');
        $this->loadJs('theme/admin-template/js/plugins/forms/selects/select2.min.js');
        $this->loadJs('js/BaseApp/user/page_user.js');
        $this->loadJs('js/BaseApp/user/validation-add.js');
        //set page title
        $this->setPageHeaderTitle('<span class="text-semibold">Users</span> - Add User');
        // set breadcumb
        $data = [
            [
                'icon' => 'icon-users',
                'url' => 'home',
                'title' => 'Dasboard'
            ],
            [
                'title' => 'List User',
                'url' => 'base/users',
            ],
            [
                'title' => 'Add User',
            ],

        ];
        // assign data
        $this->assign('roles', $roles->getAllSelect());
        $this->setBreadcumb($data);
        // display page
        return $this->displayPage();
    }

    /**
     * Store a newly created resource in storage.
     * @param UserRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(UserRequest $request)
    {
        // set rule page
        $this->setRule('c');
        // proses tambah user ke databse
        if($this->repositories->createUser($request->all())){
            // set notification success
            flash('Berhasil tambah data user')->success()->important();
        }else{
            // set notification error
            flash('Gagal tambah data user')->error()->important();
        }
        // redirect page
        return redirect('base/users/create');
    }

    /**
     * Display the specified resource.
     *
     * @param User $user
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function show(User $user)
    {

    }

    /**
     * Show the form for editing the specified resource.
     * @param User $user
     * @param RoleRepositories $roles
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user,  RoleRepositories $roles)
    {
        // set rule page
        $this->setRule('u');
        // set template
        $this->setTemplate('BaseApp.users.edit');
        // load js
        $this->loadJs('theme/admin-template/js/plugins/forms/inputs/passy.js');
        $this->loadJs('js/BaseApp/plugin/initialPassy.js');
        $this->loadJs('theme/admin-template/js/plugins/forms/validation/validate.min.js');
        $this->loadJs('theme/admin-template/js/plugins/forms/validation/additional_methods.min.js');
        $this->loadJs('theme/admin-template/js/plugins/forms/selects/select2.min.js');
        $this->loadJs('js/BaseApp/user/page_user.js');
        $this->loadJs('js/BaseApp/user/validation-edit.js');
        //set page title
        $this->setPageHeaderTitle('<span class="text-semibold">Users</span> - Edit User');
        // set breadcumb
        $data = [
            [
                'icon' => 'icon-users',
                'url' => 'home',
                'title' => 'Dasboard'
            ],
            [
                'title' => 'List User',
                'url' => 'base/users',
            ],
            [
                'title' => 'Edit User',
            ],

        ];
        $this->setBreadcumb($data);
        // assign data
        $this->assign('roles', $roles->getAllSelect());
        $this->assign('user', $user);
        return  $this->displayPage();
    }


    /**
     * Update the specified resource from storage.
     * @param UserRequest $request
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(UserRequest $request, User $user)
    {
        // set rule page
        $this->setRule('u');
        // proses update data user di database
        if($this->repositories->updateUser($request->all(), $user)){
            // set notification success
            flash('Berhasil ubah data user')->success()->important();
        }else{
            // set notification error
            flash('Gagal ubah data user')->error()->important();
        }
        // redirect page
        return redirect('base/users/'.$user->id.'/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @param UserRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(User $user, UserRequest $request)
    {
        // set rule page
        $this->setRule('d');
        // cek request ajax
        if ($request->ajax()){
            // cek rule
            $access = $this->setRule('d');
            if($access['access'] == 'failed'){
                return response(['message' => $access['message'], 'status' => 'failed']);
            }
            // apakah user login yang di hapus
            if($user->id != Auth::user()->getAuthIdentifier()){
                // proses hapus user dari database
                if($this->repositories->deleteUser($user)){
                    // set response
                    return response(['message' => 'Berhasil menghapus user.', 'status' => 'success']);
                }
            }else{
                // set response
                return response(['message' => 'Tidak bisa mengahpus diri sendiri.', 'status' => 'failed']);
            }

        }
        // set default response
        return response(['message' => 'Gagal menghapus user', 'status' => 'failed']);
    }

}
