<?php 
namespace App\Repositories\Register;

use DB, JWTAuth, Hash, Mail, Sentinel, Activation;
use App\Mail\ActivationsMail;
use Illuminate\Database\Eloquent\Model;

class RegisterRepository implements RegisterRepositoryInterface
{
    // model property on class instances
    protected $model;

    // Constructor to bind model to repo
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    // create a new user register in the database
    public function register(array $data)
    {
        $fullname           = $data['first_name'].' '.$data['last_name'];
        $first_name         = $data['first_name'];
        $last_name          = $data['last_name'];
        $email              = $data['email'];
        $password           = $data['password'];
        $roles              = $this->model->find($data['role']);
        
        // Creadentials here
        $credentials        = [
            'email'         => $email,
            'password'      => $password,
            'first_name'    => $first_name,
            'last_name'     => $last_name
        ];

        $user               = Sentinel::register($credentials);
        $activation         = Activation::create($user);
        $role               = Sentinel::findRoleBySlug( $roles->slug );
        $role->users()->attach( $user );
        $user_get = [
            'user_id'       => $user->id,
            'email'         => $user->email,
            'first_name'    => $user->first_name,
            'last_name'     => $user->last_name,
            'fullname'      => $fullname,
            'role'          => $user->roles->first()->slug,
            'permission'    => $user->roles->first()->permissions
        ];

        $data_send = [
          'name'            => $fullname, 
          'activation_code' => $activation->code, 
          'password'        => $password
        ];
        
        Mail::to($email)->send(new ActivationsMail($data_send));
        
        return $data = ['code' => 201, 'message' => 'Thanks for signing up! Please check your email to complete your registration.', 'contents' => $user_get];;
    }

}