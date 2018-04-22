<?php

namespace Map;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;
    public function photos()
    {
      return $this->hasMany('Map\Photo');
    }

    public function messages()
    {
      return $this->hasMany('Map\Message');
    }

    public function user_events()
    {
      return $this->belongsTo('Map\User_Event');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
