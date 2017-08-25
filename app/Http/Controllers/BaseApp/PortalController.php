<?php

namespace App\Http\Controllers\BaseApp;


use App\Http\Controllers\Base\BaseAdminController;
use App\Http\Requests\BaseApp\PortalRequest;
use App\portal;
use App\Repositories\BaseApp\Portals;

class PortalController extends BaseAdminController
{
    /**
     * @var Portals
     */
    private $portals;

    /**
     * PortalController constructor.
     * @param Portals $portals
     */
    public function __construct(Portals $portals)
    {
        // load perent construct
        parent::__construct();
        // initial portal repositories
        $this->portals = $portals;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // set page template
        $this->setTemplate('BaseApp.portals.index');
        // load js
        $this->loadJs('theme/admin-template/js/plugins/notifications/sweet_alert.min.js');
        $this->loadJs('js/BaseApp/portal/page_portal.js');
        //set page title
        $this->setPageHeaderTitle('<span class="text-semibold">Portals</span> - List Portal');
        // set breadcumb
        $data = [
            [
                'icon' => 'icon-earth',
                'url' => 'home',
                'title' => 'Dasboard'
            ],
            [
                'title' => 'List Portal'
            ]
        ];
        $this->setBreadcumb($data);
        //assign data
        $this->assign('portals', $this->portals->getListPaginate(10));
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
        // set page template
        $this->setTemplate('BaseApp.portals.add');
        // load js
        $this->loadJs('theme/admin-template/js/plugins/forms/validation/validate.min.js');
        $this->loadJs('theme/admin-template/js/plugins/forms/validation/additional_methods.min.js');
        $this->loadJs('js/BaseApp/portal/page_portal.js');
        $this->loadJs('js/BaseApp/portal/validation.js');
        //set page title
        $this->setPageHeaderTitle('<span class="text-semibold">Portals</span> - Add Portals');
        // set breadcumb
        $data = [
            [
                'icon' => 'icon-icon-earth',
                'url' => 'home',
                'title' => 'Dasboard'
            ],
            [
                'title' => 'List Portal',
                'url' => 'base/portals',
            ],
            [
                'title' => 'Add Portal',
            ],

        ];
        $this->setBreadcumb($data);
        // load view
        return $this->displayPage();
    }


    /**
     * Proses tambah portal ke database
     * @param PortalRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(PortalRequest $request)
    {
        // proses tambah portal ke database
        if($this->portals->createPortal($request->all())){
            // set notifikasi sukses
            flash('Berhasil tambah data portal')->success()->important();
        }else{
            // set notifikasi error
            flash('Gagal tambah data portal')->error()->important();
        }
        // redirect page
        return redirect('base/portals/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\portal  $portal
     * @return \Illuminate\Http\Response
     */
    public function show(portal $portal)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\portal  $portal
     * @return \Illuminate\Http\Response
     */
    public function edit(portal $portal)
    {
        // set template
        $this->setTemplate('BaseApp.portals.edit');
        // load js
        $this->loadJs('theme/admin-template/js/plugins/forms/validation/validate.min.js');
        $this->loadJs('theme/admin-template/js/plugins/forms/validation/additional_methods.min.js');
        $this->loadJs('js/BaseApp/portal/page_portal.js');
        $this->loadJs('js/BaseApp/portal/validation.js');
        //set page title
        $this->setPageHeaderTitle('<span class="text-semibold">Portals</span> - Edit Portal');
        // set breadcumb
        $data = [
            [
                'icon' => 'icon-icon-earth',
                'url' => 'home',
                'title' => 'Dasboard'
            ],
            [
                'title' => 'List Portal',
                'url' => 'base/portals',
            ],
            [
                'title' => 'Edit Portal',
            ],

        ];
        $this->setBreadcumb($data);
        // assign data
        $this->assign('portal',$portal);
        // display page
        return  $this->displayPage();
    }


    /**
     * Proses ubah data portal di database
     * @param PortalRequest $request
     * @param portal $portal
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(PortalRequest $request, portal $portal)
    {
        // proses update data portal di database
        if($this->portals->updatePortal($request->all(), $portal->id)){
            // set notifikasi success
            flash('Berhasil ubah data portal')->success()->important();
        }else{
            // set notifikasi error
            flash('Gagal ubah data portal')->error()->important();
        }
        // redirect page
        return redirect('base/portals/'.$portal->id.'/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\portal  $portal
     * @return \Illuminate\Http\Response
     */
    public function destroy(portal $portal, PortalRequest $request)
    {
        // cek apakah ajax request
        if ($request->ajax()){
            // proses hapus portal dari database
            if($this->portals->deletePortal($portal->id)){
                // set response
                return response(['message' => 'Berhasil menghapus portal.', 'status' => 'success']);
            }
        }
        // default response
        return response(['message' => 'Gagal menghapus portal', 'status' => 'failed']);
    }
}
