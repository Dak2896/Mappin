<?php

namespace Map;

use Illuminate\Database\Eloquent\Model;

class User_Event extends Model
{
  protected $fillable = [
        'user_id', 'event_id','number_vote', 'text_vote', 'is_creator'
      ];
  public function users()
  {
    return $this->hasMany('Map\User');
  }

  public function events()
  {
    return $this->hasMany('Map\Event');
  }
}
