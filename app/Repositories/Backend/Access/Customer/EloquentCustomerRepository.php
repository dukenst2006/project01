<?php

namespace App\Repositories\Backend\Access\Customer;

use App\Customer;
use App\Exceptions\GeneralException;
use App\Exceptions\Backend\Access\User\UserNeedsRolesException;
use App\Repositories\Backend\Access\Role\RoleRepositoryContract;
use App\Repositories\Frontend\Access\User\UserRepositoryContract as FrontendUserRepositoryContract;

/**
 * Class EloquentUserRepository
 * @package App\Repositories\Customer
 */
class EloquentCustomerRepository implements CustomerRepositoryContract
{
    /**
     * @var RoleRepositoryContract
     */
    //protected $role;

    /**
     * @var FrontendUserRepositoryContract
     */
    protected $customer;

    /**
     * @param RoleRepositoryContract $role
     * @param FrontendUserRepositoryContract $user
     */
    public function __construct(
        //RoleRepositoryContract $role,
      // FrontendUserRepositoryContract $customer
    )
    {
        //$this->role = $role;
       // $this->customer = $customer;
    }

    /**
     * @param  $id
     * @param  bool               $withRoles
     * @throws GeneralException
     * @return mixed
     */
//    public function findOrThrowException($id, $withRoles = false)
//    {
//        if ($withRoles) {
//            $customer = Customer::with('roles')->withTrashed()->find($id);
//        } else {
//            $user = User::withTrashed()->find($id);
//        }
//
//        if (!is_null($customer)) {
//            return $customer;
//        }
//
//        throw new GeneralException(trans('exceptions.backend.access.users.not_found'));
//    }

    /**
     * @param  $per_page
     * @param  string      $order_by
     * @param  string      $sort
     * @param  int         $status
     * @return mixed
     */
    public function getCustomersPaginated($per_page, $status = 1, $order_by = 'id', $sort = 'asc')
    {
        return Customer::where('status', $status)
            ->orderBy($order_by, $sort)
            ->paginate($per_page);
    }

    /**
     * @param  $per_page
     * @return \Illuminate\Pagination\Paginator
     */
    public function getDeletedCustomersPaginated($per_page)
    {
        return Customer::onlyTrashed()
            ->paginate($per_page);
    }

    /**
     * @param  string  $order_by
     * @param  string  $sort
     * @return mixed
     */
    public function getAllCustomers($order_by = 'id', $sort = 'asc')
    {
        return Customer::orderBy($order_by, $sort)
            ->get();
    }

    /**
     * @param  $input
     * @param  $roles
     * @param  $permissions
     * @throws GeneralException
     * @throws UserNeedsRolesException
     * @return bool
     */
    public function create($input)
    {
        $customer = $this->createCustomerStub($input);

        if ($customer->save()) {
            //User Created, Validate Roles
            //$this->validateRoleAmount($user, $roles['assignees_roles']);

            //Attach new roles
            // $user->attachRoles($roles['assignees_roles']);

            //Attach other permissions
            // $user->attachPermissions($permissions['permission_user']);

            //Send confirmation email if requested
            // if (isset($input['confirmation_email']) && $user->confirmed == 0) {
            //    $this->user->sendConfirmationEmail($user->id);
        //}

            return true;
        }

        throw new GeneralException(trans('exceptions.backend.access.users.create_error'));
    }

    /**
     * @param $id
     * @param $input
     * @param $roles
     * @param $permissions
     * @return bool
     * @throws GeneralException
     */
    public function update($id, $input)
    {
        $user = $this->findOrThrowException($id);
        //$this->checkUserByEmail($input, $user);

        if ($user->update($input)) {
            //For whatever reason this just wont work in the above call, so a second is needed for now
            $user->status    = isset($input['status']) ? 1 : 0;
            //$user->confirmed = isset($input['confirmed']) ? 1 : 0;
            $user->save();

            //$this->checkUserRolesCount($roles);
            //$this->flushRoles($roles, $user);
            //$this->flushPermissions($permissions, $user);

            return true;
        }

        throw new GeneralException(trans('exceptions.backend.access.users.update_error'));
    }

    /**
     * @param  $id
     * @param  $input
     * @throws GeneralException
     * @return bool
     */


    /**
     * @param  $id
     * @throws GeneralException
     * @return bool
     */
    public function destroy($id)
    {
        if (auth()->id() == $id) {
            throw new GeneralException(trans('exceptions.backend.access.users.cant_delete_self'));
        }

        $customer = $this->findOrThrowException($id);
        if ($customer->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.access.users.delete_error'));
    }

    /**
     * @param  $id
     * @throws GeneralException
     * @return boolean|null
     */
    public function delete($id)
    {
        $customer = $this->findOrThrowException($id, true);

        //Detach all roles & permissions
        //$customer->detachRoles($customer->roles);
        //$user->detachPermissions($user->permissions);

        try {
            $customer->forceDelete();
        } catch (\Exception $e) {
            throw new GeneralException($e->getMessage());
        }
    }

    /**
     * @param  $id
     * @throws GeneralException
     * @return bool
     */
    public function restore($id)
    {
        $customer = $this->findOrThrowException($id);

        if ($customer->restore()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.access.users.restore_error'));
    }

    /**
     * @param  $id
     * @param  $status
     * @throws GeneralException
     * @return bool
     */
    public function mark($id, $status)
    {
        if (access()->id() == $id && $status == 0) {
            throw new GeneralException(trans('exceptions.backend.access.users.cant_deactivate_self'));
        }

        $customer         = $this->find($id);
        $customer->status = $status;

        if ($customer->save()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.access.users.mark_error'));
    }

    /**
     * Check to make sure at lease one role is being applied or deactivate user
     *
     * @param  $user
     * @param  $roles
     * @throws UserNeedsRolesException
     */


    /**
     * @param  $input
     * @return mixed
     */
    private function createCustomerStub($input)
    {
        $customer                = new Customer;
        $customer->number        = $input['number'];
        $customer->name          = $input['name'];
        $customer->lastname      = $input['lastname'];
        $customer->address       = $input['address'];
        $customer->city          = $input['city'];
        $customer->email         = $input['email'];
        $customer->occupation    = $input['occupation'];
        $customer->status        = isset($input['status']) ? 1 : 0;
        return $customer;
    }
}
