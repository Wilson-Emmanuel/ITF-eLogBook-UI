<?php



namespace App\Traits;


use App\Models\Manager;
use Illuminate\Support\Facades\Http;
define("GET_MANAGER","/v1/manager/");
trait ManagerApi
{
    public static function getManager($id){
        $response = Http::withHeaders(["Authorization"=>"Bearer ".session("token"),"x-client-request-key"=>env("API_KEY")])->get(env("BASE_URL").GET_MANAGER.$id);
        if($response->ok()){
            $user = new Manager($response->json()["data"]);
            return ["status"=>true,"data"=>$user];
        }
        return ["status",false,"message"=>$response->json()["message"]];
    }
}
