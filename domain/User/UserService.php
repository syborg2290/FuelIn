<?php

namespace domain\User;

// use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\UserDetail;
use App\Models\UserFine;
use App\Events\ReplyEvent;
/**
 * Created by Vs COde.
 * Date: 05/07/2022
 * Time: 07:10 PM
 */
class UserService
{

    protected $user;

    public function __construct()
    {
        $this->user = new User();

    }

    /**
     * All user
     */
    public function all()
    {
        return $this->user->where('user_role',0)->orderBy('id', 'desc')->get();
    }
    /**
     * get user
     */
    public function get($id)
    {
        return $this->user->find($id);
    }



}
