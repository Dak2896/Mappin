<?php

namespace Map\Http\Controllers\Api;


use Map\Http\Controllers\Api\ApiBaseController as ApiBaseController;
use Map\Event;
use Map\User_Event;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;


class ImageApiController  extends ApiBaseController
{
    public function seeImage(Request $image_name)
    {
      return asset('storage/ciao.jpg');
    }



    public function uploadMyImage(Request $request, $user_id)
    {
         //$path = $request->file('avatar')->store('avatars');
       //$path = Storage::putFile('User'.$user_id, $request->file('avatar'));
        //return $path;
        $path = $request->file('avatar')->storeAs(
                  'public/avatars', $user_id .'.png');
         //Storage::put('file.jpg', $contents);
        //  $request->file('Active')->store('avatars');

         /*if($request->file('file') == null()){
             return  "cacca";/*$this->sendError('no image uploaded.', $validator->errors());*/
          return $path;
    }
}
