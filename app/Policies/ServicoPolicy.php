<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class ServicoPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function create(){
        return Auth::user()->permissao == 'admin' || Auth::user()->permissao == 'user';
    }

    public function update(){
        return Auth::user()->permissao == 'admin';
    }

    public function delete(){
        return Auth::user()->permissao == 'admin';
    }

    public function view(){
        return Auth::user()->permissao == 'admin';
    }
}
