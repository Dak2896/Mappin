<?php

namespace Map\Http\Controllers\Api;


use Illuminate\Http\Request;
use Map\Http\Controllers\Api\ApiBaseController as ApiBaseController;
use Validator;
use Map\User;

class UserApiController  extends ApiBaseController
{

    public function updateUserData(Request $request)
    {
        $input = $request->all();


        $validator = Validator::make($input, [
          'id' => 'required',
          'name' => 'required',
          'surname' => 'required',
        ]);


        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }


        $user = User::find($request->id);
        if (is_null($user)) {
            return $this->sendError('User not found.');
        }


        $user->name = $input['name'];
        $user->surname = $input['surname'];
        $user->save();

        return $this->sendResponse($user->toArray(), 'User updated successfully.');
    }
}
