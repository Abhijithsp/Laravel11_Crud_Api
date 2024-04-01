<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Http\JsonResponse;
use App\Models\User;


class RegisterController extends BaseController
{
    public function register(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['id'] =  $user->id;
        $success['name'] =  $user->name;
        $success['token'] =  $user->createToken('product_api')->plainTextToken;


        return $this->sendResponse('User register successfully.',$success);
    }

    public function login(Request $request): JsonResponse
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $user = Auth::user();
            $success['id'] =  $user->id;
            $success['name'] =  $user->name;
            $success['token'] =  $user->createToken('product_api')->plainTextToken;


            return $this->sendResponse('User login successfully.',$success);
        }
        else{
            return $this->sendError('Unauthorised.', ['error'=>'Unauthorised,Please check login details']);
        }
    }
}
