<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Cache;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Models\Role;

class User extends Authenticatable
{
    use HasFactory,HasRoles, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */


    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function UserOnline()
    {
        return Cache::has('user-is-online' . $this->id);
    }


    public static function getpermissionGroups()
    {
        return DB::table('permissions')->select('group_name')->groupBy('group_name')->get();
    }

    public static function getpermissionByGroupName($group_name)
    {
        return DB::table('permissions')
            ->select('name', 'id')
            ->where('group_name', $group_name)
            ->get();
    }

    public static function roleHasPermissions($role, $permissions)
    {
        $hasPermission = true;
        foreach ($permissions as $permission) {
            if (!$role->hasPermissionTo($permission->name)) {
                $hasPermission = false;
                break; // Arrête la boucle dès qu'une permission n'est pas trouvée
            }
        }
        return $hasPermission;
    }


    // public static function roleHasPermissions($role, $permissions)
    // {
    //     $hasPermission = true;
    //     foreach ($permissions as $permission) {
    //         if (!$role->hasPermissionTo($permission->name)) {
    //             $hasPermission = false;
    //             break; // Arrête la boucle dès qu'une permission n'est pas trouvée
    //         }
    //     }
    //     return $hasPermission;
    // }


    // public static function getpermissionGroups(){
    //     $permission_groups = DB::table('permissions')->select('group_name')->groupBy('group_name')->get();
    //     return $permission_groups;
    // }// End Method

    // public static function getpermissionByGroupName($group_name){

    //     $permissions = DB::table('permissions')
    //                     ->select('name','id')
    //                     ->where('group_name',$group_name)
    //                     ->get();

    //                     return $permissions;
    // } // End Method

    // public static function roleHasPermissions($role,$permissions){

    //     $hasPermission =  true;
    //     foreach ($permissions as  $permission) {
    //         if (!$role->hasPermissionTo($permission->name)) {
    //             $hasPermission = false;
    //         }
    //         return $hasPermission;
    //     }

    // }// End Method

}
