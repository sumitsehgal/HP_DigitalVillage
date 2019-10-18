<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = ['password_confirmation'];

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

    public function name()
    {
        return $this->first_name." ".$this->middle_name." ".$this->last_name;
    }

    public function isAdmin()
    {
        return $this->role == 'admin';
    }

    public function isCenter()
    {
        return $this->role == 'center';
    }

    public function isStudent()
    {
        return $this->role == 'student';
    }

    public function getStatus()
    {
        return $this->is_active == 1 ? "Active" : "InActive";
    }

    public function children()
    {
        return $this->hasMany(User::class, 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(User::class, 'parent_id');
    }

    public static function generateUsername($firstname, $prefix="S-")
    {   
        $lastId= self::orderBy('id', 'desc')->first()->id;
        $uniqId = $lastId + rand(1,8000);
        $username = $prefix.$uniqId; 
        if(self::checkUsernameExists($username))
        {
            return self::generateUsername($firstname, $prefix);
        }
        return $username;
    }

    public static function checkUsernameExists($username)
    {
        return self::where('username', $username)->exists();
    }


}
