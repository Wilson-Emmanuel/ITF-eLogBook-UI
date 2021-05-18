<?php


namespace App\Traits;


use App\Models\Coordinator;
use Illuminate\Support\Facades\Http;
define("GET_COORDINATOR","/v1/coordinator/");
trait CoordinatorApi
{
    public static function getCoordinator($id){
        $response = Http::withHeaders(["Authorization"=>"Bearer ".session("token"),"x-client-request-key"=>env("API_KEY")])->get(env("BASE_URL").GET_COORDINATOR.$id);
        if($response->ok()){
            $co = new Coordinator($response->json()["data"]);
            return ["status"=>true,"data"=>$co];
        }
        return ["status",false,"message"=>$response->json()["message"]];
    }
}
