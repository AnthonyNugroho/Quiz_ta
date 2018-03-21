<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\UserModel;
use DB;
use Exception;

class UserController extends Controller
{
  protected $user;

    public function __construct(UserModel $user)
    {
        $this->user = $user;
    }

    public function register(Request $request){
      $user = [
        "name"  => $request->name,
        "email" => $request->email,
        "password" => md5($request->password)
      ];

      try
      {
        $user = $this->user->create($user);
        return response('Created',201);
      }
      catch(Exception $ex)
      {
        return response('Failed',400);
      }
    }

    public function all()
    {
        $users = $this->user->all();
        return response()->json($users,200);
    }

    public function find($id)
    {
      $user= $this->user->find($id);

      return $user;
    }




}
