<?php

namespace App\Policies;

use App\Models\CourseSubCategory;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CourseSubCategoryPolicy
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
     * @param  \App\Models\CourseSubCategory  $courseSubCategory
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, CourseSubCategory $courseSubCategory)
    {
        //
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
        return in_array('create_course_subcategories', $permissions);
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\CourseSubCategory  $courseSubCategory
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, CourseSubCategory $courseSubCategory)
    {
        $permissions = $user->getAllPermissions()->pluck('name')->toArray();
        return in_array('edit_course_subcategories', $permissions);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\CourseSubCategory  $courseSubCategory
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function destroy(User $user, CourseSubCategory $courseSubCategory)
    {
        $permissions = $user->getAllPermissions()->pluck('name')->toArray();
        return in_array('delete_course_subcategories', $permissions);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\CourseSubCategory  $courseSubCategory
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, CourseSubCategory $courseSubCategory)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\CourseSubCategory  $courseSubCategory
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, CourseSubCategory $courseSubCategory)
    {
        //
    }
}
