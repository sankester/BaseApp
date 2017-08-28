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
use Illuminate\Support\Facades\Auth;

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

    public function getDataLogin()
    {
        return Auth::user();
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
     * @param User $user
     * @return bool
     * @internal param $id
     */
    public function updateUser($params, User $user){
        return $user->update($params);
    }

    /**
     * Hapus user
     * @param User $user
     * @return bool|null
     * @throws \Exception
     * @internal param $id
     */
    public function deleteUser(User $user)
    {
        return  $userDelete = $user->delete();
    }
}