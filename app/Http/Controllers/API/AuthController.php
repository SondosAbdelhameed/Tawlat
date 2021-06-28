<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Http\Controllers\Controller;

use JWTAuth;
use Password;
Use Hash;

class AuthController extends Controller
{

    public function __construct(){
        parent::__construct();
        $this->middleware('jwt', ['only' => ['profile','logout']]);

    }

    public function createApiregister(Request $request) {
        $data = null;
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|between:2,100',
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|string|min:6',
            'phone' => 'required|string|max:15',
        ]);

        if($validator->fails()){
            $error = $validator->errors();

            return $this->toJson($this->code_data_error,$this->msg_data_error,$error);

        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->user_type_id = 2;
        $user->name = Hash::make($request->password);
        $user->save();
        $token = JWTAuth::fromUser($user);
        $user->token = $token;
        $data["user"] = $user;
    
                
        return $this->toJson($this->code_success,$this->msg_successdatauser);
    }

    public function login(Request $request){
        $data = null;
        $valid = Validator::make($request->all(),[
            'email' => 'required',
            'password' => 'required'
        ]);

        if($valid->fails()){
            $error = $valid->errors();
            return $this->toJson($this->code_data_error,$this->msg_data_error,$error);
        }else{
            $credentials = $request->only(['email', 'password']);

            if (! $token = JWTAuth::attempt($credentials)) {
                return $this->toJson(402,$this->msg_general_error,null);
            }else{
                $user = Auth::user();
                $user->token = $token;
                $user->token_type = 'bearer';
                $user->expires_in = auth('api')->factory()->getTTL() * 60;
                $data["user"] = $user;

                return $this->toJson($this->code_success,$this->msg_success,$data);
            }
		}
  		
    }

    public function forget() {
        $credentials = request()->validate(['email' => 'required|email']);

        Password::sendResetLink($credentials);

        return $this->toJson($this->code_success,'Reset password link sent on your email id.',null);
    }

    public function reset() {
        $credentials = request()->validate([
            'email' => 'required|email',
            'token' => 'required|string',
            'password' => 'required|string|confirmed'
        ]);

        $reset_password_status = Password::reset($credentials, function ($user, $password) {
            $user->password = $password;
            $user->save();
        });

        if ($reset_password_status == Password::INVALID_TOKEN) {
            return $this->toJson(400,"Invalid token provided",null);
        }

        return $this->toJson($this->code_success,"Password has been successfully changed",null);
    }

    public function profile()
    {
        return $this->toJson($this->code_success,$this->msg_success,auth()->user());
    }

    public function logout()
    {
        auth()->logout();
        return $this->toJson($this->code_success,$this->msg_success,null);
    }

    
}
