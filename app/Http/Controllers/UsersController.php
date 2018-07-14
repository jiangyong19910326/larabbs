<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


/**
 * Class UsersController
 * @package App\Http\Controllers
 */
class UsersController extends Controller
{
    /**
     * @用户个人主页
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(User $user)
    {
        return view('users.show',compact('user'));
    }
}
