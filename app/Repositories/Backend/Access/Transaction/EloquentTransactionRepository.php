<?php

namespace App\Repositories\Backend\Access\Transaction;

use App\Transaction;
use App\Exceptions\GeneralException;
use App\Exceptions\Backend\Access\User\UserNeedsRolesException;
use App\Repositories\Backend\Access\Role\RoleRepositoryContract;
use App\Repositories\Frontend\Access\User\UserRepositoryContract as FrontendUserRepositoryContract;

/**
 * Class EloquentUserRepository
 * @package App\Repositories\Customer
 */
class EloquentTransactionRepository implements TransactionRepositoryContract
{
    protected $transaction;

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

    public function getTransactionsPaginated($per_page, $status = 1, $order_by = 'id', $sort = 'asc')
    {
        return Transaction::where('status', $status)
            ->orderBy($order_by, $sort)
            ->paginate($per_page);
    }

    /**
     * @param  $per_page
     * @return \Illuminate\Pagination\Paginator
     */
    public function getDeletedTransactionsPaginated($per_page)
    {
        return Transaction::onlyTrashed()
            ->paginate($per_page);
    }

    /**
     * @param  string  $order_by
     * @param  string  $sort
     * @return mixed
     */
    public function getAllTransactions($order_by = 'id', $sort = 'asc')
    {
        return Transaction::orderBy($order_by, $sort)
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
        $transaction = $this->createTransactionStub($input);

        if ($transaction->save()) {
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
        $transaction = $this->findOrThrowException($id, true);

        //Detach all roles & permissions
        //$customer->detachRoles($customer->roles);
        //$user->detachPermissions($user->permissions);

        try {
            $transaction->forceDelete();
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
        $transaction = $this->findOrThrowException($id);

        if ($transaction->restore()) {
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

        $transaction         = $this->find($id);
        $transaction->status = $status;

        if ($transaction->save()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.access.users.mark_error'));
    }

}
