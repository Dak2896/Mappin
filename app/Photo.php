<?php

namespace Map;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
  public function users()
  {
    return $this->belongsTo('Map\User');
  }

  public function events()
  {
    return $this->belongsTo('Map\Event');
  }

}
