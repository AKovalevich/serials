<?php namespace App\Api\V1\Controllers;

use Dingo\Api\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\JWTAuth;
use Illuminate\Routing\Controller;
use App\Api\V1\Models\User;
use Validator;

class AuthenticateController extends Controller {

    protected $auth;

    public function __construct(JWTAuth $auth)
    {
        $this->auth = $auth;
    }

    public function auth(Request $request)
    {
        // grab credentials from the request
        $credentials = $request->only('email', 'password');
        try {
            // attempt to verify the credentials and create a token for the user
            if (! $token = $this->auth->attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response()->json(['error' => 'could_not_create_token'], 500);
        }
        // all good so return the token
        return response()->json(compact('token'));
    }

    public function register(Request $request) {
        $credentials = $request->all();
        $validator = Validator::make($credentials, User::$rules);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 403);
        }

        $user = new User;
        $user->email = $credentials['email'];
        $user->first_name = $credentials['first_name'];
        $user->last_name = $credentials['last_name'];
        $user->password = app('hash')->make($credentials['password']);
        $user->save();

        return $user;
    }
}
