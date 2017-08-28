<?php
/**
 * Created by PhpStorm.
 * User: achva
 * Date: 20/08/2017
 * Time: 00:38
 */

namespace App\Repositories\BaseApp;


use App\Portal;
use Illuminate\Support\Facades\Auth;

/**
 * Class Portals
 * @package App\Repositories\BaseApp
 */
class Portals
{
    /**
     * Mngambil data portal limit
     * @param $limit
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getListPaginate($limit)
    {
        return Portal::paginate($limit);
    }

    /**
     * Mengambil semua portal
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAll()
    {
        return Portal::all();
    }

    /**
     * Mengambil data portal untuk select
     * @return \Illuminate\Support\Collection
     */
    public function getAllSelect()
    {
        return Portal::pluck('portal_nm','id');
    }

    public static function getById($portal_id)
    {
        return Portal::findOrFail($portal_id);
    }

    /**
     * Proses menyimpan data portal ke database
     * @param $params
     * @return mixed
     */
    public function createPortal($params)
    {
        return Auth::user()->portals()->create($params);
    }

    /**
     * Proses mengupdate data portal di database
     * @param $params
     * @param Portal $portal
     * @return bool
     * @internal param $id
     */
    public function updatePortal($params, Portal $portal){
        return $portal->update($params);
    }

    /**
     * Proses menghapus data portal dari database
     * @param $id
     * @return bool|null
     * @throws \Exception
     */
    public function deletePortal(Portal $portal)
    {
        return  $portalDelete = $portal->delete();
    }
}