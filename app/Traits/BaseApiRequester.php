<?php

namespace App\Traits;

use App\Models\Coordinator;
use App\Models\ITFAdmin;
use App\Models\Manager;
use App\Models\School;
use App\Models\State;
use App\Models\Student;
use Illuminate\Support\Facades\Http;

define("STATES",env("BASE_URL")."/v1/states");
define("LOGIN",env("BASE_URL")."/v1/auth/login");
define("LOGOUT",env("BASE_URL")."/v1/auth/logout");
define("SEARCH_SCHOOL",env("BASE_URL")."/v1/school/search");

trait BaseApiRequester{

    public static function getStates(): array{
        $states = array();
        $response = Http::get(STATES);
        if(!$response->ok())
            return array();

        $json = $response->json();
        foreach ($json["data"] as $state){
            array_push($states, new State($state));
        }
        return $states;
    }
    public static function getSchools($options): array{
        $response = Http::withHeaders(getApiHeader())->get(SEARCH_SCHOOL,
            $options
        );
        checkAuthError($response->status());
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

        $response = Http::post(LOGIN,
            ["email"=>$email,"password"=>$password]
        );
        checkAuthError($response->status());
        $data = $response->json();
        if(!$response->ok()){
            return ["status"=>false, "message"=>"Wrong password or username"];
        }

        return ["status"=>true, "message"=>$data["message"],"token"=>$data["data"]["token"],
            "user_type"=>$data["data"]["user_type"],"user_id"=>$data["data"]["user_id"]];
    }


    public static function logout(){
        Http::withHeaders(getApiHeader())->post(LOGOUT);
    }

    public static function requestUser(){
        $url = env("BASE_URL")."/v1/".strtolower(getUserType())."/".getUserId();
        $response = Http::withHeaders(getApiHeader())->get($url);
        checkAuthError($response->status());

        if(!$response->ok())return null;

        $data = $response->json()["data"];
        return self::createUser($data);
}

    public static function updatePassword($password){
        $url = env("BASE_URL")."/v1/".strtolower(getUserType())."/change-password/".session("userId");
        $response = Http::withHeaders(getApiHeader())->put($url,["password"=>$password]);
        checkAuthError($response->status());

        return $response->ok();
    }

    public static function createUser($data){
        if(strcmp(strtolower(getUserType()),strtolower(getStudentUserType())) ==0)
            return new Student($data);

        if(strcmp(strtolower(getUserType()),strtolower(getManagerUserType())) ==0)
            return new Manager($data);

        if(strcmp(strtolower(getUserType()),strtolower(getCoordinatorUserType())) ==0)
            return new Coordinator($data);

        if(strcmp(strtolower(getUserType()),strtolower(getITFUserType())) ==0)
            return new ITFAdmin($data);
    }


}
