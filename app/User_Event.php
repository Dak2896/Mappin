<?php

namespace Map;

use Illuminate\Database\Eloquent\Model;

class User_Event extends Model
{
  public function users()
  {
    return $this->hasMany('Map\User');
  }

  public function events()
  {
    return $this->hasMany('Map\Event');
  }
}
