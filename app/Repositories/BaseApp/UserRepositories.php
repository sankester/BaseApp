<?php
/**
 * Created by PhpStorm.
 * User: achva
 * Date: 15/08/2017
 * Time: 13:28
 */

namespace App\Repositories\BaseApp;

use Carbon\Carbon;
use App\Model\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

/**
 * Class Users
 * @package App\Repositories\BaseApp
 */
class UserRepositories
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

    public function getCountUser()
    {
       return User::all()->count();
    }
    /**
     * Get Data UserLogin
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
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
        $params['password'] = Hash::make($params['password']);
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

        if(!empty( $params['password']) || !is_null($params['password'])){
            $params['password'] = Hash::make($params['password']);
        }

        if(is_null($params['password'])){
            unset($params['password']);
            unset($params['password_confirm']);
        }
        return $user->update($params);
    }

    /**
     * Update data user login
     * @param $params
     * @return mixed
     */
    public function updateUserLogin($params)
    {
        if(!is_null( $params['password'])){
            $params['password'] = Hash::make($params['password']);
        }else{
            $params['password'] = Auth::user()->getAuthPassword();
        }
        return Auth::user()->update($params);
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