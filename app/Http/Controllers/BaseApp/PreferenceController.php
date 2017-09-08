<?php

namespace App\Http\Controllers\BaseApp;

use App\Http\Controllers\Base\BaseAdminController;
use App\Http\Requests\BaseApp\PreferenceRequest;
use App\Model\Preference;
use App\Repositories\BaseApp\PreferenceRepository;
use Illuminate\Http\Request;

class PreferenceController extends BaseAdminController
{

    protected $repositories;

    public function __construct(PreferenceRepository $repositories, Request $request)
    {
        // load parent construct
        parent::__construct($request);
        // initial preference repositories
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
        $this->setTemplate('BaseApp.preferences.index');
        // load js
        $this->loadJs('theme/admin-template/js/plugins/notifications/sweet_alert.min.js');
        $this->loadJs('js/BaseApp/preference/page_preference.js');
        //set page title
        $this->setPageHeaderTitle('<span class="text-semibold">Preference</span> - List Preference');
        // set breadcumb
        $data = [
            [
                'icon' => 'icon-qrcode',
                'url' => 'home',
                'title' => 'Dasboard'
            ],
            [
                'title' => 'List Preference'
            ]
        ];
        $this->setBreadcumb($data);
        //assign data
        $this->assign('preferences', $this->repositories->getListPaginate(10));
        // display page
        return $this->displayPage();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // set rule page
        $this->setRule('c');
        // set page template
        $this->setTemplate('BaseApp.preferences.add');
        // load js
        $this->loadJs('theme/admin-template/js/plugins/forms/validation/validate.min.js');
        $this->loadJs('theme/admin-template/js/plugins/forms/validation/additional_methods.min.js');
        $this->loadJs('js/BaseApp/preference/validation.js');
        //set page title
        $this->setPageHeaderTitle('<span class="text-semibold">Preference</span> - Add Preference');
        // set breadcumb
        $data = [
            [
                'icon' => 'icon-qrcode',
                'url' => 'home',
                'title' => 'Dasboard'
            ],
            [
                'title' => 'List Preference',
                'url' => 'base/preference',
            ],
            [
                'title' => 'Add Preference',
            ],

        ];
        $this->setBreadcumb($data);
        // load view
        return $this->displayPage();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PreferenceRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(PreferenceRequest $request)
    {
        // set rule page
        $this->setRule('c');
        // proses tambah preference ke database
        if($this->repositories->createPreference($request->all())){
            // set notifikasi sukses
            flash('Berhasil tambah data preference')->success()->important();
        }else{
            // set notifikasi error
            flash('Gagal tambah data preference')->error()->important();
        }
        // redirect page
        return redirect('base/preferences/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Preference  $preference
     * @return \Illuminate\Http\Response
     */
    public function show(Preference $preference)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Preference  $preference
     * @return \Illuminate\Http\Response
     */
    public function edit(Preference $preference)
    {
        // set rule page
        $this->setRule('u');
        // set template
        $this->setTemplate('BaseApp.preferences.edit');
        // load js
        $this->loadJs('theme/admin-template/js/plugins/forms/validation/validate.min.js');
        $this->loadJs('theme/admin-template/js/plugins/forms/validation/additional_methods.min.js');
        $this->loadJs('js/BaseApp/preference/page_preference.js');
        $this->loadJs('js/BaseApp/preference/validation.js');
        //set page title
        $this->setPageHeaderTitle('<span class="text-semibold">Preferences</span> - Edit Preference');
        // set breadcumb
        $data = [
            [
                'icon' => 'icon-icon-earth',
                'url' => 'home',
                'title' => 'Dasboard'
            ],
            [
                'title' => 'List Preference',
                'url' => 'base/preferences',
            ],
            [
                'title' => 'Edit Preference',
            ],

        ];
        $this->setBreadcumb($data);
        // assign data
        $this->assign('preference',$preference);
        // display page
        return  $this->displayPage();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PreferenceRequest $request
     * @param  \App\Model\Preference $preference
     * @return \Illuminate\Http\Response
     */
    public function update(PreferenceRequest $request, Preference $preference)
    {
        // set rule page
        $this->setRule('u');
        // proses update data preference di database
        if($this->repositories->updatePreference($request->all(), $preference)){
            // set notifikasi success
            flash('Berhasil ubah data preference')->success()->important();
        }else{
            // set notifikasi error
            flash('Gagal ubah data preference')->error()->important();
        }
        // redirect page
        return redirect('base/preferences/'.$preference->id.'/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Preference $preference
     * @param PreferenceRequest $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Preference $preference, PreferenceRequest $request)
    {
        // cek apakah ajax request
        if ($request->ajax()){
            // cek rule
            $access = $this->setRule('d');
            if($access['access'] == 'failed'){
                return response(['message' => $access['message'], 'status' => 'failed']);
            }
            // proses hapus preference dari database
            if($this->repositories->deletePreference($preference)){
                // set response
                return response(['message' => 'Berhasil menghapus preference.', 'status' => 'success']);
            }
        }
        // default response
        return response(['message' => 'Gagal menghapus preference', 'status' => 'failed']);
    }
}
