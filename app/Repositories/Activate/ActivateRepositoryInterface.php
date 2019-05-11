<?php 
namespace App\Repositories\Activate;

interface ActivateRepositoryInterface
{
    public function activate($activate_code);
}