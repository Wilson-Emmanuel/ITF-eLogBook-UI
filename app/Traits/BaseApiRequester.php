<?php

namespace App\Traits;

use App\Models\School;
use App\Models\State;
use Illuminate\Support\Facades\Http;

define("STATES","/v1/states");
define("LOGIN","/v1/auth/login");
define("LOGOUT","/v1/auth/logout");

trait BaseApiRequester{

    public static function getStates(): array{
        $states = array();
        $response = Http::get(env("BASE_URL") . STATES);
        if(!$response->ok())
            return array();

        $json = $response->json();
        foreach ($json["data"] as $state){
            array_push($states, new State($state));
        }
        return $states;
    }
    public static function getSchools(): array{
        $response = Http::withHeaders(["Authorization"=>"Bearer ".session("token"),"x-client-request-key"=>env("API_KEY")])->get(env("BASE_URL")."/v1/school/search",
            ["size"=>1000,"password"=>0]
        );
        if(!$response->ok()){
            return array();
        }
        $schools = array();
        $sc =$response->json()["data"]["items"];
        foreach($sc as $st){
            array_push($schools,new School($st));
        }
        return $schools;
    }
    public static function login($email, $password): array
    {


        $response = Http::post(env("BASE_URL").LOGIN,
            ["email"=>$email,"password"=>$password]
        );
        $data = $response->json();
        if(!$response->ok()){
            return ["status"=>false, "message"=>"Wrong password or username"];
        }

        return ["status"=>true, "message"=>$data["message"],"token"=>$data["data"]["token"],
            "user_type"=>$data["data"]["user_type"],"user_id"=>$data["data"]["user_id"]];
    }


    public static function logout(){
        Http::withHeaders(["Authorization"=>"Bearer ".session("token"),"x-client-request-key"=>env("API_KEY")])->post(
            env("BASE_URL").LOGOUT
        );
    }


}
