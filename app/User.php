<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password',  'image', 'phone', 'website', 'address', 'city', 'state', 'zip', 'country', 'notes'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function getPermissionGroups()
    {
        return DB::table('permissions')
            ->select('group_name as name')
            ->groupBy('group_name')
            ->get();
    }

    public static function getpermissionsByGroupName($group_name)
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
                return $hasPermission;
            }
        }
        return $hasPermission;
    }

    /**
     * Returns the full address
     */
    public function getFullAddress()
    {
        if (isset($this->address) && isset($this->city) && isset($this->state) && isset($this->zip) &&isset($this->country)) {
            return $this->address . ", " . $this->city . ", " . $this->state . ", " . $this->zip . ", " . $this->country;
        }
    }

    /**
     * Returns the full name
     */
    public function getFullName()
    {
        if (isset($this->first_name) && isset($this->last_name)) {
            return $this->first_name . " " . $this->last_name;
        }
    }
}
