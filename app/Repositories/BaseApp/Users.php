<?php
/**
 * Created by PhpStorm.
 * User: achva
 * Date: 15/08/2017
 * Time: 13:28
 */

namespace App\Repositories\BaseApp;

use Carbon\Carbon;
use App\User;

/**
 * Class Users
 * @package App\Repositories\BaseApp
 */
class Users
{
    /**
     * Mengambil list user limit
     * @param $limit
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getListPaginate($limit)
    {
        return User::paginate($limit);
    }

    /**
     * Inser user baru
     * @param $params
     * @return $this|\Illuminate\Database\Eloquent\Model
     */
    public function createUser($params)
    {
        $params['lock_st'] = 0;
        $params['registerDate'] = Carbon::now();
        return User::create($params);
    }

    /**
     * Update user
     * @param $params
     * @param $id
     * @return bool
     */
    public function updateUser($params, $id){
        $user = User::findorfail($id);
        return $user->update($params);
    }

    /**
     * Hapus user
     * @param $id
     * @return bool|null
     * @throws \Exception
     */
    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        return  $userDelete = $user->delete();
    }
}