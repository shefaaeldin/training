<?php

namespace App\Policies;

use App\User;
use App\Job;
use Illuminate\Auth\Access\HandlesAuthorization;

class JobPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the job.
     *
     * @param  \App\User  $user
     * @param  \App\Job  $job
     * @return mixed
     */
    public function view(User $user, Job $job)
    {
            if($user->roles->first()->name=='admin')
        {
            return true;
        
        }
        elseif($user->hasPermissionTo('view jobs'))
        {
            return true;
        }
        else{
            return false;
        }
    }

    /**
     * Determine whether the user can create jobs.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        
        
         if($user->roles->first()->name=='admin')
        {
            return true;
        
        }
        elseif($user->hasPermissionTo('create jobs'))
        {
            return true;
        }
        else{
            return false;
        }
    }

    /**
     * Determine whether the user can update the job.
     *
     * @param  \App\User  $user
     * @param  \App\Job  $job
     * @return mixed
     */
    public function update(User $user, Job $job)
    {
        
        
        
        if($user->roles->first()->name=='admin')
        {   
            return true;
        
        }
        elseif($user->hasPermissionTo('edit jobs'))
        {
            return true;
        }
        else{
            return false;
        }
    }

    /**
     * Determine whether the user can delete the job.
     *
     * @param  \App\User  $user
     * @param  \App\Job  $job
     * @return mixed
     */
    public function delete(User $user, Job $job)
    {
       
         if($user->roles->first()->name=='admin')
        {
            return true;
        
        }
        elseif($user->hasPermissionTo('delete jobs'))
        {
            return true;
        }
        else{
            return false;
        }
    }

    /**
     * Determine whether the user can restore the job.
     *
     * @param  \App\User  $user
     * @param  \App\Job  $job
     * @return mixed
     */
    public function restore(User $user, Job $job)
    {
         
    }

    /**
     * Determine whether the user can permanently delete the job.
     *
     * @param  \App\User  $user
     * @param  \App\Job  $job
     * @return mixed
     */
    public function forceDelete(User $user, Job $job)
    {
         
    }
}
