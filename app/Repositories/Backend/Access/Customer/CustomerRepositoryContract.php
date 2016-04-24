<?php

namespace App\Repositories\Backend\Access\Customer;

/**
 * Interface UserRepositoryContract
 * @package App\Repositories\User
 */
interface CustomerRepositoryContract
{
    /**
     * @param  $id
     * @param  bool    $withRoles
     * @return mixed
     */
   // public function findOrThrowException($id);

    /**
     * @param  $per_page
     * @param  string      $order_by
     * @param  string      $sort
     * @param  $status
     * @return mixed
     */
    public function getCustomersPaginated($per_page, $status = 1, $order_by = 'id', $sort = 'asc');

    /**
     * @param  $per_page
     * @return \Illuminate\Pagination\Paginator
     */
    public function getDeletedCustomersPaginated($per_page);

    /**
     * @param  string  $order_by
     * @param  string  $sort
     * @return mixed
     */
    public function getAllCustomers($order_by = 'id', $sort = 'asc');

    /**
     * @param $input
     * @param $roles
     * @param $permissions
     * @return mixed
     */
    public function create($input);

    /**
     * @param $id
     * @param $input
     * @param $roles
     * @param $permissions
     * @return mixed
     */
    public function update($id, $input);

    /**
     * @param  $id
     * @return mixed
     */
    public function destroy($id);

    /**
     * @param  $id
     * @return mixed
     */
    public function delete($id);

    /**
     * @param  $id
     * @return mixed
     */
    public function restore($id);

    /**
     * @param  $id
     * @param  $status
     * @return mixed
     */
    public function mark($id, $status);

    /**
     * @param  $id
     * @param  $input
     * @return mixed
     */
    //public function updatePassword($id, $input);
}
