<?php

namespace Map;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
  public function users()
  {
    return $this->belongsTo('Map\User');
  }

  public function chats()
  {
    return $this->belongsTo('Map\Chat');
  }

  protected $fillable = [
        'chat_id', 'user_id','message_text'
      ];
}
