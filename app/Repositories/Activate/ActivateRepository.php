<?php 
namespace App\Repositories\Activate;

use App\User;
use DB, JWTAuth, Hash, Mail, Sentinel, Activation;
use Illuminate\Database\Eloquent\Model;

class ActivateRepository implements ActivateRepositoryInterface
{
    // model property on class instances
    protected $model;

    // Constructor to bind model to repo
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    // activation / verifications email
    public function activate($activate_code)
    {
        $user = $this->model->where('code', $activate_code )->first();
        $users = Sentinel::findById( $user->user_id );
        $activation = Activation::completed($users);
        
        if ($activation) {
            $check = 0;
        }else{
            Activation::complete( $users, $activate_code );
            $check = 1;
        }

        return $check;
    }
}