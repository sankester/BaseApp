<?php
/**
 * Created by PhpStorm.
 * User: achva
 * Date: 07/09/2017
 * Time: 15:35
 */

namespace App\Libs\LogLib;

use App\Libs\LogLib\Data\MessageLog;
use App\Model\Log;
use Illuminate\Support\Facades\Auth;

class LogRepository
{
    /**
     * Message objek data
     * @var
     */
    private static $message;

    /**
     * Model Action
     * @var
     */
    private static $model;

    /**
     * Level
     * @var
     */
    private static $level;

    /**
     * Prfix message
     * @var
     */
    private static $prefix;

    /**
     * Data parsing
     * @var
     */
    private static $data;


    /**
     * Tambah data log
     * @param $level
     * @param $prefix
     * @param null $model
     * @param null $data
     */
    public static function addLog($level, $prefix, $model = null, $data = null)
    {
        //set property data
        self::setProperty($level,$prefix,$model,$data);
        // get message
        $full_message = self::getMessage();
        // insert to database
        if($full_message != false){
            (new self)->insertLog(self::$level , $full_message);
        }
    }

    /**
     * Set Property Class
     * @param $level
     * @param $prefix
     * @param null $model
     * @param null $data
     */
    public static function setProperty($level, $prefix , $model = null, $data = null)
    {
        $data = (new self)->filterData($data);
        self::$message = new MessageLog();
        self::$level = $level;
        self::$model = $model;
        self::$prefix = $prefix;
        self::$data = $data;

    }

    /**
     * Ambil message log
     * @return mixed
     */
    public static function getMessage()
    {
        self::$message->setData(self::$level, self::$prefix,self::$data,self::$model);
        $full_message =  self::$message->generateMessage();
        return $full_message;
    }

    /**
     * Insert data ke database
     * @param $action
     * @param $message
     * @return $this|\Illuminate\Database\Eloquent\Model
     */
    public function insertLog($action , $message)
    {
        $params['action'] =  $action ;
        $params['description'] = $message;
        $params['user_id'] = Auth::user()->id;
        $params['portal_id'] = Auth::user()->role->portal->id;
        return Log::create($params);
    }

    /**
     * Filter data
     * @param $data
     * @return mixed
     */
    public function filterData($data)
    {
        unset($data['_method']);
        unset($data['_token']);
        return $data;
    }

    /**
     * Mengambil list semua log
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public static function getAll()
    {
        return Log::all();
    }

    /**
     * Mengambil list log berdasarkan ID Portal
     * @param $portal_id
     * @return \Illuminate\Support\Collection
     */
    public static function getLogPortal($portal_id)
    {
        return Log::where('portal_id', $portal_id)->get();
    }

    /**
     * Mengambil log berdasarkan ID User
     * @param $user_id
     * @return \Illuminate\Support\Collection
     */
    public static function getLogUser($user_id)
    {
        return Log::where('user_id', $user_id)->get();
    }
}