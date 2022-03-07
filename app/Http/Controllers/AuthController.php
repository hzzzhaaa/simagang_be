<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $username = $request->username;
        $password = $request->password;

        $auth = Http::asForm()->post("http://103.8.12.212:36880/siakad_api/api/as400/signin",[
            'username' => $username,
            'password' => $password,
        ]);

        $response = json_decode($auth);
        if($auth->status() == 500){
            return response()->json(['error'=>'Internal Server Error'], 500);
        }else if($auth == null || $response->status == 400){
            return response()->json(['error'=>'Unauthorized'],401);
        }

        if($request->remember) $ttl = 43800;
        else $ttl = auth()->factory()->getTTL();
        if(User::where('username',$username)->first()==null){
            if($response->mode==9){
                // dd($response->Authorization);
                $u = User::create([
                    'username'=>$username,
                    'password'=>bcrypt($password),
                    'nama'=>$response->nama,
                    'token_siakad'=>$response->Authorization,
                    'role'=> 1,
                ]);
                // dd($u);
            }
            $token = auth()->setTTL($ttl)->attempt(['username'=>$username, 'password' => $password]);
        }else{
            $token = auth()->setTTL($ttl)->attempt(['username'=>$username, 'password' => $password]);
            if(!$token) return response()->json([
                'message'=> 'Username atau Password salah',
                'status'=>$response->status
            ], 401);
        }

        // $store = User::create($auth);

        return $this->respondWithToken($token, $response);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth()->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();


        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token, $response)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'mode' => $response->mode,
            'status' => $response->status,
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ]);
    }
}
