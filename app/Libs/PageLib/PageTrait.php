<?php
/**
 * Created by PhpStorm.
 * User: achva
 * Date: 15/08/2017
 * Time: 20:29
 */

namespace App\Libs\PageLib;


trait PageTrait
{
    /**
     * Objec Page
     * @var
     */
    protected $page;
    /**
     * Data to parsing in view
     * @var
     */
    protected $data;

    /**
     * Tempalate view
     * @var
     */
    protected $template;


    /**
     * Set Tempalte
     * @param mixed $template
     */
    public function setTemplate($template)
    {
        $this->template = $template;
    }

    /**
     * Initial page object
     */
    public function initialPage()
    {
        $this->page = new Page();
    }

    /**
     * @param $key
     * @param $value
     */
    protected function assign($key, $value){
        $this->data[$key] = $value;
    }

    /**
     * @param null $page : name page show
     * @param null $data
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    protected function displayPage()
    {
        $this->assign('page', $this->page);
        return view($this->template, $this->data);
    }

    /**
     * Tambah Css ke page
     * @param $params
     */
    protected function loadCss($params)
    {
        $this->page->addCss($params);
    }

    /**
     * Tambah Js ke page
     * @param $params
     */
    protected function loadJs($params)
    {
        $this->page->addJs($params);
    }

    /**
     * Set Page Headader
     * @param $title
     */
    protected function setPageHeaderTitle($title)
    {
        $this->page->setPageHeader($title);
    }

    protected function setBreadcumb($params)
    {
        $this->page->getPageBreadcumb()->setBreadcumb($params);
    }


}