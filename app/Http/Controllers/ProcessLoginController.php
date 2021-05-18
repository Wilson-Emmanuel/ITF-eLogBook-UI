<?php

namespace App\Http\Controllers;

use App\Traits\BaseApiRequester;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProcessLoginController extends Controller
{
 use BaseApiRequester;
    //
    public function view(Request $request){
        $request->session()->forget(["userId","token","userType"]);
        return view("login");
    }
    public function login(Request  $request){
        $request->session()->flush();
        //login
        if($request->has("email") && $request->has("password")){

            $data = BaseApiRequester::login($request->get("email"),$request->get("password"));
            if(!$data["status"]){
                return back()->withErrors(["message"=>$data["message"]]);
            }
            $states = BaseApiRequester::getStates();
            $request->session()->put(["token"=>$data["token"]]);
            $request->session()->put(["userType"=>$data["user_type"]]);
            $request->session()->put(["userId"=>$data["user_id"]]);

            $request->session()->put("states",$states);
            return redirect(strtolower($data["user_type"])."/dashboard");
        }
        return back()->withErrors(["message"=>"Incorrect login details.".$request->get("email").$request->get("password")])->withInput();
    }

    public function logout(Request  $request){
        BaseApiRequester::logout();
        $request->session()->flush();
        return redirect("/login");
    }
}
