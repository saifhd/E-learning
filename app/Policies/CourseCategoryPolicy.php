<?php

namespace App\Policies;

use App\Models\CourseCategory;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CourseCategoryPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\CourseCategory  $courseCategory
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, CourseCategory $courseCategory)
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        $permissions = $user->getAllPermissions()->pluck('name')->toArray();
        return in_array('create_course_categories', $permissions);
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\CourseCategory  $courseCategory
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, CourseCategory $courseCategory)
    {

        $permissions = $user->getAllPermissions()->pluck('name')->toArray();
        return in_array('edit_course_categories', $permissions);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\CourseCategory  $courseCategory
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function destroy(User $user, CourseCategory $courseCategory)
    {
        $permissions = $user->getAllPermissions()->pluck('name')->toArray();
        return in_array('delete_course_categories', $permissions);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\CourseCategory  $courseCategory
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, CourseCategory $courseCategory)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\CourseCategory  $courseCategory
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, CourseCategory $courseCategory)
    {
        //
    }
}
