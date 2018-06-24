<?php

namespace Map;

use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
  protected $fillable = [
        'lat', 'long','event_id',
      ];


      public function events()
      {
        return $this->hasMany('Map\Event');
      }
}
