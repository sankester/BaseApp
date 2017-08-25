<?php
/**
 * Created by PhpStorm.
 * User: achva
 * Date: 13/08/2017
 * Time: 10:00
 */

namespace App\Libs\PageLib\Data;


class Css
{

    /**
     * Data CSS
     * @var array
     */
    public $data = array();
    /**
     * Name CSS
     * @var
     */
    public $name;
    /**
     * Path CSS
     * @var
     */
    public $path;


    /**
     * Set data CSS
     * @param $url
     */
    public function setData($url)
    {
        $breakWord = '/';
        $dataCss = str_split($url, strrpos($url, $breakWord) + strlen($breakWord));
        $this->data['FilePath'] =   $dataCss[0];
        $this->data['FileName'] =   $dataCss[1];
        $this->data['FileUrl'] =  $url;

        $this->path = $this->data['FilePath'];
        $this->name =  $this->data['FileName'];
    }

    /**
     * Mengambil nama CSS
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Mengambil Path CSS
     * @return mixed
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Mengabil Data
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Mengambil format include file CSS
     * @return string
     */
    public function getViewCss()
    {
        $url ='<link href="'. asset($this->data['FileUrl']).'" rel="stylesheet" type="text/css">'.PHP_EOL;
        return $url;
    }
}