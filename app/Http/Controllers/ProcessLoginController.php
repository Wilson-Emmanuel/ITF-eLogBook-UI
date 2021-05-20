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
        clearSession();
        return view("login");
    }

    public function login(Request  $request){
        clearSession();
        //login
        if($request->has("email") && $request->has("password")){

            $data = BaseApiRequester::login($request->get("email"),$request->get("password"));
            if(!$data["status"]){
                return back()->withErrors(["message"=>$data["message"]])->withInput();
            }
            $states = BaseApiRequester::getStates();
            updateUserId($data["user_id"]);
            updateUserType($data["user_type"]);
            updateToken($data["token"]);
            updateStates($states);
            updateUser(BaseApiRequester::requestUser());
            return redirect(strtolower($data["user_type"])."/dashboard");
        }
        return back()->withErrors(["message"=>"Incorrect login details.".$request->get("email").$request->get("password")])->withInput();
    }

    public function logout(Request  $request){
        BaseApiRequester::logout();
        $request->session()->flush();
        return redirect("/login");
    }

    public function updatePassword(Request  $request){
        if(!isLoggedIn())return redirect("/logout");

        $message = "Unsuccessful";
        if($request->has("password")){
            $response = BaseApiRequester::updatePassword($request->get("password"));
            if($response){
                setPageMessage("Password successfully updated");
                if(strcmp(strtolower(getStudentUserType()),strtolower(getUserType())) == 0){
                    return redirect("student/update_password");
                }else{
                    return redirect(strtolower(getUserType())."/dashboard");
                }
            }
        }
        return back()->withErrors(["message"=>$message])->withInput();
    }
}
