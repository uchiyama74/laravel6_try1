<?php

namespace App\Policies;

use App\NameItem;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class NameItemPolicy
{
    use HandlesAuthorization;

    public function before($user, $ability)
    {
        if ($user->id === 1) {
            return true;
        }
    }

    /**
     * Determine whether the user can view any name items.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the name item.
     *
     * @param  \App\User  $user
     * @param  \App\NameItem  $nameItem
     * @return mixed
     */
    public function view(?User $user, NameItem $nameItem)
    {
        if ($user === null && $nameItem->owner_id !== null) {
            return Response::deny('匿名の登録しか閲覧できません。');
        }

        return Response::allow();
    }

    /**
     * Determine whether the user can create name items.
     *
     * @param  \App\User  $user
     * @param  string $myArg
     * @return mixed
     */
    public function create(?User $user, $myArg)
    {
// logger('---NameItemPolicy.create user.id: ' . optional($user)->id);
// logger('---NameItemPolicy.create myArg: ' . $myArg);
        return optional($user)->id !== 2;
    }

    /**
     * Determine whether the user can update the name item.
     *
     * @param  \App\User  $user
     * @param  \App\NameItem  $nameItem
     * @return mixed
     */
    public function update(?User $user, NameItem $nameItem)
    {
// logger('---NameItemPolicy.update c_code: ' . $nameItem->c_code);
        if ($user === null && $nameItem->owner_id === null)  {
            return true;
        }
        return $user->id === $nameItem->owner_id;
    }

    /**
     * Determine whether the user can delete the name item.
     *
     * @param  \App\User  $user
     * @param  \App\NameItem  $nameItem
     * @return mixed
     */
    public function delete(User $user, NameItem $nameItem)
    {
        //
    }

    /**
     * Determine whether the user can restore the name item.
     *
     * @param  \App\User  $user
     * @param  \App\NameItem  $nameItem
     * @return mixed
     */
    public function restore(User $user, NameItem $nameItem)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the name item.
     *
     * @param  \App\User  $user
     * @param  \App\NameItem  $nameItem
     * @return mixed
     */
    public function forceDelete(User $user, NameItem $nameItem)
    {
        //
    }
}
