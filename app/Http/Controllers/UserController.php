<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    //
    public function register(Request $request)
    {
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->save();
        return response()->json(['message' => "registered"]);
    }

    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        
        $user = DB::table('users')->where('email', $email)->first();
        
        if($request->input('checkbox')){
            $checkbox = $request->input('checkbox');
            $update = User::where('email', $email)->update(['rememberme'=>$checkbox]);
        }
        if ($password != $user->password) {
            return "invalid data";
        } else {
            return "login";
        }
    }

    public function autocomplete(Request $request)
    {
        if ($request->get('query')) {
            $query = $request->get('query');
            $data = DB::table('users')
                ->where('email', 'LIKE', "%{$query}%")
                ->get();
            $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
            foreach ($data as $row) {
                $output .= 
                '<li><a href="#">' . $row->email . '</a></li>';
            }
             '</ul>';
            echo $output;
            // return $data;

        }
    }

    public function getPassword(Request $request){
        $email = $request->input('email');
        $user = DB::table('users')->where('email', $email)->first();
        if($user->rememberme){
            $password = $user->password;
            return $password;
        }
    }
}
