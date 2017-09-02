<?php
/**
 * Created by PhpStorm.
 * User: achva
 * Date: 20/08/2017
 * Time: 17:30
 */

namespace App\Repositories\BaseApp;


use App\Model\Role;
use Illuminate\Support\Facades\Auth;

class RoleRepositories
{
    /**
     * Mengambil list data role dengan limit dan pagination
     * @param $limit
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getListPaginate($limit)
    {
        return Role::paginate($limit);
    }

    /**
     * Mengambil semu data role untuk select box
     * @return \Illuminate\Support\Collection : nama role dan id
     */
    public function getAllSelect()
    {
        return Role::pluck('role_nm','id');
    }

    public function getCountRole()
    {
        return Role::all()->count();
    }

    /**
     * Proses menambah role ke database
     * @param $params
     * @return $this|\Illuminate\Database\Eloquent\Model
     */
    public function createRole($params)
    {
        $params['user_id'] = Auth::user()->id;
        return Role::create($params);
    }

    /**
     * Proses mengupdate data portal di database
     * @param $params
     * @param $id
     * @return bool
     */
    public function updateRole($params, Role $role){
        return $role->update($params);
    }

    /**
     * Proses menghapus  role dari database
     * @param $id
     * @return bool|null
     * @throws \Exception
     */
    public function deleteRole(Role $role)
    {
        return  $roleDelete = $role->delete();
    }
}