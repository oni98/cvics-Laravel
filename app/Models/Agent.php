<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class Agent extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    // public static function roleHasPermissions($role, $permissions)
    // {
    //     $hasPermission = true;
    //     foreach($permissions as $permission){
    //         if(!$role->hasPermissionTo($permission->name)){
    //             $hasPermission = false;
    //             return $hasPermission;
    //         }
    //     }
    //     return $hasPermission;
    // }
    public function agent(){
        return $this->hasOne(Application::class, 'referrer');
    }
}
