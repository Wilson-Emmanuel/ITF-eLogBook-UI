<?php


namespace App\Traits;
use App\Models\Student;
use Illuminate\Support\Facades\Http;
define("GET_STUDENT","/v1/student/");
trait StudentApi
{
    public static function getStudent($id){
        $response = Http::withHeaders(["Authorization"=>"Bearer ".session("token"),"x-client-request-key"=>env("API_KEY")])->get(env("BASE_URL").GET_STUDENT.$id);
        if($response->ok()){
            $user = new Student($response->json()["data"]);
            return ["status"=>true,"data"=>$user];
        }
        return ["status",false,"message"=>$response->json()["message"]];
    }
}
