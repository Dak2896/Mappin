<?php

namespace Map;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{

  protected $fillable = [
        'category', 'start_date','end_date', 'point_id', 'description'
      ];
  public function photos()
  {
    return $this->hasMany('Map\Photo');
  }

  public function user_events()
  {
    return $this->belongsTo('Map\User_Event');
  }
}
