<?php


namespace App\Traits;


use App\Models\Coordinator;
use Illuminate\Support\Facades\Http;
define("GET_COORDINATOR",env("BASE_URL")."/v1/coordinator/");
define("SEARCH_COORDINATOR",env("BASE_URL")."/v1/coordinator/search");

trait CoordinatorApi
{
    public function searchCoordinators($options){
        $response = Http::withHeaders(getApiHeader())->get(SEARCH_COORDINATOR,
            $options
        );
        checkAuthError($response->status());
        if(!$response->ok()){
            return ["status"=>false];
        }
        $coordinator = array();
        $sts =$response->json()["data"]["items"];
        foreach($sts as $st){
            array_push($coordinator,new Coordinator($st));
        }
        return ["status"=>true,"coordinators"=>$coordinator,"pages"=>$response->json()["data"]["total_pages"]];
    }

    public function getCoordinator($id){
        $response = Http::withHeaders(getApiHeader())->get(GET_COORDINATOR.$id);
        if(!$response->ok())
            return null;
        return new Coordinator($response->json()["data"]);
    }
}
