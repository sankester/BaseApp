<?php

namespace App\Http\Controllers\BaseApp;

use App\Http\Controllers\Base\BaseAdminController;
use App\Libs\LogLib\LogRepository;
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
        // load js
        $this->loadJs('theme/admin-template/js/plugins/notifications/sweet_alert.min.js');
        $this->loadJs('theme/admin-template/js/plugins/buttons/spin.min.js');
        $this->loadJs('theme/admin-template/js/plugins/buttons/ladda.min.js');
        $this->loadJs('js/BaseApp/home/page_home.js');
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
        $this->assign('logs', LogRepository::getLogPortal(1, 10));
        $this->setBreadcumb($data);
        return $this->displayPage();
    }

    public function loadpage(Request $request)
    {
        // cek apakah ajax request
        if ($request->ajax()){
            // cek rule
            $access = $this->setRule('r');
            if($access['access'] == 'failed'){
                return response(['message' => $access['message'], 'status' => 'failed']);
            }
            $htmlData = '';
            $data = LogRepository::getLogPortal(1, 10);

            // default response
            foreach ($data as $log) {
                $htmlData .= '<div class="timeline-row"><div class="timeline-icon"><a href="#">';
                $htmlData .= '<img alt="log" class="img-circle" src="http://localhost:8000/theme/admin-template/images/placeholder.jpg">';
                $htmlData .= '</a></div><div class="row"><div class="col-lg-12"><div class="panel panel-flat timeline-content"><div class="panel-heading">';
                $htmlData .= '<h6 class="panel-title">' . $log->user->name . '<a class="heading-elements-toggle"><i class="icon-more"></i></a></h6>';
                $htmlData .= '<div class="heading-elements"><span class="heading-text"><i class="icon-checkmark-circle position-left text-success"></i>' . $log->created_at->diffForHumans() . '</span><ul class="icons-list"></ul></div></div>';
                $htmlData .= '<div class="panel-body"><h6 class="content-group"><i class="icon-user-check position-left"></i><a href="#"></a>' . $log->action . ' :</h6>';
                $htmlData .= '<blockquote><p>' . $log->description . '</p><footer>' . $log->user->username . ', <cite title="Source Title">' . $log->created_at->format('h:i A') . '</cite></footer></blockquote>';
                $htmlData .= '</div></div></div></div></div>';
            }
            if(is_null($data->nextPageUrl())){
                return response(['logs' => $htmlData,'end' => true]);
            }else{
                return response(['logs' => $htmlData,'end' => false]);
            }
        }
        // default response
        return response(['message' => 'Gagal mengambil data', 'status' => 'failed']);

    }
}
