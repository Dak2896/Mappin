<?php

namespace Map;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    public function messages()
    {
      return $this->hasMany('Map\Message');
    }

    protected $fillable = [
          'event_id'
        ];
}
