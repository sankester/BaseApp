<?php
/**
 * Created by PhpStorm.
 * User: achva
 * Date: 13/08/2017
 * Time: 10:01
 */

namespace App\Libs\PageLib;

use App\Libs\PageLib\Data\Breadcumb;
use App\Libs\PageLib\Data\Css;
use App\Libs\PageLib\Data\Js;

/**
 * Class Page
 * @package App\Libs\PageLib
 */
class Page
{

    /**
     * List Css
     * @var array
     */
    private $listCss = array();

    /**
     * List JS
     * @var array
     */
    private $listJs = array();

    /**
     * Title Page
     * @var string
     */
    private $title = null;

    /**
     * Rository meta
     * @var MetaRepository
     */
    private $meta;

    /**
     * Default title if not set
     * @var
     */
    private $defaultTitle = 'Laravel Base App';

    /**
     * Page Header
     * @var
     */
    private $pageHeader;

    private $pageBreadcumb;


    /**
     * Page constructor.
     */
    public function __construct()
    {
        $this->meta = new MetaRepository();
        $this->pageBreadcumb = new Breadcumb();
    }

    /**
     * @return mixed
     */
    public function getDefaultTitle()
    {
        return $this->defaultTitle;
    }

    /**
     * Set default title if title not set
     * @param mixed $defaultTitle
     */
    public function setDefaultTitle($defaultTitle)
    {
        $this->defaultTitle = $defaultTitle;
    }


    /**
     * @return MetaRepository
     */
    public function getMeta()
    {
        return $this->meta;
    }
    /**
     * Get title page
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Get Breadcumb
     * @return Breadcumb
     */
    public function getPageBreadcumb()
    {
        return $this->pageBreadcumb;
    }

    public function generateBreadcumb()
    {
        return $this->pageBreadcumb->generateBreadcumb();
    }
    /**
     * Set title page
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getPageHeader()
    {
        return $this->pageHeader;
    }

    /**
     * @param mixed $pageHeader
     */
    public function setPageHeader($pageHeader)
    {
        $this->pageHeader = $pageHeader;
    }


    /**
     * Menambah Css
     * @param $params
     * @return $this 
     */
    public function addCss($params)
    {
        if(is_array($params)){
            $this->pushArrayCss($params);
        }else{
            $this->pushCss($params);
        }
        return $this;
    }

    /**
     * Tambah Css
     * @param array $params
     */
    public function pushArrayCss($params)
    {
        foreach ($params as $param) {
            $this->pushCss($param);
        }
    }

    /**
     * Menambah Css ke list
     * @params string $css
     */
    public function pushCss($param)
    {
        $css = new Css();
        $css->setData($param);
        array_push($this->listCss, $css);
    }

    /**
     * Mengambil lisyt css
     * @return array
     */
    public function getCss()
    {
       return $this->listCss;
    }

    /**
     * Tampilkan CSS ke view
     * @return null
     */
    public function generateCss()
    {
        $stringCss = null;
        foreach ($this->listCss as $css) {
            $stringCss = $stringCss.$css->getViewCss();
        }
        return $stringCss;
    }
    /**
     * Menambah JS
     * @param $params
     * @return $this
     */
    public function addJs($params)
    {
        if(is_array($params)){
            $this->pushArrayJs($params);
        }else{
            $this->pushJs($params);
        }
        return $this;
    }

    /**
     * Tambah Js
     * @param array $params
     */
    public function pushArrayJs($params)
    {
        foreach ($params as $param) {
            $this->pushJs($param);
        }
    }

    /**
     * Menambah Js ke list
     * @params string $js
     */
    public function pushJs($param)
    {
        $js = new Js();
        $js->setData($param);
        array_push($this->listJs, $js);
    }

    /**
     * Mengambil list js
     * @return array
     */
    public function getJs()
    {
       return $this->listJs;
    }

    /**
     * Tampilkan Js ke view
     * @return null
     */
    public function generateJs()
    {
        $stringJs = null;
        foreach ($this->listJs as $js) {
            $stringJs = $stringJs.$js->getViewJs();
        }
        return $stringJs;
    }

    /**
     * Generate List meta in view
     * @return null|string
     */
    public function generateMeta()
    {
        $stringJs = null;
        foreach ($this->meta->getListMeta() as $meta){
            $stringJs = $stringJs.$meta->getViewMeta();
        }
        return $stringJs;
    }

    /**
     * Generate title
     * @return string
     */
    public function generateTitle()
    {
        is_null($this->getTitle()) ? $this->setTitle($this->getDefaultTitle()):$this->getTitle();
        return $this->getTitle();
    }

}