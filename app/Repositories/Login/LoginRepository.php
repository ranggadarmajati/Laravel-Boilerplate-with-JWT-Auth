<?php 
namespace App\Repositories\Login;

use App\Mail\ActivationsMail;
use Illuminate\Database\Eloquent\Model;
use Tymon\JWTAuth\Exceptions\JWTException;
use DB, JWTAuth, Hash, Mail, Sentinel, Activation;

class LoginRepository implements LoginRepositoryInterface
{
    // model property on class instances
    protected $model;

    // Constructor to bind model to repo
    public function __construct(Model $model = null)
    {
        $this->model = $model;
    }

    public function login(array $data)
    {
        $email              = $data['email'];
        $password           = $data['password'];
        
        // Creadentials here
        $credentials        = [
            'email'         => $email,
            'password'      => $password
        ];

        try {
                // attempt to verify the credentials and create a token for the user
                if (! $token = JWTAuth::attempt($credentials)) {
                    $data = ['code' => 401, 'message' => 'Invalid Credentials. Please make sure you entered the right information and you have verified your email address.'];
                        return $data;
                }
        } catch (JWTException $e) {
                
                // something went wrong whilst attempting to encode the token
                $data = ['code' => 500, 'message' => 'could_not_create_token'];
                
                return $data;
        }

            if($token != null){
                $auth = Sentinel::authenticate($credentials);
            }

            $user_get = [
                'id'            => $auth->id,
                'fullname'      => $auth->first_name.' '.$auth->last_name,
                'fisrt_name'    => $auth->first_name,
                'last_name'     => $auth->last_name,
                'email'         => $auth->email,
                'last_login'    => $auth->last_login,
                'roles_id'      => $auth->roles->first()->id,
                'roles_slug'    => $auth->roles->first()->slug,
                'roles_name'    => $auth->roles->first()->name,
                'token'         => 'Bearer '.$token
            ];
            
            $data = ['code' => 200, 'message' => 'Login Success', 'contents' => $user_get];
            return $data;

    }

}