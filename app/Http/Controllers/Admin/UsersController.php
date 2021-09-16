<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ManageUsers\UpdateAvatarRequest;
use App\Http\Requests\Admin\ManageUsers\UpdateUsersRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(User::class, 'user');
    }

    public function index(){
        $search=request()->search;
        $users = User::with('roles')->Filter($search)->paginate(20)->withQueryString();
        return view('admin.users.index',compact('users'));
    }

    public function edit(User $user){
        $user_roles=$user->getRoleNames()->toArray();
        $roles=Role::all();
        return view('admin.users.edit',compact('user','roles','user_roles'));
    }

    public function update(UpdateUsersRequest $request,User $user){
        // dd(123);
        $user->name=$request->name;
        $user->email=$request->email;
        $user->update();
        $user->syncRoles($request->roles);
        return redirect()->back()->with('success','Success : User profile updated');
    }

    public function destroy(User $user){

        $user->delete();
        return redirect()->route('manage.users.index')->with('success', 'Success : User profile Trashed');
    }

    public function avatar(UpdateAvatarRequest $request,User $user){
        // dd(123);
        // dd($user->getMedia());
        if ($request->hasFile('image')) {
            $user->clearMediaCollection('images');
            $user->addMediaFromRequest('image')
                ->toMediaCollection('images');

        }

        return redirect()->back()->with('success','Success : Profile image updated');
    }
    public function trashes(){
        $this->authorize('viewTrashes', auth()->user());
        $users=User::onlyTrashed()->get();
        return view('admin.users.trashes',compact('users'));

    }
    public function forceDelete($id){
        $this->authorize('forceDelete',auth()->user());
        $user=User::withTrashed()->findOrFail($id);
        $user->forceDelete();
        return redirect()->back()->with('success','Success : User permenently Deleted');
    }

    public function restore($user){
        $this->authorize('restore', auth()->user());
        User::withTrashed()->findOrFail($user)->restore();
        return redirect()->back()->with('success','Success : User Profile Restored');
    }


}
