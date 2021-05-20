<?php


namespace App\Traits;
use App\Models\ITFAdmin;
use Illuminate\Support\Facades\Http;
define("GET_ADMIN",env("BASE_URL")."/v1/itf/");
define("SAVE_ADMIN",env("BASE_URL")."/v1/itf/");
define("SAVE_COORDINATOR",env("BASE_URL")."/v1/coordinator/");
trait ITFAdminApi
{
    public static function getAdmin($id){
        $response = Http::withHeaders(getApiHeader())->get(GET_ADMIN.$id);
        checkAuthError($response->status());
        if($response->ok()){
            $user = new ITFAdmin($response->json()["data"]);
            return ["status"=>true,"data"=>$user];
        }
        return ["status"=>false,"message"=>$response->json()["message"]];
    }
    public function saveCoordinator($data){
        $response = Http::withHeaders(getApiHeader())->post(SAVE_COORDINATOR,$data);
        checkAuthError($response->status());
        return $response;
    }

    public function saveAdmin($data){
        $response = Http::withHeaders(getApiHeader())->post(SAVE_ADMIN,$data);
        checkAuthError($response->status());
        return $response;
    }



}
