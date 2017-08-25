<?php

namespace App\Http\Controllers\Base;


use App\Http\Controllers\Controller;
use App\Libs\PageLib\PageTrait;

/**
 * Class BaseAdminController
 * @package App\Http\Controllers\Base
 */
class BaseAdminController extends Controller
{
    use PageTrait;
    /**
     * BaseAdminController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->initialPage();
        $this->setDefaultCss();
        $this->setDefaultJs();
    }

    /**
     * Set default css to load
     */
    protected function setDefaultCss(){
        $css = [
            'theme/admin-template/css/icons/icomoon/styles.css',
            'theme/admin-template/css/all.css',
            'theme/admin-template/css/custom.css'
        ];
       $this->loadCss($css);
    }

    /**
     * Set Default Js to load
     */
    protected function setDefaultJs()
    {
        $Js= ['theme/admin-template/js/plugins/loaders/pace.min.js',
            'theme/admin-template/js/core/libraries/jquery.min.js',
            'theme/admin-template/js/core/libraries/bootstrap.min.js',
            'theme/admin-template/js/plugins/loaders/blockui.min.js',
            'theme/admin-template/js/core/app.js'];
        $this->loadJs($Js);
    }

}
