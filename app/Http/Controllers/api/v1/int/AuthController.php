<?php

namespace App\Http\Controllers\api\v1\int;

use App\User;
use App\Models\Roles;
use App\Models\Activations;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Login\LoginRepository;
use App\Repositories\Register\RegisterRepository;
use App\Repositories\Activate\ActivateRepository;
use App\Http\Requests\api\v1\int\auth\LoginRequest;
use App\Http\Requests\api\v1\int\auth\ForgetRequest;
use App\Http\Requests\api\v1\int\auth\RegisterRequest1;
use App\Repositories\ForgetPassword\ForgetPasswordRepository;

class AuthController extends Controller
{
     // space that we can use the repository from
    protected $register_repository, $activate_repository, $login_repository, $forget_repository;

    public function __construct(Roles $roles, Activations $activation)
    {
       // set the model on repository
       $this->login_repository    = new LoginRepository();
       $this->register_repository = new RegisterRepository($roles);
       $this->forget_repository   = new ForgetPasswordRepository();
       $this->activate_repository = new ActivateRepository($activation);
    }

    /**
     * API Register 
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @author Rangga Darmajati
     */
    public function register(RegisterRequest1 $request)
    {
      \DB::beginTransaction();
        
        $res = $this->register_repository->register($request->all());
      
      \DB::commit();
        return response()->success($res, $res['code']);
    }

    /**
     * Activate Account
     * 
     * @param string $activation_code
     * @return \Illuminate\Http\JsonResponse
     * @author Rangga Darmajati
     */
    public function activate(Request $request, $activation_code)
    {
        $check = $this->activate_repository->activate($activation_code);
        if($check == 0){
           return response()->success([
                'message'=> 'Your Account Already Activated.',
                'contents' => ''
            ]); 
        }else{
            return response()->success([
                'message'=> 'Your Account Success Activated.',
                'contents' => ''
            ]);
        }
        
    }

    /**
     * Store a Credentials for Login (get Token Access).
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * @author Rangga Darmajati
     */
    public function store(LoginRequest $request)
    {
        $res = $this->login_repository->login($request->all());
        return response()->success($res, $res['code']);
    }

    /**
     * Forget Password.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * @author Rangga Darmajati
     */
    public function forgetPassword(ForgetRequest $request)
    {
        $email = $request->email;
        $res = $this->forget_repository->forget($email);
        return response()->success($res, $res['code']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
