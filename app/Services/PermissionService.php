<?php


namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

class PermissionService
{
    public function userPermissions()
    {

        $id = \Auth::id();
        $superAdmin = 0;
        $permissions = [];
        $currentUser = User::where('id', $id)->with('role', 'role.permissions')->first();
        if ($currentUser->is_admin == 1) {
            $superAdmin = 1;
        } else {
            foreach ($currentUser->role->permissions as $per) {
                array_push($permissions, $per->permission);
            }
        }
        return ['superAdmin' => $superAdmin, 'permissions' => $permissions];
    }

}
