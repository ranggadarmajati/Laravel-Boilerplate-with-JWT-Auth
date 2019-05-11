<?php 
namespace App\Repositories\ForgetPassword;

interface ForgetPasswordRepositoryInterface
{
    public function forget($email);
}