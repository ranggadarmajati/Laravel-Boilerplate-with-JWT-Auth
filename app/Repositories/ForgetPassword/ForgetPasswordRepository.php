<?php

namespace App\Repositories\ForgetPassword;

use App\Mail\ForgetAccount;
use Illuminate\Database\Eloquent\Model;
use Tymon\JWTAuth\Exceptions\JWTException;
use DB, JWTAuth, Hash, Mail, Sentinel, Activation;

class ForgetPasswordRepository implements ForgetPasswordRepositoryInterface
{
	// model property on class instances
    protected $model;

    // Constructor to bind model to repo
    public function __construct(Model $model = null)
    {
        $this->model = $model;
    }

    public function forget($email)
    {
    	$credentials = [
    		'login' => $email,
		];

		$generate_password = str_random(6);
		$data = [ 'password' => $generate_password ];

		$user = Sentinel::findByCredentials($credentials);
		$password = $generate_password;

		if($user){
			
			$fullname = $user->first_name.' '.$user->last_name;
			$user_update = Sentinel::update($user, $data);
			$data_send 	 = [
          		'name'            => $fullname, 
          		'password'        => $password
        	];
        
        	Mail::to($email)->send(new ForgetAccount($data_send));

        	$res = ['code' => 200, 'message' => 'New Password Has Been Send, Cek on your mail!'];
		
		}else{

			$res = ['code' => 404, 'message' => 'The email you entered is not available on the system!'];

		}
        
        return $res;
    }
}