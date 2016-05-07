<?php namespace App\Http\Controllers;

use Share\Asset;
use Dingo\Api\Http\Request;
use Dingo\Api\Routing\Helpers;

use Symfony;

class AssetController extends Controller
{
//    protected $auth;
//
//    public function __construct(JWTAuth $auth)
//    {
//        $this->auth = $auth;
//    }


    public function getAsset($asset_id = null) {
        if (isset($asset_id)) {
            $assets = Asset::with('tags', 'genre')->orderBy('id', 'desc')->find($asset_id);
        }
        else {
            $assets = Asset::with('tags', 'genre')->orderBy('id', 'desc')->get();
        }

        return response()->json($assets);
    }

    public function backend(Request $request)
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
}