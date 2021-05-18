<?php


namespace App\Traits;
use App\Models\ITFAdmin;
use Illuminate\Support\Facades\Http;
define("GET_ADMIN","/v1/itf/");
trait ITFAdminApi
{
    public static function getAdmin($id){
        $response = Http::withHeaders(self::getKeys())->get(env("BASE_URL").GET_ADMIN.$id);
        if($response->ok()){
            $user = new ITFAdmin($response->json()["data"]);
            return ["status"=>true,"data"=>$user];
        }
        return ["status"=>false,"message"=>$response->json()["message"]];
    }
    public static function getKeys(){
        return ["Authorization"=>"Bearer ".session("token"),"x-client-request-key"=>env("API_KEY")];
    }

}
